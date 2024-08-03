<?php

namespace App\Support;

use PDO;
use PDOException;

class DB
{
    protected $pdo;
    protected $table;
    protected $select = '*';
    protected $where = [];
    protected $orderBy = '';
    protected $limit = '';
    protected $offset = '';

    public function __construct()
    {
        $this->pdo = pdo();
    }

    public static function table($table)
    {
        $instance = new static();
        $instance->table = $table;
        return $instance;
    }

    public function select($columns = ['*'])
    {
        $this->select = implode(', ', (array) $columns);
        return $this;
    }

    public function where($column, $operator, $value)
    {
        $this->where[] = [$column, $operator, $value];
        return $this;
    }

    public function orderBy($column, $direction = 'ASC')
    {
        $this->orderBy = "ORDER BY {$column} {$direction}";
        return $this;
    }

    public function limit($limit)
    {
        $this->limit = "LIMIT {$limit}";
        return $this;
    }

    public function offset($offset)
    {
        $this->offset = "OFFSET {$offset}";
        return $this;
    }

    // New method: take
    public function take($limit)
    {
        return $this->limit($limit);
    }

    // New method: skip
    public function skip($offset)
    {
        return $this->offset($offset);
    }

    public function get()
    {
        $sql = "SELECT {$this->select} FROM {$this->table}";
        $params = [];

        if (!empty($this->where)) {
            $sql .= " WHERE " . implode(' AND ', array_map(function ($where) use (&$params) {
                $param = ':' . $where[0];
                $params[$param] = $where[2];
                return "{$where[0]} {$where[1]} {$param}";
            }, $this->where));
        }

        if (!empty($this->orderBy)) {
            $sql .= " {$this->orderBy}";
        }

        if (!empty($this->limit)) {
            $sql .= " {$this->limit}";
        }

        if (!empty($this->offset)) {
            $sql .= " {$this->offset}";
        }

        return $this->execute($sql, $params);
    }

    public function first()
    {
        $this->limit(1);
        $results = $this->get();
        return $results ? $results[0] : null;
    }

    public function insert(array $data)
    {
        $columns = implode(',', array_keys($data));
        $placeholders = ':' . implode(', :', array_keys($data));

        $sql = "INSERT INTO {$this->table} ({$columns}) VALUES ({$placeholders})";
        return $this->execute($sql, $data);
    }

    public function update(array $data)
    {
        if (empty($this->where)) {
            throw new PDOException("Update queries require at least one 'where' condition.");
        }

        $setClause = implode(', ', array_map(function ($key) {
            return "{$key} = :{$key}";
        }, array_keys($data)));

        $sql = "UPDATE {$this->table} SET {$setClause}";
        $params = array_merge($data, $this->getWhereParameters());

        return $this->execute($sql, $params);
    }

    public function delete()
    {
        if (empty($this->where)) {
            throw new PDOException("Delete queries require at least one 'where' condition.");
        }

        $sql = "DELETE FROM {$this->table}";
        $params = $this->getWhereParameters();

        return $this->execute($sql, $params);
    }

    public function transaction(callable $callback)
    {
        try {
            $this->pdo->beginTransaction();
            $callback($this);
            $this->pdo->commit();
        } catch (PDOException $e) {
            $this->pdo->rollBack();
            throw $e;
        }
    }

    protected function execute($sql, $params = [])
    {
        try {
            $stmt = $this->pdo->prepare($sql);
            foreach ($params as $param => $value) {
                $stmt->bindValue($param, $value);
            }
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            throw new PDOException("Database query error: " . $e->getMessage());
        }
    }

    protected function getWhereParameters()
    {
        $params = [];
        foreach ($this->where as $condition) {
            $params[':' . $condition[0]] = $condition[2];
        }
        return $params;
    }
}

// DB::table('users')->insert([
//     'name' => 'John Doe',
//     'email' => 'john@example.com',
// ]);

// // Fetch all users
// $users = DB::table('users')->select(['id', 'name', 'email'])->get();

// // Fetch the first user
// $firstUser = DB::table('users')->select(['id', 'name', 'email'])->first();

// // Update a user
// DB::table('users')->where('id', '=', 1)->update(['name' => 'Jane Doe']);

// // Delete a user
// DB::table('users')->where('id', '=', 1)->delete();

// // Use transactions
// DB::transaction(function($db) {
//     $db->table('users')->insert([
//         'name' => 'Transactional User',
//         'email' => 'transaction@example.com',
//     ]);
//     $db->table('orders')->insert([
//         'user_id' => 1,
//         'product_id' => 1,
//         'quantity' => 1,
//     ]);
// });
// $users = DB::table('users')->select(['id', 'name', 'email'])->skip(10)->take(5)->get();

// // Fetch 5 users starting from the 11th user
// $users = DB::table('users')->select(['id', 'name', 'email'])->skip(10)->take(5)->get();

// // Fetch the first 10 users ordered by name
// $users = DB::table('users')->orderBy('name', 'ASC')->take(10)->get();