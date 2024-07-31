<?php
error_reporting(E_ALL & ~E_DEPRECATED);

$dsn = 'mysql:host=localhost;dbname=cwdgkp_new';
$username = 'root';
$password = '';

$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
);

try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    die("Connection Problem: " . $e->getMessage());
}