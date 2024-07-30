<?php
include 'core/init.php';
if($userClass->loggedIn() === false){
	header("Location: index.php");
}
$user_id = $_SESSION['user_id'];
$user = $userClass->userData($user_id);
$notify = $messageClass->getNotificationCount($user_id);

if(isset($_POST['screenName'])){
	if(!empty($_POST['screenName'])){
		$screenName = $userClass->checkInput($_POST['screenName']);
		$profileBio = $userClass->checkInput($_POST['bio']);
		$country = $userClass->checkInput($_POST['country']);
		$website = $userClass->checkInput($_POST['website']);
		if(strlen($screenName) > 20){
			$error = "Name must be between 6-20 characters";
		}elseif(strlen($profileBio) > 120){
			$error = "Description is too long";
		}elseif(strlen($country) > 80){
			$error = "Country name is too long";
		}else{
			$userClass->update('users', 'user_id', $user_id, array('screenName' => $screenName, 'bio' => $profileBio, 'country' => $country, 'website' => $website));
			header('Location: '.$user->username);
		}
	}else{
		$error = "Name field can't be empty";
	}
}

if(isset($_FILES['profileImage'])){
	if(!empty($_FILES['profileImage']['name'][0])){
		$fileRoot = $userClass->uploadImage($_FILES['profileImage']);
		$userClass->update('users', 'user_id', $user_id, array('profileImage' => $fileRoot));
		header('Location: '.$user->username);
	}
}

if(isset($_FILES['profileCover'])){
	if(!empty($_FILES['profileCover']['name'][0])){
		$fileRoot = $userClass->uploadImage($_FILES['profileCover']);
		$userClass->update('users', 'user_id', $user_id, array('profileCover' => $fileRoot));
		header('Location: '.$user->username);
	}
}
?>

<!doctype html>
<html>
<head>
	<title>Profile edit page @<?php echo $user->username ?></title>
	<meta charset="UTF-8" />

	<!-- Styles start -->
	<!-- <link rel="stylesheet" href="<?php echo ADMIN_BASE_URL?>assets/css/sb-admin.min.css"> -->
	<!-- <link rel="stylesheet" href="<?php echo BASE_URL ?>assets/css/cropper.css"> -->
	<?php require_once "./includes/styles.php" ?>	
	<!-- Styles end -->

