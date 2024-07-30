<?php
include "../init.php";
$userClass->preventAccess($_SERVER['REQUEST_METHOD'], realpath(__FILE__), realpath($_SERVER['SCRIPT_FILENAME']));

if(!empty($_POST['user']) && !empty($_POST['password'])){
	$password = $_POST['password'];
	$user = $_POST['user'];
	if($userClass->checkPassword($password)){
		$userClass->delete("users", array('user_id' => $user));
		$userClass->delete("posts", array('postBy' => $user));
		$userClass->delete("comments", array('commentBy' => $user));
		$userClass->delete("report", array('reportBy' => $user));
		$userClass->delete("messages", array('messageFrom' => $user));
		$userClass->delete("follow", array('sender' => $user));
		$userClass->delete("likes", array('likeBy' => $user));
		$userClass->delete("design", array('designFor' => $user));
		$userClass->delete("block", array('blockBy' => $user));
		$userClass->delete("notification", array('notificationFrom' => $user));
		$userClass->delete("trends", array('createdBy' => $user));
		$userClass->logout();
	}
}
?>