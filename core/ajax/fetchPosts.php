<?php
include '../init.php';
$userClass->preventAccess($_SERVER['REQUEST_METHOD'], realpath(__FILE__), realpath($_SERVER['SCRIPT_FILENAME']));

if(isset($_POST['fetchPosts']) && !empty($_POST['fetchPosts'])){
	$user_id = $_SESSION['user_id'];
	$limit = (int) trim($_POST['fetchPosts']);
	$postClass->posts($user_id, $limit);
} 
?>