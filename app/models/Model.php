<?php

// namespace App\Models;

// use PDO;
// use Exception;
// use PDOException;
// use ReflectionClass;

// abstract class Model
// {
//     protected $id;
//     protected $pdo;
//     protected $table;
//     protected $query;
//     protected $params = [];
//     protected $limit;
//     protected $offset;
//     protected $orderBy;

//     public function __construct($id = null)
//     {
//         $this->id = $id;
//         $this->pdo = pdo();
//         $this->setTableName();
//     }

//     private function setTableName()
//     {
//         $this->table = strtolower((new ReflectionClass($this))->getShortName()) . 's';
//     }

//     public function getTable()
//     {
//         return $this->table;
//     }

//     public static function all()
//     {
//         $instance = new static;
//         $query = "SELECT * FROM {$instance->table}";
//         return self::executeQuery($query);
//     }

//     public static function find($id)
//     {
//         $instance = new static;
//         $query = "SELECT * FROM {$instance->table} WHERE id = :id LIMIT 1";
//         $params = ['id' => $id];
//         $result = self::executeQuery($query, $params, PDO::FETCH_ASSOC);

//         if (empty($result)) {
//             return null;
//         }

//         foreach ($result[0] as $key => $value) {
//             $instance->{$key} = $value;
//         }

//         return $instance;
//     }

//     public function create(array $fields)
//     {
//         $columns = implode(',', array_keys($fields));
//         $placeholders = ':' . implode(', :', array_keys($fields));
//         $this->query = "INSERT INTO {$this->table} ({$columns}) VALUES ({$placeholders})";
//         $this->params = $fields;

//         try {
//             $stmt = $this->pdo->prepare($this->query);
//             foreach ($this->params as $key => $value) {
//                 $stmt->bindValue(":{$key}", $value);
//             }
//             $stmt->execute();
//             return $this->pdo->lastInsertId();
//         } catch (PDOException $e) {
//             error_log($e->getMessage());
//             return false;
//         }
//     }

//     public function update(array $fields)
//     {
//         if (!$this->id) {
//             throw new Exception("ID is required for update operation.");
//         }

//         $setClause = '';
//         $i = 1;
//         foreach ($fields as $name => $value) {
//             $setClause .= "{$name} = :{$name}";
//             if ($i < count($fields)) {
//                 $setClause .= ', ';
//             }
//             $i++;
//         }

//         $this->query = "UPDATE {$this->table} SET {$setClause} WHERE id = :id";

//         $this->params = $fields;
//         $this->params['id'] = $this->id;

//         try {
//             $stmt = $this->pdo->prepare($this->query);

//             foreach ($this->params as $key => $value) {
//                 $stmt->bindValue(":{$key}", $value);
//             }
//             $stmt->execute();
//         } catch (PDOException $e) {
//             error_log($e->getMessage());
//             return false;
//         }

//         return true;
//     }

//     // public function delete()
//     // {
//     //     if (!$this->id) {
//     //         throw new Exception("ID is required for delete operation.");
//     //     }

//     //     $this->query = "DELETE FROM {$this->table} WHERE id = :id";
//     //     try {
//     //         $stmt = $this->pdo->prepare($this->query);
//     //         $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);
//     //         $stmt->execute();
//     //     } catch (PDOException $e) {
//     //         error_log($e->getMessage());
//     //         return false;
//     //     }
//     //     return true;
//     // }

//     public function delete()
//     {
//         if ($this->id) {
//             // Delete a specific record
//             $this->query = "DELETE FROM {$this->table} WHERE id = :id";
//             try {
//                 $stmt = $this->pdo->prepare($this->query);
//                 $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);
//                 $stmt->execute();
//             } catch (PDOException $e) {
//                 error_log($e->getMessage());
//                 return false;
//             }
//             return true;
//         } else {
//             // Check if this is a query builder instance
//             if ($this->query) {
//                 try {
//                     $stmt = $this->pdo->prepare($this->query->getQuery());
//                     foreach ($this->query->getParams() as $key => $value) {
//                         $stmt->bindValue($key, $value);
//                     }
//                     $stmt->execute();
//                 } catch (PDOException $e) {
//                     error_log($e->getMessage());
//                     return false;
//                 }
//                 return true;
//             } else {
//                 throw new Exception("No valid ID or query builder instance provided for delete operation.");
//             }
//         }
//     }


