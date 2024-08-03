<?php

namespace App\Support;

use PDOException;

class Auth
{
    protected static $pdo;

    public static function init()
    {
        self::$pdo = pdo();
    }

    public static function attempt($email, $password)
    {
        self::init();

        try {
            $stmt = self::$pdo->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->execute([':email' => $email]);
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                return true;
            }

            return false;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    public static function check()
    {
        return isset($_SESSION['user_id']);
    }

    public static function user()
    {
        self::init(); // Ensure PDO is initialized

        if (self::check()) {
            try {
                $stmt = self::$pdo->prepare("SELECT * FROM users WHERE id = :id");
                $stmt->execute([':id' => $_SESSION['user_id']]);
                return $stmt->fetch();
            } catch (PDOException $e) {
                error_log($e->getMessage());
                return null;
            }
        }

        return null;
    }

    public static function logout()
    {
        unset($_SESSION['user_id']);
    }
}
