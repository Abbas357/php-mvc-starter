<?php
include '../init.php';

$userClass->preventAccess($_SERVER['REQUEST_METHOD'], realpath(__FILE__), realpath($_SERVER['SCRIPT_FILENAME']));

if(isset($_POST['like']) && !empty($_POST['like'])){
	$user_id = $_SESSION['user_id'];
	$post_id = $_POST['like'];
	$get_id = $_POST['user_id'];
	$postClass->addLike($user_id, $post_id, $get_id);
}

if(isset($_POST['unlike']) && !empty($_POST['unlike'])){
	$user_id = $_SESSION['user_id'];
	$post_id = $_POST['unlike'];
	$get_id = $_POST['user_id'];
	$postClass->unlike($user_id, $post_id, $get_id);
}

?>