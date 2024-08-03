<?php
namespace App;
require_once __DIR__ . '/../vendor/autoload.php';

ob_start();
require 'database/connection.php';

global $pdo;

// print_r(spl_autoload_functions());
// die;

define('BASE_URL', 'http://localhost/cwmis/');
define('BASE_DIR', $_SERVER['DOCUMENT_ROOT'] . '/cwmis');

if (!isset($_SESSION)) {
    session_start();
}