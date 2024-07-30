<?php
include '../init.php';

$userClass->preventAccess($_SERVER['REQUEST_METHOD'], realpath(__FILE__), realpath($_SERVER['SCRIPT_FILENAME']));

if(isset($_POST['unBlock']) && !empty($_POST['unBlock'])){
	$user_id = $_SESSION['user_id'];
	$profileID = $_POST['unBlock'];
	$followClass->unBlock($user_id, $profileID);
}

if(isset($_POST['block']) && !empty($_POST['block'])){
	$user_id = $_SESSION['user_id'];
	$profileID = $_POST['block'];
	$followClass->block($user_id, $profileID);
	$userClass->delete('follow', array('sender' => $user_id, 'receiver' => $profileID));
	$followClass->removeFollowCount($profileID, $user_id);
}
?>