//     public static function where($field, $operator = '=', $value = null)
//     {
//         $instance = new static();
//         $instance->query = "SELECT * FROM {$instance->table} WHERE {$field} {$operator} :value";
//         $instance->params['value'] = $value;
//         return $instance;
//     }

//     public function orWhere($field, $operator = '=', $value = null)
//     {
//         $this->query .= " OR {$field} {$operator} :value";
//         $this->params['value'] = $value;
//         return $this;
//     }

//     public function orderBy($field, $direction = 'ASC')
//     {
//         $this->query .= " ORDER BY {$field} {$direction}";
//         return $this;
//     }

//     public function orderByDesc($field)
//     {
//         return $this->orderBy($field, 'DESC');
//     }

//     public function limit($limit)
//     {
//         $this->limit = $limit;
//         return $this;
//     }

//     public function offset($offset)
//     {
//         $this->offset = $offset;
//         return $this;
//     }

//     public function take($count)
//     {
//         return $this->limit($count);
//     }

//     public function skip($count)
//     {
//         return $this->offset($count);
//     }

//     public function pluck($field)
//     {
//         $this->query = "SELECT {$field} FROM {$this->table}";
//         return $this->get(PDO::FETCH_COLUMN);
//     }

//     public function first()
//     {
//         $this->limit = 1;
//         $results = $this->get(PDO::FETCH_ASSOC);
//         return $results ? $results[0] : null;
//     }

//     public function last()
//     {
//         $this->query .= " ORDER BY id DESC";
//         return $this->first();
//     }

//     public function get($fetchMode = PDO::FETCH_OBJ)
//     {
//         $sql = $this->query;

//         if ($this->limit) {
//             $sql .= " LIMIT :limit";
//             $this->params['limit'] = $this->limit;
//         }

//         if ($this->offset) {
//             $sql .= " OFFSET :offset";
//             $this->params['offset'] = $this->offset;
//         }

//         $stmt = $this->pdo->prepare($sql);
//         foreach ($this->params as $param => $value) {
//             $stmt->bindValue(":{$param}", $value, is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR);
//         }

//         $stmt->execute();
//         $this->resetQuery();
//         return $stmt->fetchAll($fetchMode);
//     }


//     public static function count()
//     {
//         $model = new static();
//         $query = "SELECT COUNT(*) FROM " . $model->getTable();
//         return $model->staticQuery($query, [], PDO::FETCH_COLUMN)[0];
//     }

//     public static function sum($field)
//     {
//         $model = new static();
//         $query = "SELECT SUM({$field}) FROM " . $model->getTable();
//         return $model->staticQuery($query, [], PDO::FETCH_COLUMN)[0];
//     }

//     public static function max($field)
//     {
//         $model = new static();
//         $query = "SELECT MAX({$field}) FROM " . $model->getTable();
//         return $model->staticQuery($query, [], PDO::FETCH_COLUMN)[0];
//     }

//     public static function min($field)
//     {
//         $model = new static();
//         $query = "SELECT MIN({$field}) FROM " . $model->getTable();
//         return $model->staticQuery($query, [], PDO::FETCH_COLUMN)[0];
//     }

//     public static function avg($field)
//     {
//         $model = new static();
//         $query = "SELECT AVG({$field}) FROM " . $model->getTable();
//         return $model->staticQuery($query, [], PDO::FETCH_COLUMN)[0];
//     }

//     protected function staticQuery($query, $params = [], $fetchMode = PDO::FETCH_OBJ)
//     {
//         $stmt = $this->pdo->prepare($query);
//         foreach ($params as $param => $value) {
//             $stmt->bindValue(":{$param}", $value);
//         }
//         $stmt->execute();
//         return $stmt->fetchAll($fetchMode);
//     }

//     public static function executeQuery($query, $params = [], $fetchMode = PDO::FETCH_OBJ)
//     {
//         try {
//             $instance = new static;
//             $stmt = $instance->pdo->prepare($query);
//             foreach ($params as $param => $value) {
//                 $stmt->bindValue(":{$param}", $value, is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR);
//             }
//             $stmt->execute();
//             return $stmt->fetchAll($fetchMode);
//         } catch (PDOException $e) {
//             error_log($e->getMessage());
//             return [];
//         }
//     }