</head>
<body>
<a href="btn btn-success">Google</a>

	<!-- Header start -->
	<?php include "./includes/header.php" ?>	
	<!-- Header end -->

			<!--Profile cover-->
			<div class="profile-cover-wrap"> 
				<div class="profile-cover-inner">
					<div class="profile-cover-img">
						<!-- PROFILE-COVER -->
						<img src="<?php echo $user->profileCover; ?>"/>

						<div class="img-upload-button-wrap">
							<div class="img-upload-button1">
								<label for="cover-upload-btn">
									<i class="fa fa-camera" aria-hidden="true"></i>
								</label>
								<span class="span-text1">
									Change your profile photo
								</span>
								<input id="cover-upload-btn" type="checkbox"/>
								<div class="img-upload-menu1">
									<span class="img-upload-arrow"></span>
									<form method="post" enctype="multipart/form-data">
										<ul>
											<li>
												<label for="file-up">
													Upload photo
												</label>
												<input type="file" name="profileCover" onchange="this.form.submit()" id="file-up" />
											</li>
											<li>
												<label for="cover-upload-btn">
													Cancel
												</label>
											</li>
										</ul>
									</form>
								</div>
							</div>
						</div>
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
										<?php echo $postClass->countPosts($user_id); ?>
									</div>
								</a>
							</li>
							<li>
								<a href="<?php echo BASE_URL.$user->username.'/following'; ?>">
									<div class="n-head">
										FOLLOWINGS
									</div>
									<div class="n-bottom">
										<?php echo $followClass->calcFollowingCount($user->user_id); ?>
									</div>
								</a>
							</li>
							<li>
								<a href="<?php echo BASE_URL.$user->username.'/followers'; ?>">
									<div class="n-head">
										FOLLOWERS
									</div>
									<div class="n-bottom">
										<?php echo $followClass->calcFollowersCount($user->user_id); ?>
									</div>
								</a>
							</li>
							<li>
								<a href="#">
									<div class="n-head">
										LIKES
									</div>
									<div class="n-bottom">
										<?php echo $postClass->countLikes($user_id);?>
									</div>
								</a>
							</li>

						</ul>
						<div class="edit-button">
							<span>
								<button class="f-btn" type="button" onclick="window.location.href='<?php echo $user->username; ?>'" value="Cancel">Cancel</button>
							</span>
							<span>
								<input type="submit" id="save" value="Save Changes">
							</span>

						</div>
					</div>
				</div>
			</div><!--Profile Cover End-->

			<div class="in-wrapper">
				<div class="in-full-wrap">
					<div class="in-left">
						<div class="in-left-wrap">
							<!--PROFILE INFO WRAPPER END-->
							<div class="profile-info-wrap">
								<div class="profile-info-inner">
									<div class="profile-img">
										<!-- PROFILE-IMAGE -->
										<img src="<?php echo $user->profileImage; ?>"/>
										<div class="img-upload-button-wrap1">
											<div class="img-upload-button">
												<label for="img-upload-btn">
													<i class="fa fa-camera" aria-hidden="true"></i>
												</label>
												<span class="span-text">
													Change your profile photo
												</span>
												<input id="img-upload-btn" type="checkbox"/>
												<div class="img-upload-menu">
													<span class="img-upload-arrow"></span>
													<form method="post" enctype="multipart/form-data">
														<ul>
															<li>
																<label for="profileImage">
																	Upload photo
																</label>
																<input id="profileImage" type="file" onchange="this.form.submit()" name="profileImage"/>

															</li>
															<li><a href="#">Remove</a></li>
															<li>
																<label for="img-upload-btn">
																	Cancel
																</label>
															</li>
														</ul>
													</form>
												</div>
											</div>
											<!-- img upload end-->
										</div>
									</div>

									<form id="editForm" method="post" enctype="multipart/Form-data">	
										<div class="profile-name-wrap">
											<?php 
											if(isset($imageError)){
												echo '<ul>
												<li class="error-li">
												<div class="span-pe-error">'.$imageError.'</div>
												</li>
												</ul>';
											}
											?> 
											<div class="profile-name">
												<input type="text" name="screenName" value="<?php echo $user->screenName; ?>"/>
											</div>
											<div class="profile-tname">
												@<?php echo $user->username; ?>
											</div>
										</div>
										<div class="profile-bio-wrap">
											<div class="profile-bio-inner">
												<textarea class="bio" name="bio"><?php echo $user->bio; ?></textarea>
												<div class="hash-box">
													<ul>
													</ul>
												</div>
											</div>
										</div>
										<div class="profile-extra-info">
											<div class="profile-extra-inner">
												<ul>
													<li>
														<div class="profile-ex-location">
															<input id="cn" type="text" name="country" placeholder="Country" value="<?php echo $user->country; ?>" />
														</div>
													</li>
													<li>
														<div class="profile-ex-location">
															<input type="text" name="website" placeholder="Website" value="<?php echo $user->website; ?>"/>
														</div>
													</li>

													<?php 
													if(isset($error)){
														echo '<li class="error-li">
														<div class="span-pe-error">'.$error.'</div>
														</li>';
													}
													?> 

												</form>
												
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
															<a href="#">0 Photos and videos </a>
														</div>
													</li>
												</ul>
											</div>
										</div>
										<div class="profile-extra-footer-body">
											<ul>
												<!-- <li><img src="#"></li> -->
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
							$posts = $postClass->getUserPosts($user_id);
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
									<span><a href="'.BASE_URL.$user->username.'">'.$user->screenName.'</a></span>
									<span>@'.$user->username.'</span>
									<span>'.$userClass->timeAgo($share['postedOn']).'</span>
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
									<span><a href="'.BASE_URL.$post->username.'">'.$post->screenName.'</a></span>
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
									<span><a href="'.$post->username.'">'.$post->screenName.'</a></span>
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
								<li><button><i class="fa fa-share" aria-hidden="true"></i></button></li>	
								<li>'.(($post->postID === $share['shareID'] OR $user_id == $share['shareBy']) ? '<button class="Share" data-post="'.$post->postID.'" data-user="'.$post->postBy.'"><i class="fa fa-share" aria-hidden="true"></i><span class="sharesCount">'.$post->shareCount.'</span></button>' : '<button class="share" data-post="'.$post->postID.'" data-user="'.$post->postBy.'"><i class="fa fa-share" aria-hidden="true"></i><span class="sharesCount">'.(($post->shareCount > 0) ? $post->shareCount : '').'</span></button>').'</li>
								<li>'.(($likes['likeOn'] === $post->postID) ? '<button class="unlike-btn" data-post="'.$post->postID.'" data-user="'.$post->postBy.'"><i class="fa fa-heart" aria-hidden="true"></i><span class="likesCounter">'.$post->likesCount.'</span></button>' : '<button class="like-btn" data-post="'.$post->postID.'" data-user="'.$post->postBy.'"><i class="fa fa-heart-o" aria-hidden="true"></i><span class="likesCounter">'.(($post->likesCount > 0) ? $post->likesCount : '').'</span></button>').'</li>
								'.(($post->postBy === $user_id) ? '
									<li>
									<a href="#" class="more"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
									<ul> 
									<li><label class="deletePost" data-post="'.$post->postID.'">Delete Post</label></li>
									</ul>
									</li>' : '').'
								</ul>
								</div>
								</div>
								</div>
								</div>
								</div>';
							}
							?>
						</div>
						<!-- in left wrap-->
						<div class="popupPost"></div>
						<div class="popupProfile"></div>
					</div>
					<!-- in center end -->

					<div class="in-right">
						<div class="in-right-wrap">
							<!--==WHO TO FOLLOW==-->
							<?php $followClass->whoToFollow($user_id, $user_id) ?>
							<!--==WHO TO FOLLOW==-->

							<!--==TRENDS==-->
							<?php $postClass->trends(); ?>
							<!--==TRENDS==-->
						</div>
						<!-- in left wrap-->
						</div>

					<!-- in right end -->

				</div>
				<!--in full wrap end-->

			</div>
			<!-- in wrappper ends-->

		</div>
		<!-- ends wrapper -->

		<!-- Scripts start -->
		<?php require_once "./includes/scripts.php"; ?>
		<!-- <script src="<?php echo ADMIN_BASE_URL ?>vendor/bootstrap/bootstrap.bundle.min.js"></script>
		<script src="<?php echo BASE_URL ?>assets/js/cropper.js"></script>
		<script src="<?php echo BASE_URL ?>assets/js/cropperCustom.js"></script> -->
		<!-- Scripts end -->
		<script>
			$('#save').click(function(){
				$('#editForm').submit();
			});
		</script>

	</body>
</html>