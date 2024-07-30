<?php
include "../init.php";
if(isset($_POST['ajax'])){
	$user_id = $_SESSION['user_id'];
	$profileId = $_POST['profileId'];
	$reportMsg = $_POST['message'];
	if(!empty($reportMsg)){
		$userClass->create('report', array('reportBy' => $user_id, 'reportOn' => $profileId, 'reportMsg' => $reportMsg));
		$userClass->suspension($profileId);
		echo "Report Submitted Successfully";
	}
}
?>