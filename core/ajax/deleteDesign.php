<?php
include "../init.php";
$userClass->preventAccess($_SERVER['REQUEST_METHOD'], realpath(__FILE__), realpath($_SERVER['SCRIPT_FILENAME']));
if(isset($_POST['userId']) && !empty($_POST['userId'])){
	$userId = $_POST['userId'];
	$userClass->delete('design', array('designFor' => $userId));
}
?>