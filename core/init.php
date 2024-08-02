<?php ob_start();
require 'database/connection.php';
require 'classes/main.php';
require 'classes/user.php';
require 'classes/news.php';

const BASE_URL = 'http://localhost/cwmis/';

global $pdo;

if(!isset($_SESSION)){
   session_start();
}

$main = new Main($pdo);
$user = new User($pdo);
$news = new News($pdo);
