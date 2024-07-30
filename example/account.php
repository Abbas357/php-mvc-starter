<?php
include 'core/init.php';
$user_id = $_SESSION['user_id'];
$user = $userClass->userData($user_id);
$notify = $messageClass->getNotificationCount($user_id);


if($userClass->loggedIn() === false){
	header('Location: '.BASE_URL.'index.php');
}

if(isset($_POST['submit'])){
	$username = $userClass->checkInput($_POST['username']);
	$email = $userClass->checkInput($_POST['email']);
	$error = array();

	if(!empty($username) and !empty($email)){
		if($user->username =! $username and $userClass->checkUsername($username) === true){
			$error['username'] = "The username is not available";
		}elseif(preg_match("/[^a-zA-Z0-9\!]", $username)){
			$error['username'] = "Only characters and numbers allowed";
		}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$error['email'] = "Invalid email format";
		}elseif($user->email != $email and $userClass->checkEmail($email) === true){
			$error['email'] = "Email already in use";
		}else{
			$userClass->update('users', 'user_id', $user_id, array('username' => $username, 'email' => $email));
			header('Location: '.BASE_URL.'settings/account');
		}
	}else{
		$error['fields'] = "All fields are required";
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Account settings page</title>
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
								<a href="<?php echo BASE_URL;?>settings/account" class="bold">
									<div>
										Account
										<span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
									</div>
								</a>
							</li>
							<li>
								<a href="<?php echo BASE_URL;?>settings/password">
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
							<h2>Account</h2>
							<h3>Change your basic account settings.</h3>
						</div>
						<div class="acc-content">
							<form method="POST">
								<div class="acc-wrap">
									<div class="acc-left">
										Username
									</div>
									<div class="acc-right">
										<input type="text" name="username" value="<?php echo $user->username; ?>"/>
										<span>
											<?php if(isset($error['username'])){ echo $errorp['username'];} ?>
										</span>
									</div>
								</div>

								<div class="acc-wrap">
									<div class="acc-left">
										Email
									</div>
									<div class="acc-right">
										<input type="text" name="email" value="<?php echo $user->email; ?>"/>
										<span>
											<?php if(isset($error['email'])){ echo $error['email'];} ?>
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
							<hr class="line" />
								<h3 style="color: #555">Remove your Account</h3>
								<button class="accountRemoveBtn" style="margin: 12px 0px" data-user="<?php echo $user_id; ?>">Remove Account</button>
								<br />
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
			</div><!--RIGHTER ENDS-->
			<div class="popupPost"></div>

		</div>
		<!--CONTAINER_WRAP ENDS-->

	</div><!-- ends wrapper -->

	<!-- Scripts start -->
	<?php require_once "./includes/scripts.php"; ?>
	<!-- Scripts end -->

</body>
</html>