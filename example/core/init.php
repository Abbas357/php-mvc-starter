<?php ob_start();
require 'database/connection.php';
require 'classes/user.php';
require 'classes/follow.php';
require 'classes/post.php';
require 'classes/message.php';

global $pdo;

if(!isset($_SESSION)){
   session_start();
}

$userClass = new User($pdo);
$followClass = new Follow($pdo);
$postClass = new Post($pdo);
$messageClass = new Message($pdo);

const BASE_URL = 'http://pakconnect.com/';
?>