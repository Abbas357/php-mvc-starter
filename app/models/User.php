<?php
namespace App\Models;
use PDO;
class User extends Model
{
    public function __construct() {
        parent::__construct(pdo());
    }

    public function search($search)
    {
        $sql = "SELECT * FROM `users` WHERE (`name` LIKE :search OR `email` LIKE :search OR `designation` LIKE :search OR `office` LIKE :search) AND `status` = 1";
        return $this->executeQuery($sql, [':search' => $search . '%']);
    }

    public function checkUsername($username)
    {
        return $this->checkExistence('username', $username);
    }

    public function checkEmail($email)
    {
        return $this->checkExistence('email', $email);
    }

    public function checkStatus($id)
    {
        $sql = "SELECT `status` FROM `users` WHERE `id` = :id";
        $user = $this->executeQuery($sql, [':id' => $id], PDO::FETCH_OBJ);
        return !empty($user) && $user[0]->status;
    }

    public function userIdByEmail($email)
    {
        $sql = "SELECT `id` FROM `users` WHERE `email` = :email";
        $user = $this->executeQuery($sql, [':email' => $email], PDO::FETCH_OBJ);
        return $user ? $user[0]->id : null;
    }
}
