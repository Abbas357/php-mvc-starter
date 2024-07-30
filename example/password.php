<?php
include 'core/init.php';

$user_id = $_SESSION['user_id'];
$user = $userClass->userData($user_id);
$notify = $messageClass->getNotificationCount($user_id);


if($userClass->loggedIn() === false){
	header('Location: '.BASE_URL.'index.php');
}

if(isset($_POST['submit'])){
	$currentPwd = $_POST['currentPwd'];
	$newPassword = $_POST['newPassword'];
	$rePassword = $_POST['rePassword'];
	$error = array();

	if(!empty($currentPwd) && !empty($newPassword) && !empty($rePassword)){
		if($userClass->checkPassword($currentPwd) === true){
			if(strlen($newPassword) < 5){
				$error['newPassword'] = "Password is too short";
			}elseif($newPassword != $rePassword){
				$error['rePassword'] = "Password does not match";
			}else{
				$userClass->update('users', 'user_id', $user_id, array('password' => md5($newPassword)));
				header('Location: '.BASE_URL.$user->username);
			}
		}else{
			$error['currentPwd'] = 'Password is incorrect';
		}
	}else{
		$error['fields'] = "All fields are required";
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Password settings page</title>
	<meta charset="UTF-8" />

	<!-- Styles start -->
	<?php require_once "./includes/styles.php" ?>	
	<!-- Styles end -->
	
</head>
<body>

	<!-- Header Wrapper start -->
	<?php include "./includes/header.php" ?>
	<!-- Header Wrapper end -->		
	
		<div class="container-wrap">

			<div class="lefter">
				<div class="inner-lefter">

					<div class="acc-info-wrap">
						<div class="acc-info-bg">
							<!-- PROFILE-COVER -->
							<img src="<?php echo BASE_URL . $user->profileCover; ?>"/>  
						</div>
						<div class="acc-info-img">
							<!-- PROFILE-IMAGE -->
							<img src="<?php echo BASE_URL . $user->profileImage; ?>"/>
						</div>
						<div class="acc-info-name">
							<h3><?php echo $user->screenName; ?><?php echo $userClass->checkVerified($user->user_id) ? "<i class=\"icon-verified verified\"></i>" : ""; ?></h3>
							<span><a href="<?php echo BASE_URL . $user->username; ?>">@<?php echo $user->username; ?></a></span>
						</div>
					</div><!--Acc info wrap end-->

					<div class="option-box">
						<ul> 
							<li>
								<a href="<?php echo BASE_URL;?>settings/account">
									<div>
										Account
										<span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
									</div>
								</a>
							</li>
							<li>
								<a href="<?php echo BASE_URL;?>settings/password" class="bold">
									<div>
										Password
										<span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
									</div>
								</a>
							</li>
							<li>
								<a href="<?php echo BASE_URL;?>settings/blocked">
									<div>
										Blocked Accounts
										<span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
									</div>
								</a>
							</li>
							<li>
								<a href="<?php echo BASE_URL;?>settings/design">
									<div>
										Design
										<span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
									</div>
								</a>
							</li>
						</ul>
					</div>

				</div>
			</div><!--LEFTER ENDS-->
			
			<div class="righter">
				<div class="inner-righter">
					<div class="acc">
						<div class="acc-heading">
							<h2>Password</h2>
							<h3>Change your password or recover your current one.</h3>
						</div>
						<form method="POST">
							<div class="acc-content">
								<div class="acc-wrap">
									<div class="acc-left">
										Current password
									</div>
									<div class="acc-right">
										<input type="password" name="currentPwd"/>
										<span>
											<?php if(isset($error['currentPwd'])){ echo $error['currentPwd'];} ?>
										</span>
									</div>
								</div>

								<div class="acc-wrap">
									<div class="acc-left">
										New password
									</div>
									<div class="acc-right">
										<input type="password" name="newPassword" />
										<span>
											<?php if(isset($error['newPassword'])){ echo $error['newPassword'];} ?>
										</span>
									</div>
								</div>

								<div class="acc-wrap">
									<div class="acc-left">
										Verify password
									</div>
									<div class="acc-right">
										<input type="password" name="rePassword"/>
										<span>
											<?php if(isset($error['rePassword'])){ echo $error['rePassword'];} ?>
										</span>
									</div>
								</div>
								<div class="acc-wrap">
									<div class="acc-left">
									</div>
									<div class="acc-right">
										<input type="Submit" name="submit" value="Save changes"/>
									</div>
									<div class="settings-error">
										<?php if(isset($error['fields'])){ echo $error['fields'];} ?>
									</div>	
								</div>
							</form>
						</div>
					</div>
					<div class="content-setting">
						<div class="content-heading">
							
						</div>
						<div class="content-content">
							<div class="content-left">
								
							</div>
							<div class="content-right">
								
							</div>
						</div>
					</div>
				</div>	
			</div>
			<!--RIGHTER ENDS-->
		</div>
		<div class="popupPost"></div>
		<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/postMessage.js"></script>

		<!--CONTAINER_WRAP ENDS-->
	</div>

	<!-- Scripts start -->
	<?php require_once "./includes/scripts.php"; ?>
	<!-- Scripts end -->

</body>
</html>
