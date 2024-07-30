<?php
if(isset($_GET['username']) === true && empty($_GET['username']) === false){
	include "core/init.php";
	$username = $userClass->checkInput($_GET['username']);
	$profileId = $userClass->userIdByUsername($username);
	$profileData = $userClass->userData($profileId);
	$user_id = $_SESSION['user_id'];
	$user = $userClass->userData($user_id);
	$notify = $messageClass->getNotificationCount($user_id);


	if($userClass->loggedIn() === false){
		header('Location: '.BASE_URL.'index.php');
	}

	if(!$profileData){
		header('Location: '.BASE_URL.'index.php');
	}
}else{
	header('Location: '.BASE_URL.'index.php');
}
?>

<!doctype html>
<html>
<head>
	<title>People followed by <?php echo $profileData->screenName .' (@'.$profileData->username.')'; ?></title>
	<meta charset="UTF-8" />

	<!-- Styles start -->
	<?php require_once "./includes/styles.php" ?>	
	<!-- Styles end -->

</head>
<body>

	<!-- Header Wrapper start -->
	<?php include "./includes/header.php" ?>	
	<!-- Header Wrapper end -->
	
			<!--Profile cover-->
			<div class="profile-cover-wrap"> 
				<div class="profile-cover-inner">
					<div class="profile-cover-img">
						<!-- PROFILE-COVER -->
						<img src="<?php echo BASE_URL.$profileData->profileCover;?>"/>
					</div>
				</div>
				<div class="profile-nav">
					<div class="profile-navigation__left"></div>
					<div class="profile-navigation">
						<ul>
						<li>
							<a href="<?php echo BASE_URL.$profileData->username;?>">
								<div class="n-head">
									TWEETS
								</div>
								<div class="n-bottom">
									<?php $postClass->countPosts($profileId); ?>
								</div>
							</a>
							</li>
							<li>
								<a href="<?php echo BASE_URL.$profileData->username;?>/following">
									<div class="n-head">
										FOLLOWING
									</div>
									<div class="n-bottom">
										<span class="count-following"><?php echo $followClass->calcFollowingCount($profileData->user_id); ?></span>
									</div>
								</a>
							</li>
							<li>
								<a href="<?php echo BASE_URL.$profileData->username;?>/followers">
									<div class="n-head">
										FOLLOWERS
									</div>
									<div class="n-bottom">
										<span class="count-followers"><?php echo $followClass->calcFollowersCount($profileData->user_id);?></span>
									</div>
								</a>
							</li>
							<li>
								<a href="#">
									<div class="n-head">
										LIKES
									</div>
									<div class="n-bottom">
										<?php $postClass->countLikes($profileId); ?>
									</div>
								</a>
							</li>
						</ul>
						<div class="edit-button">
							<span>
								<?php echo $followClass->followBtn($profileId, $user_id, $profileData->user_id); ?>
								<?php
									echo $followClass->blockBtn($profileId, $user_id);
								?>
								<?php 
									echo $followClass->reportBtn($profileId, $user_id); 
								?>
							</span>
						</div>
					</div>
				</div>
			</div><!--Profile Cover End-->

			<!---Inner wrapper-->
			<div class="in-wrapper">
				<div class="in-full-wrap">
					<div class="in-left">
						<div class="in-left-wrap">
							<!--PROFILE INFO WRAPPER END-->
							<div class="profile-info-wrap">
								<div class="profile-info-inner">
									<!-- PROFILE-IMAGE -->
									<div class="profile-img">
										<img src="<?php echo BASE_URL.$profileData->profileImage;?>"/>
									</div>	

									<div class="profile-name-wrap">
										<div class="profile-name">
											<a href="<?php echo BASE_URL.$profileData->username;?>"><?php echo $profileData->screenName;?></a></a><?php echo $userClass->checkVerified($profileData->user_id) ? "<i class=\"icon-verified verified profile-verified\"></i>" : ""; ?>
										</div>
										<div class="profile-tname">
											@<span class="username"><?php echo $profileData->username;?></span><?php echo $followClass->checkFollowsYou($user_id, $profileData->user_id) ? "<span class='follow-you'>Follows You</span>" : ""; ?>
										</div>
									</div>

									<div class="profile-bio-wrap">
										<div class="profile-bio-inner">
											<?php echo $profileData->bio;?>
										</div>
									</div>

									<div class="profile-extra-info">
										<div class="profile-extra-inner">
											<ul>
												<?php if(!empty($profileData->country)){ ?>
												<li>
													<div class="profile-ex-location-i">
														<i class="fa fa-map-marker" aria-hidden="true"></i>
													</div>
													<div class="profile-ex-location">
														<?php echo $profileData->country;?>
													</div>
												</li>
												<?php } ?>
												<?php if(!empty($profileData->website)){ ?>
												<li>
													<div class="profile-ex-location-i">
														<i class="fa fa-link" aria-hidden="true"></i>
													</div>
													<div class="profile-ex-location">
														<a href="<?php echo $profileData->website; ?>" target="_blank"><?php echo $profileData->website; ?></a>
													</div>
												</li>
												<?php } ?>
												<li>
													<div class="profile-ex-location-i">
														<!-- <i class="fa fa-calendar-o" aria-hidden="true"></i> -->
													</div>
													<div class="profile-ex-location">
													</div>
												</li>
												<li>
													<div class="profile-ex-location-i">
														<!-- <i class="fa fa-tint" aria-hidden="true"></i> -->
													</div>
													<div class="profile-ex-location">
														<p><i class="fa fa-calendar-o" aria-hidden="true"></i> Joined <?php echo $userClass->userJoinDate($profileData->user_id) ?></p>
													</div>
												</li>
											</ul>						
										</div>
									</div>

									<div class="profile-extra-footer">
										<div class="profile-extra-footer-head">
											<div class="profile-extra-info">
												<ul>
													<li>
														<div class="profile-ex-location-i">
															<i class="fa fa-camera" aria-hidden="true"></i>
														</div>
														<div class="profile-ex-location">
															<a href="<?php echo BASE_URL.$profileData->username; ?>"><?php echo $followClass->photosCount($profileData->user_id); ?> Photos and videos </a>
														</div>
													</li>
												</ul>
											</div>
										</div>
										<div class="profile-extra-footer-body">
											<ul>
												<!-- <li><img src="#"/></li> -->
											</ul>		
										</div>
										<!-- whoTOFollow -->
										<?php $followClass->whoToFollow($user_id, $user_id);?>

										<?php $postClass->trends(); ?>
									</div>

								</div>
								<!--PROFILE INFO INNER END-->

							</div>
							<!--PROFILE INFO WRAPPER END-->

							<div class="popupPost"></div>
							<div class="popupProfile"></div>
							<div class="reportProfile"></div>
						</div>
						<!-- in left wrap-->
					</div>
					<!-- in left end-->
					<!--FOLLOWING OR FOLLOWER FULL WRAPPER-->
					<div class="wrapper-following">
						<div class="wrap-follow-inner">
							<?php $followClass->followingList($profileId, $user_id, $profileData->user_id); ?>              
						</div><!-- wrap follo inner end-->
					</div><!--FOLLOWING OR FOLLOWER FULL WRAPPER END-->
				</div><!--in full wrap end-->
			</div>
			<!-- in wrappper ends-->

		</div><!-- ends wrapper -->

		<!-- Scripts start -->
		<?php require_once "./includes/scripts.php"; ?>
		<!-- Scripts end -->
		
	</body>
</html>