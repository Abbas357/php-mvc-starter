<?php

namespace App\Models;

use PDO;
use PDOException;
use ReflectionClass;

abstract class Model
{
    protected $pdo;
    protected $table;
    protected $query;
    protected $params;
    protected $limit;
    protected $offset;
    protected $orderBy;

    public function __construct()
    {
        $this->pdo = pdo();
        $this->setTableName();
        $this->resetQuery();
        
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
        $this->query = "SELECT * FROM {$this->table}";
        return $this->executeQuery();
    }

    public function find($id)
    {
        $this->query = "SELECT * FROM {$this->table} WHERE id = :id";
        $this->params = ['id' => $id];
        return $this->executeQuery(PDO::FETCH_ASSOC);
    }

    public function create(array $fields)
    {
        $columns = implode(',', array_keys($fields));
        $placeholders = ':' . implode(', :', array_keys($fields));
        $this->query = "INSERT INTO {$this->table} ({$columns}) VALUES ({$placeholders})";
        $this->params = $fields;
        
        try {
            $stmt = $this->pdo->prepare($this->query);
            foreach ($this->params as $key => $value) {
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
        $this->query = "UPDATE {$this->table} SET {$setClause} WHERE id = :id";
        $this->params = $fields;
        $this->params['id'] = $id;
        
        try {
            $stmt = $this->pdo->prepare($this->query);
            foreach ($this->params as $key => $value) {
                $stmt->bindValue(":{$key}", $value);
            }
            $stmt->execute();
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    public function delete($id)
    {
        $this->query = "DELETE FROM {$this->table} WHERE id = :id";
        $this->params = ['id' => $id];
        
        try {
            $stmt = $this->pdo->prepare($this->query);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
        return true;
    }

    public function where($field, $operator = '=', $value = null)
    {
        $this->query .= " WHERE {$field} {$operator} :value";
        $this->params['value'] = $value;
        return $this;
    }

    public function orWhere($field, $operator = '=', $value = null)
    {
        $this->query .= " OR {$field} {$operator} :value";
        $this->params['value'] = $value;
        return $this;
    }

    public function orderBy($field, $direction = 'ASC')
    {
        $this->query .= " ORDER BY {$field} {$direction}";
        return $this;
    }

    public function orderByDesc($field)
    {
        return $this->orderBy($field, 'DESC');
    }

    public function limit($limit)
    {
        $this->query .= " LIMIT :limit";
        $this->params['limit'] = $limit;
        return $this;
    }

    public function offset($offset)
    {
        $this->query .= " OFFSET :offset";
        $this->params['offset'] = $offset;
        return $this;
    }

    public function take($count)
    {
        return $this->limit($count);
    }

    public function skip($count)
    {
        return $this->offset($count);
    }

    public function pluck($field)
    {
        $this->query = "SELECT {$field} FROM {$this->table}";
        return $this->executeQuery(PDO::FETCH_COLUMN);
    }

    public function first()
    {
        $this->query .= " LIMIT 1";
        return $this->executeQuery(PDO::FETCH_ASSOC);
    }

    public function staticQuery($query, $params = [], $fetchMode = PDO::FETCH_OBJ)
    {
        $stmt = $this->pdo->prepare($query);
        foreach ($params as $param => $value) {
            $stmt->bindValue(":{$param}", $value);
        }
        $stmt->execute();
        return $stmt->fetchAll($fetchMode);
    }

    public static function count()
    {
        $model = new static();
        $query = "SELECT COUNT(*) FROM " . $model->getTable();
        return $model->staticQuery($query, [], PDO::FETCH_COLUMN)[0];
    }

    public static function sum($field)
    {
        $model = new static();
        $query = "SELECT SUM({$field}) FROM " . $model->getTable();
        return $model->staticQuery($query, [], PDO::FETCH_COLUMN)[0];
    }

    public static function max($field)
    {
        $model = new static();
        $query = "SELECT MAX({$field}) FROM " . $model->getTable();
        return $model->staticQuery($query, [], PDO::FETCH_COLUMN)[0];
    }

    public static function min($field)
    {
        $model = new static();
        $query = "SELECT MIN({$field}) FROM " . $model->getTable();
        return $model->staticQuery($query, [], PDO::FETCH_COLUMN)[0];
    }

    public static function avg($field)
    {
        $model = new static();
        $query = "SELECT AVG({$field}) FROM " . $model->getTable();
        return $model->staticQuery($query, [], PDO::FETCH_COLUMN)[0];
    }

    protected function executeQuery($fetchMode = PDO::FETCH_OBJ)
    {
        $stmt = $this->pdo->prepare($this->query);
        foreach ($this->params as $param => $value) {
            $stmt->bindValue(":{$param}", $value);
        }
        $stmt->execute();
        $this->resetQuery();
        return $stmt->fetchAll($fetchMode);
    }

    private function resetQuery()
    {
        $this->query = "SELECT * FROM {$this->table}";
        $this->params = [];
        $this->limit = null;
        $this->offset = null;
        $this->orderBy = null;
    }

    public function checkExistence($field, $value)
    {
        $sql = "SELECT 1 FROM {$this->table} WHERE {$field} = :value LIMIT 1";
        $result = $this->executeQuery($sql, ['value' => $value], PDO::FETCH_ASSOC);
        return !empty($result);
    }
}
