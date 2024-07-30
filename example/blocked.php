<?php
include 'core/init.php';

$user_id = $_SESSION['user_id'];
$user = $userClass->userData($user_id);
$notify = $messageClass->getNotificationCount($user_id);

if($userClass->loggedIn() === false){
	header('Location: '.BASE_URL.'index.php');
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Blocked Users Page</title>
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
								<a href="<?php echo BASE_URL;?>settings/password">
									<div>
										Password
										<span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
									</div>
								</a>
							</li>
							<li>
								<a href="<?php echo BASE_URL;?>settings/blocked" class="bold">
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
							<h2>Blocked Accounts</h2>
							<h3>Following are the list of users you have blocked.</h3>
						</div>
						<div class="setting-padding">
						<?php
							echo $followClass->getBlockedAccounts($user_id, $user->user_id);
						?>
						</div>
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
	<!-- ends wrapper -->

	<!-- Scripts start -->
	<?php require_once "./includes/scripts.php"; ?>
	<!-- Scripts end -->
		
</body>
</html>