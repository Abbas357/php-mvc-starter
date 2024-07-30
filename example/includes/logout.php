<?php
include '../core/init.php';
$userClass->logout();
if($userClass->loggedIn() === false){
	header("Location: ../index.php");
}
?>