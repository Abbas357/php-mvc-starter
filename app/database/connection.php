<?php

error_reporting(E_ALL & ~E_DEPRECATED);

$dsn = 'mysql:host=' . env('DB_HOST', 'localhost') . ';dbname=' . env('DB_NAME', 'cwdgkp_new');
$username = env('DB_USER', 'root');
$password = env('DB_PASSWORD', '');

$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
);

try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    die("Connection Problem: " . $e->getMessage());
}