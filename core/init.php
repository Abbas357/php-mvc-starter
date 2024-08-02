<?php ob_start();
require 'database/connection.php';
require 'classes/main.php';
require 'classes/user.php';
require 'classes/news.php';

define('BASE_URL', 'http://localhost/cwmis/');
define('BASE_DIR', $_SERVER['DOCUMENT_ROOT'] . '/cwmis');

global $pdo;

if(!isset($_SESSION)){
   session_start();
}

$main = new Main($pdo);
$user = new User($pdo);
$news = new News($pdo);
