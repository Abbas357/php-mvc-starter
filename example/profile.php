<?php
if(isset($_GET['username']) === true && empty($_GET['username']) === false){
	include "core/init.php";
	$username = $userClass->checkInput($_GET['username']);
	$profileId = $userClass->userIdByUsername($username);
	$profileData = $userClass->userData($profileId);
	$user_id = @$_SESSION['user_id'];
	$user = $userClass->userData($user_id);
	$notify = $messageClass->getNotificationCount($user_id);

	if(!$profileData){
		header('Location: '.BASE_URL.'index.php');
	}
}
?>

<!doctype html>
<html>
<head>
	<title><?php echo $profileData->screenName.' on Pak Connect '.'('.$profileData->username.')';  ?></title>
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
						<img src="<?php 
									if(!$userClass->checkSuspension($profileData->user_id)){
										echo BASE_URL.$profileData->profileCover;
									}else {
										echo BASE_URL."assets/images/blockedCover.png";
									}
						?>"/>
					</div>
				</div>
				<div class="profile-nav">
					<div class="profile-navigation__left"></div>
					<div class="profile-navigation">
						<?php if(!$userClass->checkSuspension($profileData->user_id)){
									if(!$followClass->checkBlockedProfile($profileId, $user_id)){
										if(!$followClass->checkBlockedProfile($user_id, $profileId)){ ?>
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
										<span class="count-followers"><?php echo $followClass->calcFollowersCount($profileData->user_id); ?></span>
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
						<?php }else {
							echo "
									<ul>
										<li><li>
										<li><li>
										<li><li>
										<li><li>
									</ul>
							";
						}
					 }else {
						echo "
						<ul>
							<li><li>
							<li><li>
							<li><li>
							<li><li>
						</ul>
				";
					 } ?>
						<div class="edit-button">
							<span>
								<?php
									echo $followClass->followBtn($profileId, $user_id, $profileData->user_id) ?>
								<?php
									echo $followClass->blockBtn($profileId, $user_id);
								?>
								<?php 
									echo $followClass->reportBtn($profileId, $user_id); 
								?>
							</span>
						</div>
					</div>
				<?php } ?>
				</div>
			</div><!--Profile Cover End-->

			<!---Inner wrapper-->
			<div class="in-wrapper">
			
				<div class="in-full-wrap">
					<div class="in-left">
						<div class="in-left-wrap profile-page-wrap">
							<!--PROFILE INFO WRAPPER END-->
							<div class="profile-info-wrap">
								<div class="profile-info-inner">
									<!-- PROFILE-IMAGE -->
									<div class="profile-img">
									<img src="<?php 
									if(!$userClass->checkSuspension($profileData->user_id)){
										echo BASE_URL.$profileData->profileImage;
									}else {
										echo BASE_URL."assets/images/blockedImage.png";
									}
						?>"/>
									</div>	
									<?php if(!$userClass->checkSuspension($profileData->user_id)){
												if(!$followClass->checkBlockedProfile($profileId, $user_id)){
													if(!$followClass->checkBlockedProfile($user_id, $profileId)){
									?>
									<div class="profile-name-wrap">
										<div class="profile-name">
											<a href="<?php echo BASE_URL.$profileData->username;?>"><?php echo $profileData->screenName;?></a></a><?php echo $userClass->checkVerified($profileData->user_id) ? "<i class=\"icon-verified verified profile-verified\"></i>" : ""; ?> 
										</div>
										<div class="profile-tname">
											@<span class="username"><?php echo $profileData->username;?></span>
											<?php echo $followClass->checkFollowsYou($user_id, $profileData->user_id) ? "<span class='follow-you'>Follows You</span>" : ""; ?>
										</div>
									</div>
									<br>
									<div class="profile-bio-wrap">
										<div class="profile-bio-inner">
											<?php echo $profileData->bio;?>
										</div>
									</div>
									<br />
									<hr class="line" />
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
													<div class="profile-ex-location">
														<p><i class="fa fa-calendar-o" aria-hidden="true"></i> Joined <?php echo $userClass->userJoinDate($profileData->user_id) ?></p>
													</div>
												</li>
											</ul>						
										</div>
									</div>
									<hr class="line" />
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
									</div>

								</div>
								<!--PROFILE INFO INNER END-->

							</div>
							<!--PROFILE INFO WRAPPER END-->

						</div>
						<!-- in left wrap-->

					</div>
					<!-- in left end-->

					<div class="in-center">
						<div class="in-center-wrap">
							<?php
							$posts = $postClass->getUserPosts($profileId);
							foreach ($posts as $post) {
								$likes = $postClass->likes($user_id, $post->postID); 
								$share = $postClass->checkShare($post->postID, $user_id);
								$user = $userClass->userData($post->shareBy);
								echo '<div class="all-post">
								<div class="t-show-wrap">	
								<div class="t-show-inner">
								'.(($share['shareID'] === $post->shareID OR $post->shareID > 0) ? '
									<div class="t-show-banner">
									<div class="t-show-banner-inner">
									<span><i class="fa fa-share" aria-hidden="true"></i></span><span>'.$user->screenName.' Share</span>
									</div>
									</div>'
									: '').'

								'.((!empty($post->shareMsg) && $post->postID === $share['postID'] or $post->shareID > 0) ? '
									<div class="t-show-popup" data-post="'.$post->postID.'">
									<div class="t-show-head">
									<div class="t-show-img">
									<img src="'.BASE_URL.$user->profileImage.'"/>
									</div>
									<div class="t-s-head-content">
									<div class="t-h-c-name">
									<span><a href="'.BASE_URL.$user->username.'">'.$user->screenName.'</a>'.(($userClass->checkVerified($post->user_id)) ? '<i class="icon-verified verified"></i>' : '').'</span>
									<span>@'.$user->username.'</span>
									<span>'.$userClass->timeAgo($post->postedOn).'</span>
									</div>
									<div class="t-h-c-dis">
									'.$postClass->getPostLinks($post->shareMsg).'
									</div>
									</div>
									</div>
									<div class="t-s-b-inner">
									<div class="t-s-b-inner-in">
									<div class="share-t-s-b-inner">
									'.((!empty($post->postImage)) ?  '
										<div class="share-t-s-b-inner-left">
										<img src="'.BASE_URL.$post->postImage.'" class="imagePopup" data-post="'.$post->postID.'"/>	
										</div>' : '').'
									<div>
									<div class="t-h-c-name">
									<span><a href="'.BASE_URL.$post->username.'" class="profile-popup" data-popup="'.$post->user_id.'">'.$post->screenName.'</a>'.(($userClass->checkVerified($post->user_id)) ? '<i class="icon-verified verified"></i>' : '').'</span>
									<span>@'.$post->username.'</span>
									<span>'.$userClass->timeAgo($post->postedOn).'</span>
									</div>
									<div class="share-t-s-b-inner-right-text">		
									'.$postClass->getPostLinks($post->status).'
									</div>
									</div>
									</div>
									</div>
									</div>
									</div>
									' : '
									<div class="t-show-popup" data-post="'.$post->postID.'">
									<div class="t-show-head">
									<div class="t-show-img">
									<img src="'.BASE_URL.$post->profileImage.'"/>
									</div>
									<div class="t-s-head-content">
									<div class="t-h-c-name">
									<span><a href="'.$post->username.'">'.$post->screenName.'</a>'.(($userClass->checkVerified($post->user_id)) ? '<i class="icon-verified verified"></i>' : '').'</span>
									<span>@'.$post->username.'</span>
									<span>'.$userClass->timeAgo($post->postedOn).'</span>
									</div>
									<div class="t-h-c-dis">
									'.$postClass->getPostLinks($post->status).'
									</div>
									</div>
									</div>'.
									((!empty($post->postImage)) ? 
										'<!--post show head end-->
										<div class="t-show-body">
										<div class="t-s-b-inner">
										<div class="t-s-b-inner-in">
										<img src="'.BASE_URL.$post->postImage.'" class="imagePopup" data-post="'.$post->postID.'"/>
										</div>
										</div>
										</div>
										<!--post show body end-->
										': '').'

									</div>').'
								<div class="t-show-footer">
								<div class="t-s-f-right">
								<ul> 
								'.(($userClass->loggedIn() === true) ? '
									<li>'.(($post->postID === $share['shareID'] OR $user_id == $share['shareBy']) ? '<button class="Share" data-post="'.$post->postID.'" data-user="'.$post->postBy.'"><i class="fa fa-share" aria-hidden="true"></i><span class="sharesCount">'.$post->shareCount.'</span></button>' : '<button class="share" data-post="'.$post->postID.'" data-user="'.$post->postBy.'"><i class="fa fa-share" aria-hidden="true"></i><span class="sharesCount">'.(($post->shareCount > 0) ? $post->shareCount : '').'</span></button>').'</li>
									<li>'.(($likes['likeOn'] === $post->postID) ? '<button class="unlike-btn" data-post="'.$post->postID.'" data-user="'.$post->postBy.'"><i class="fa fa-heart" aria-hidden="true"></i><span class="likesCounter">'.$post->likesCount.'</span></button>' : '<button class="like-btn" data-post="'.$post->postID.'" data-user="'.$post->postBy.'"><i class="fa fa-heart-o" aria-hidden="true"></i><span class="likesCounter">'.(($post->likesCount > 0) ? $post->likesCount : '').'</span></button>').'</li>
									'.(($post->postBy === $user_id) ? '
										<li>
										<a href="#" class="more"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
										<ul> 
										<li><label class="deletePost" data-post="'.$post->postID.'">Delete Post</label></li>
										</ul>
										</li>' : '').'
									' : '<li><button><i class="fa fa-share" aria-hidden="true"></i></button></li>
									<li><button><i class="fa fa-share" aria-hidden="true"></i></button></li>
									<li><button><i class="fa fa-heart" aria-hidden="true"></i></button></li>
									').'
								</ul>
								</div>
								</div>
								</div>
								</div>
								</div>';
							}
							?>
						</div><!-- in left wrap-->
						<div class="popupPost"></div>
						<div class="popupProfile"></div>
						<div class="reportProfile"></div>
					</div>
					<!-- in center end -->

					<div class="in-right">
						<div class="in-right-wrap">
							
							<!--==WHO TO FOLLOW==-->
							<?php 
							$followClass->whoToFollow($user_id, $profileId); ?>
							<!--==WHO TO FOLLOW==-->
							
							<!--==TRENDS==-->
							<?php $postClass->trends(); ?>
							<!--==TRENDS==-->
							
						</div><!-- in right wrap-->
					</div>
					<!-- in right end -->

				</div>
				<!--in full wrap end-->
			</div>
						<?php } else {
							echo "<div class='suspended'>
							<div>
								<h1>
									You Blocked <span style='color: #05BC94'>$profileData->screenName</span>
								</h1>
								<br />
								<p>
								".$userClass->findGender($profileData->user_id, 'He', 'She')." would not be able to follow you. If you want to follow <br> or viewing his updates, then unblock ".$userClass->findGender($profileData->user_id, 'him', 'her').".
								</p>
							</div>
						</div>";
						}
					 }else {
						echo "<div class='suspended'>
								<div>
									<h1>
										You are Blocked
									</h1>
									<br />
									<p>
										You are Blocked from following or Viewing updates of <strong>$profileData->screenName</strong>
									</p>
								</div>
							</div>";
					 }
					}else {
						echo "<div class='suspended'>
						<div>
							<h1>
								Account Suspended
							</h1>
							<br />
							<p>
								<strong style='color:red'>$profileData->screenName's</strong> account is suspended because of Violating the Terms of PakConnect
							</p>
						</div>
					</div>";
					} 
				?>
			<!-- in wrappper ends-->	
		</div>
		<!-- ends wrapper -->

		<!-- Scripts start -->
		<?php require_once "./includes/scripts.php"; ?>
		<!-- Scripts end -->

	</body>
</html>