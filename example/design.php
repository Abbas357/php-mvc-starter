<?php
include 'core/init.php';

$user_id = $_SESSION['user_id'];
$user = $userClass->userData($user_id);
$design = $userClass->getDesignData($user_id);
$notify = $messageClass->getNotificationCount($user_id);
if($userClass->loggedIn() === false){
	header('Location: '.BASE_URL.'index.php');
}

if(isset($_POST['submitColor'])){
	$primaryColor = $_POST['pColor'];
	$secondaryColor = $_POST['sColor'];
	$linksColor = $_POST['lColor'];
	if(!$userClass->designRowCount($user_id)){
		$userClass->create('design', array('designFor' => $user_id, 'primaryColor' => $primaryColor, 'secondaryColor' => $secondaryColor, 'linksColor' => $linksColor));
		header('Location: '.BASE_URL.'settings/design');
	}elseif($userClass->designRowCount($user_id)){
		$userClass->update('design', 'designFor', $user_id, array('primaryColor' => $primaryColor, 'secondaryColor' => $secondaryColor, 'linksColor' => $linksColor));
		header('Location: '.BASE_URL.'settings/design');
	}
}

if(isset($_POST['submitBg'])){
   if(!empty($_FILES['bgImage']['name'][0])){
      $fileRoot = $userClass->uploadImage($_FILES['bgImage']);
      if(!$userClass->designRowCount($user_id)){
			$userClass->create('design', array('designFor' => $user_id, 'background' => $fileRoot));
			header('Location: '.BASE_URL.'settings/design');
      }elseif($userClass->designRowCount($user_id)) {
			$userClass->update('design', 'designFor', $user_id, array('background' => $fileRoot));
			header('Location: '.BASE_URL.'settings/design');
      }
   }
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Design Page</title>
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
								<a href="<?php echo BASE_URL;?>settings/blocked">
									<div>
										Blocked Accounts
										<span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
									</div>
								</a>
                     </li>
                     <li>
								<a href="<?php echo BASE_URL;?>settings/design" class="bold">
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
							<div>
								<h2>Design</h2>
								<h3>Design your Account as you want</h3>
							</div>
							<div>
								<button class="defaultBtn" data-user="<?php echo $user_id; ?>">Revert to Default</button>
							</div>
						</div>
                     <div class="setting-padding">
                     <div class="acc-content">

							<!-- Colors start -->
							<form method="POST">
								<div class="acc-wrap">
									<div class="acc-left">
										Primary Color 
									</div>
									<div class="acc-right">
										<input type="color" name="pColor" class="color" value="<?php if(!$userClass->designRowCount($user_id) or empty($design->primaryColor)){
											echo '#30619F'; } else{ echo $design->primaryColor; } ?>"/>
									</div>
								</div>
								<div class="acc-left">
										Secondary Color 
									</div>
									<div class="acc-right">
										<input type="color" name="sColor" class="color" value="<?php if(!$userClass->designRowCount($user_id) or empty($design->secondaryColor)){
											echo '#4D7EBA';} else{ echo $design->secondaryColor; } ?>"/>
									</div>
								<div class="acc-left">
										Links Color 
									</div>
									<div class="acc-right">
										<input type="color" name="lColor" class="color" value="<?php if(!$userClass->designRowCount($user_id) or empty($design->linksColor)){
											echo '#05BC94'; } else{ echo $design->linksColor; } ?>"/>
								</div>
								<div class="acc-wrap">
									<div class="acc-left">
									</div>
									<div class="acc-right">
										<input type="Submit" name="submitColor" value="Save changes"/>
									</div>
									<div class="settings-error">
									</div>	
								</div>
							</form>
							<!-- Color end -->
							<hr class="line"/>
							<br />
							<!-- Background Image start -->
							<form method="POST"" enctype="multipart/form-data"">
							<div class="acc-wrap">
									<div class="acc-left">
										background Image
									</div>
									<div class="acc-right bgImage">
                           <label for="bgImage"><i class="icon-images" style="font-size: 20px; color: #575757">&nbsp;</i></label>
										<input type="file" name="bgImage" id="bgImage"/>
									</div>
								</div>
								<div class="acc-wrap">
									<div class="acc-left">
									</div>
									<div class="acc-right">
										<input type="Submit" name="submitBg" value="Save changes"/>
									</div>
									<div class="settings-error">
									</div>	
								</div> 
							</form>
							<!-- Background Image end -->

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
		<!--CONTAINER_WRAP ENDS-->
	</div>
	<!-- ends wrapper -->

	<!-- Scripts start -->
	<?php require_once "./includes/scripts.php"; ?>
	<!-- Scripts end -->
		
</body>
</html>