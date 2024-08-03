<?php

namespace App\Models;

use PDO;
use PDOException;
use ReflectionClass;

abstract class Model
{
    protected $pdo;
    protected $table;

    public function __construct()
    {
        $this->pdo = pdo();
        $this->setTableName();
    }

    private function setTableName()
    {
        $this->table = strtolower((new ReflectionClass($this))->getShortName()) . 's';
    }

    public function getTable()
    {
        return $this->table;
    }

    public function all()
    {
        $sql = "SELECT * FROM {$this->table}";
        return $this->executeQuery($sql);
    }

    public function find($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id = :id";
        return $this->executeQuery($sql, ['id' => $id], PDO::FETCH_ASSOC);
    }

    public function create(array $fields)
    {
        $columns = implode(',', array_keys($fields));
        $placeholders = ':' . implode(', :', array_keys($fields));
        $sql = "INSERT INTO {$this->table} ({$columns}) VALUES ({$placeholders})";
        
        try {
            $stmt = $this->pdo->prepare($sql);
            foreach ($fields as $key => $value) {
                $stmt->bindValue(":{$key}", $value);
            }
            $stmt->execute();
            return $this->pdo->lastInsertId();
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    public function update($id, array $fields)
    {
        $setClause = '';
        $i = 1;
        foreach ($fields as $name => $value) {
            $setClause .= "{$name} = :{$name}";
            if ($i < count($fields)) {
                $setClause .= ', ';
            }
            $i++;
        }
        $sql = "UPDATE {$this->table} SET {$setClause} WHERE id = :id";
        
        try {
            $stmt = $this->pdo->prepare($sql);
            foreach ($fields as $key => $value) {
                $stmt->bindValue(":{$key}", $value);
            }
            $stmt->bindValue(':id', $id);
            $stmt->execute();
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    public function delete($id)
    {
        $sql = "DELETE FROM {$this->table} WHERE id = :id";
        
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
        return true;
    }

    protected function executeQuery($sql, $params = [], $fetchMode = PDO::FETCH_OBJ)
    {
        $stmt = $this->pdo->prepare($sql);
        foreach ($params as $param => $value) {
            $stmt->bindValue($param, $value);
        }
        $stmt->execute();
        return $stmt->fetchAll($fetchMode);
    }

	public function checkExistence($field, $value)
    {
        $sql = "SELECT 1 FROM {$this->table} WHERE {$field} = :value LIMIT 1";
        $result = $this->executeQuery($sql, ['value' => $value], PDO::FETCH_ASSOC);
        return !empty($result);
    }
}