//     private function resetQuery()
//     {
//         $this->query = "SELECT * FROM {$this->table}";
//         $this->params = [];
//         $this->limit = null;
//         $this->offset = null;
//         $this->orderBy = null;
//     }

//     public function checkExistence($field, $value)
//     {
//         $sql = "SELECT 1 FROM {$this->table} WHERE {$field} = :value LIMIT 1";
//         $result = $this->staticQuery($sql, ['value' => $value], PDO::FETCH_ASSOC);
//         return !empty($result);
//     }
// }


namespace App\Models;

use PDO;
use Exception;
use PDOException;
use ReflectionClass;

abstract class Model
{
    protected $id;
    protected $pdo;
    protected $table;
    protected $query;
    protected $params = [];
    protected $limit;
    protected $offset;
    protected $orderBy;

    public function __construct($id = null)
    {
        $this->id = $id;
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

    public static function all()
    {
        $instance = new static;
        $query = "SELECT * FROM {$instance->table}";
        return self::executeQuery($query);
    }

    public static function find($id)
    {
        $instance = new static;
        $query = "SELECT * FROM {$instance->table} WHERE id = :id LIMIT 1";
        $params = ['id' => $id];
        $result = self::executeQuery($query, $params, PDO::FETCH_ASSOC);

        if (empty($result)) {
            return null;
        }

        foreach ($result[0] as $key => $value) {
            $instance->{$key} = $value;
        }

        return $instance;
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

    public function update(array $fields)
    {
        if (!$this->id) {
            throw new Exception("ID is required for update operation.");
        }

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
        $this->params['id'] = $this->id;

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

        return true;
    }

    public function delete()
    {
        if ($this->id) {
            // Delete a specific record
            $this->query = "DELETE FROM {$this->table} WHERE id = :id";
            try {
                $stmt = $this->pdo->prepare($this->query);
                $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);
                $stmt->execute();
            } catch (PDOException $e) {
                error_log($e->getMessage());
                return false;
            }
            return true;
        } else {
            // Check if this is a query builder instance
            if ($this->query) {
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
                return true;
            } else {
                throw new Exception("No valid ID or query builder instance provided for delete operation.");
            }
        }
    }

    public static function where($field, $operator = '=', $value = null)
    {
        $numArgs = func_num_args();

        if ($numArgs === 2) {
            $value = $operator;
            $operator = '='; 
        }

        $instance = new static();
        $instance->query = "SELECT * FROM {$instance->table} WHERE {$field} {$operator} :value";
        $instance->params['value'] = $value;
        return $instance;
    }

    public static function whereBetween($field, $start, $end = null)
    {
        $numArgs = func_num_args();

        if ($numArgs === 3) {
            $instance = new static();
            $instance->query = "SELECT * FROM {$instance->table} WHERE {$field} BETWEEN :start AND :end";
            $instance->params['start'] = $start;
            $instance->params['end'] = $end;
        } elseif ($numArgs === 2) {
            $end = $start;
            $instance = new static();
            $instance->query = "SELECT * FROM {$instance->table} WHERE {$field} BETWEEN :start AND :end";
            $instance->params['start'] = $end;
            $instance->params['end'] = $end;
        }

        return $instance;
    }

    public static function whereIn($field, $values)
    {
        $instance = new static();
        $placeholders = implode(',', array_fill(0, count($values), '?'));
        $instance->query = "SELECT * FROM {$instance->table} WHERE {$field} IN ({$placeholders})";
        $instance->params = $values;
        return $instance;
    }

    public function orWhere($field, $operator = '=', $value = null)
    {
        $numArgs = func_num_args();
        if ($numArgs === 2) {
            $value = $operator;
            $operator = '=';
        }
        $this->query .= " OR {$field} {$operator} :value";
        $this->params['value'] = $value;
        return $this;
    }
    
    public static function whereNotNull($field)
    {
        $instance = new static();
        $instance->query = "SELECT * FROM {$instance->table} WHERE {$field} IS NOT NULL";
        return $instance;
    }

    public static function whereNull($field)
    {
        $instance = new static();
        $instance->query = "SELECT * FROM {$instance->table} WHERE {$field} IS NULL";
        return $instance;
    }

    public static function select(...$fields)
    {
        $instance = new static();
        $fieldsList = implode(', ', $fields);
        $instance->query = "SELECT {$fieldsList} FROM {$instance->table}";
        return $instance;
    }

    public function having($field, $operator = '=', $value = null)
    {
        $numArgs = func_num_args();

        if ($numArgs === 2) {
            $value = $operator;
            $operator = '='; 
        }

        $this->query .= " HAVING {$field} {$operator} :value";
        $this->params['value'] = $value;
        return $this;
    }

    public function orderBy($field, $direction = 'ASC')
    {
        $this->query .= " ORDER BY {$field} {$direction}";
        return $this;
    }

    public function groupBy($field)
    {
        $this->query .= " GROUP BY {$field}";
        return $this;
    }

    public function orderByDesc($field)
    {
        return $this->orderBy($field, 'DESC');
    }

    public function limit($limit)
    {
        $this->limit = $limit;
        return $this;
    }

    public function offset($offset)
    {
        $this->offset = $offset;
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
        return $this->get(PDO::FETCH_COLUMN);
    }

    public function first()
    {
        $this->limit = 1;
        $results = $this->get(PDO::FETCH_ASSOC);
        return $results ? $results[0] : null;
    }

    public function last()
    {
        $this->query .= " ORDER BY id DESC";
        return $this->first();
    }

    public function get($fetchMode = PDO::FETCH_OBJ)
    {
        $sql = $this->query;

        if ($this->limit) {
            $sql .= " LIMIT :limit";
            $this->params['limit'] = $this->limit;
        }

        if ($this->offset) {
            $sql .= " OFFSET :offset";
            $this->params['offset'] = $this->offset;
        }

        $stmt = $this->pdo->prepare($sql);
        foreach ($this->params as $param => $value) {
            $stmt->bindValue(":{$param}", $value, is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR);
        }

        $stmt->execute();
        $this->resetQuery();
        return $stmt->fetchAll($fetchMode);
    }

    public function count()
    {
        $sql = str_replace('SELECT *', 'SELECT COUNT(*)', $this->query);
        $result = $this->staticQuery($sql, $this->params, PDO::FETCH_COLUMN);
        return $result[0];
    }

    public function sum($field)
    {
        $sql = str_replace('SELECT *', "SELECT SUM({$field})", $this->query);
        $result = $this->staticQuery($sql, $this->params, PDO::FETCH_COLUMN);
        return $result[0];
    }

    public function max($field)
    {
        $sql = str_replace('SELECT *', "SELECT MAX({$field})", $this->query);
        $result = $this->staticQuery($sql, $this->params, PDO::FETCH_COLUMN);
        return $result[0];
    }

    public function min($field)
    {
        $sql = str_replace('SELECT *', "SELECT MIN({$field})", $this->query);
        $result = $this->staticQuery($sql, $this->params, PDO::FETCH_COLUMN);
        return $result[0];
    }

    public function avg($field)
    {
        $sql = str_replace('SELECT *', "SELECT AVG({$field})", $this->query);
        $result = $this->staticQuery($sql, $this->params, PDO::FETCH_COLUMN);
        return $result[0];
    }

    protected function staticQuery($query, $params = [], $fetchMode = PDO::FETCH_OBJ)
    {
        $stmt = $this->pdo->prepare($query);
        foreach ($params as $param => $value) {
            $stmt->bindValue(":{$param}", $value);
        }
        $stmt->execute();
        return $stmt->fetchAll($fetchMode);
    }

    public static function executeQuery($query, $params = [], $fetchMode = PDO::FETCH_OBJ)
    {
        try {
            $instance = new static;
            $stmt = $instance->pdo->prepare($query);
            foreach ($params as $param => $value) {
                $stmt->bindValue(":{$param}", $value, is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR);
            }
            $stmt->execute();
            return $stmt->fetchAll($fetchMode);
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return [];
        }
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
        $result = $this->staticQuery($sql, ['value' => $value], PDO::FETCH_ASSOC);
        return !empty($result);
    }
}
