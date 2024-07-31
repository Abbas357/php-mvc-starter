<?php
class User extends Main {

    function __construct($pdo) {
        $this->pdo = $pdo;
        
        if(!isset($_SESSION)){
            session_start();
        }
    }

    public function search($search) {
        $sql = "SELECT * FROM `users` WHERE (`name` LIKE :search OR `email` LIKE :search OR `designation` LIKE :search OR `office` LIKE :search) AND `status` = 1";
        return $this->executeQuery($sql, [':search' => $search . '%']);
    }

    public function login($email, $password) {
        $sql = "SELECT `id`, `password` FROM `users` WHERE `email` = :email";
        $user = $this->executeQuery($sql, [':email' => $email], PDO::FETCH_OBJ);
        if ($user && password_verify($password, $user[0]->password)) {
            print_r($user[0]->password);
            $_SESSION['user_id'] = $user[0]->id;
            $this->redirectTo('index');
            exit();
        }
        return false;
    }

    public function userData($id) {
        $sql = "SELECT * FROM `users` WHERE `id` = :id";
        $user = $this->executeQuery($sql, [':id' => $id]);
        return $user ? $user[0] : null;
    }

    public function logout() {
        $_SESSION = [];
        session_destroy();
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
            header('Content-Type: application/json');
            echo json_encode(['status' => 'success']);
            exit;
        } else {
            header('Location: login');
            exit;
        }
    }

    public function checkUsername($username) {
        return $this->checkExistence('username', $username);
    }

    public function checkEmail($email) {
        return $this->checkExistence('email', $email);
    }

    public function checkStatus($id) {
        $sql = "SELECT `status` FROM `users` WHERE `id` = :id";
        $user = $this->executeQuery($sql, [':id' => $id], PDO::FETCH_OBJ);
        return !empty($user) && $user[0]->status;
    }

    public function userIdByEmail($email) {
        $sql = "SELECT `id` FROM `users` WHERE `email` = :email";
        $user = $this->executeQuery($sql, [':email' => $email], PDO::FETCH_OBJ);
        return $user ? $user[0]->id : null;
    }
	
}