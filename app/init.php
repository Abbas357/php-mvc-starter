<?php
namespace App;

require_once __DIR__ . '/../vendor/autoload.php';

ob_start();
require 'database/connection.php';

global $pdo;

if (!isset($_SESSION)) {
    session_start();
}

// unset($_SESSION['old_input']);