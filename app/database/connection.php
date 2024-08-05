<?php

error_reporting(E_ALL & ~E_DEPRECATED);

$dsn = 'mysql:host=' . config('DB_HOST', 'localhost') . ';dbname=' . config('DB_NAME', 'cwdgkp_new');
$username = config('DB_USER', 'root');
$password = config('DB_PASSWORD', '');

$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
);

try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    die("Connection Problem: " . $e->getMessage());
}