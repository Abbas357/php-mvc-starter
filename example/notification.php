<?php
include 'core/init.php';
$user_id = $_SESSION['user_id'];
$user = $userClass->userData($user_id);
//For Notification
$messageClass->notificationViewed($user_id);
$notify = $messageClass->getNotificationCount($user_id);
$notification = $messageClass->notification($user_id);
if($userClass->loggedIn() === false){
	header('Location: '.BASE_URL.'index.php');
}

if(isset($_POST['post'])){
	$status = $userClass->checkInput($_POST['status']);
	$postImage = '';

	if(!empty($status) or !empty($_FILES['file']['name'][0])){
		if(!empty($_FILES['file']['name'][0])){
			$postImage = $userClass->uploadImage($_FILES['file']);
		}

		if(strlen($status) > 140){
			$error = "The text of your post is too long";
		}
		$userClass->create('posts', array('status' => $status, 'postBy' => $user_id, 'postImage' => $postImage, 'postedOn' => date('Y-m-d H:i:s')));
		preg_match_all("/#+([a-zA-Z0-9_]+)/i", $status, $hashtag);
		if(!empty($hashtag)){
			$postClass->addTrend($status, $user_id);
		}
	}else{
		$error = "Type or choose image to post";
	}
}

?>

<!DOCTYPE HTML> 
<html>
<head>
	<title>Notifications</title>
	<meta charset="UTF-8" />

	<!-- Styles start -->
	<?php require_once "./includes/styles.php" ?>	
	<!-- Styles end -->

</head>
<body>

	<!-- Header Wrapper start -->
	<?php include "./includes/header.php" ?>
	<!-- Header Wrapper end -->
	
		<!---Inner wrapper-->
		<div class="inner-wrapper">
			<div class="in-wrapper">
				<div class="in-full-wrap">
					<div class="in-left">
						<div class="in-left-wrap">
							<div class="info-box">
								<div class="info-inner">
									<div class="info-in-head">
										<!-- PROFILE-COVER-IMAGE -->
										<img src="<?php echo BASE_URL.$user->profileCover; ?>"/>
									</div><!-- info in head end -->
									<div class="info-in-body">
										<div class="in-b-box">
											<div class="in-b-img">
												<!-- PROFILE-IMAGE -->
												<img src="<?php echo BASE_URL.$user->profileImage; ?>"/>
											</div>
										</div><!--  in b box end-->
										<div class="info-body-name">
											<div class="in-b-name">
												<div><a href="<?php echo BASE_URL.$user->username; ?>"><?php echo $user->screenName; ?></a><?php echo $userClass->checkVerified($user->user_id) ? "<i class=\"icon-verified verified\"></i>" : ""; ?></div>
												<span><small><a href="<?php echo BASE_URL.$user->username; ?>">@<?php echo $user->username; ?></a></small></span>
											</div><!-- in b name end-->
										</div><!-- info body name end-->
									</div><!-- info in body end-->
									<div class="info-in-footer">
										<div class="number-wrapper">
											<div class="num-box">
												<div class="num-head">
													<a href="<?php echo BASE_URL.$user->username;?>">TWEETS</a>
												</div>
												<div class="num-body">
													<?php $postClass->countPosts($user_id); ?>
												</div>
											</div>
											<div class="num-box">
												<div class="num-head">
													<a href="<?php echo BASE_URL.$user->username;?>/following">FOLLOWING</a>
												</div>
												<div class="num-body">
													<span class="count-following"><?php echo $followClass->calcFollowingCount($user->user_id); ?></span>
												</div>
											</div>
											<div class="num-box">
												<div class="num-head">
													<a href="<?php echo BASE_URL.$user->username;?>/followers">FOLLOWERS</a>
												</div>
												<div class="num-body">
													<span class="count-followers"><?php echo $followClass->calcFollowersCount($user->user_id); ?></span>
												</div>
											</div>	
										</div><!-- mumber wrapper-->
									</div><!-- info in footer -->
								</div><!-- info inner end -->
							</div><!-- info box end-->

							<!--==TRENDS==-->
							<?php $postClass->trends(); ?>
							<!--==TRENDS==-->

						</div><!-- in left wrap-->
					</div><!-- in left end-->
					<div class="in-center">
						<div class="in-center-wrap">

							<!--Notificatiion starts here-->

							<!--NOTIFICATION WRAPPER FULL WRAPPER-->
							<div class="notification-full-wrapper">

								<div class="notification-full-head">
									<div>
										<a href="#">All</a>
									</div>
									<div>
										<a href="#">Mention</a>
									</div>
									<div>
										<a href="#">settings</a>
									</div>
								</div>
								<?php foreach($notification as $data): ?>
									<?php if($data->type == 'follow'): ?>
										<!-- Follow Notification -->
										<!--NOTIFICATION WRAPPER-->
										<div class="notification-wrapper">
											<div class="notification-inner">
												<div class="notification-header">

													<div class="notification-img">
														<span class="follow-logo">
															<i class="fa fa-child" aria-hidden="true"></i>
														</span>
													</div>
													<div class="notification-name">
														<div>
															<img src="<?php echo BASE_URL.$data->profileImage; ?>"/>
														</div>

													</div>
													<div class="notification-post"> 
														<a href="<?php echo BASE_URL.$data->username; ?>" class="notifi-name profile-popup" data-popup="<?php echo $data->user_id ?>"><?php echo $data->screenName; ?></a><?php echo $userClass->checkVerified($data->user_id) ? "<i class=\"icon-verified verified\"></i>" : ""; ?><span> Followed you - <span><?php echo $userClass->timeAgo($data->time); ?></span>

													</div>

												</div>

											</div>
											<!--NOTIFICATION-INNER END-->
										</div>
										<!--NOTIFICATION WRAPPER END-->
										<!-- Follow Notification -->
									<?php endif; ?>

									<?php if($data->type == 'like'): ?>
										<!-- Like Notification -->
										<!--NOTIFICATION WRAPPER-->
										<div class="notification-wrapper">
											<div class="notification-inner">
												<div class="notification-header">
													<div class="notification-img">
														<span class="heart-logo">
															<i class="fa fa-heart" aria-hidden="true"></i>
														</span>
													</div>
													<div class="notification-name">
														<div>
															<img src="<?php echo BASE_URL.$data->profileImage; ?>"/>
														</div>
													</div>
												</div>
												<div class="notification-post"> 
													<a href="<?php echo BASE_URL.$data->username; ?>" class="notifi-name profile-popup" data-popup="<?php echo $data->user_id ?>"><?php echo $data->screenName; ?></a><?php echo $userClass->checkVerified($data->user_id) ? "<i class=\"icon-verified verified\"></i>" : ""; ?><span> liked your <?php if($data->postBy == $user_id){echo 'Post';}else{echo 'Share';} ?> - <span><?php echo $userClass->timeAgo($data->time); ?></span>
												</div>
												<div class="notification-footer">
													<div class="noti-footer-inner">
														<div class="noti-footer-inner-left">
															<div class="t-h-c-name">
																<span><a href="<?php echo BASE_URL.$user->username; ?>"><?php echo $user->screenName; ?></a></span>
																<span>@<?php echo $user->username; ?></span>
																<span><?php echo $userClass->timeAgo($data->postedOn); ?></span>
															</div>
															<div class="noti-footer-inner-right-text">		
																<?php echo $postClass->getPostLinks($data->status); ?>
															</div>
														</div>
														<?php if(!empty($data->postImage)): ?>
															<div class="noti-footer-inner-right">
																<img src="<?php echo BASE_URL.$data->postImage; ?>"/>	
															</div> 
														<?php endif; ?>

													</div><!--END NOTIFICATION-inner-->
												</div>
											</div>
										</div>
										<!--NOTIFICATION WRAPPER END--> 
										<!-- Like Notification -->
									<?php endif; ?>

									<?php if($data->type == 'share'): ?>

										<!-- Share Notification -->
										<!--NOTIFICATION WRAPPER-->
										<div class="notification-wrapper">
											<div class="notification-inner">
												<div class="notification-header">

													<div class="notification-img">
														<span class="share-logo">
															<i class="fa fa-share" aria-hidden="true"></i>
														</span>
													</div>
													<div class="notification-post"> 
														<a href="<?php echo BASE_URL.$data->username; ?>" class="notifi-name profile-popup" data-popup="<?php echo $data->user_id ?>"><?php echo $data->screenName; ?></a><?php echo $userClass->checkVerified($data->user_id) ? "<i class=\"icon-verified verified\"></i>" : ""; ?><span> share your <?php if($data->postBy == $user_id){echo 'Post';}else{echo 'Share';} ?>- <span><?php echo $userClass->timeAgo($data->time); ?></span>
													</div>
													<div class="notification-footer">
														<div class="noti-footer-inner">

															<div class="noti-footer-inner-left">
																<div class="t-h-c-name">
																	<span><a href="<?php echo BASE_URL.$user->username; ?>"><?php echo $user->screenName; ?></a></span>
																	<span>@<?php echo $user->username; ?></span>
																	<span><?php echo $userClass->timeAgo($data->postedOn); ?></span>
																</div>
																<div class="noti-footer-inner-right-text">		
																	<?php echo $postClass->getPostLinks($data->status); ?>
																</div>
															</div>


															<?php if(!empty($data->postImage)): ?>
																<div class="noti-footer-inner-right">
																	<img src="<?php echo BASE_URL.$data->postImage; ?>"/>	
																</div> 
															<?php endif; ?>

														</div><!--END NOTIFICATION-inner-->
													</div>
												</div>
											</div>
										</div>
										<!--NOTIFICATION WRAPPER END-->
										<!-- Share Notification -->
									<?php endif; ?>

									<?php if($data->type == 'mention'): ?>

										<?php
										$post = $data;
										$likes = $postClass->likes($user_id, $post->postID); 
										$share = $postClass->checkShare($post->postID, $user_id);
										echo '<div class="all-post-inner">
										<div class="t-show-wrap">	
										<div class="t-show-inner">
										<div class="t-show-popup" data-post="'.$post->postID.'">
										<div class="t-show-head">
										<div class="t-show-img">
										<img src="'.BASE_URL.$post->profileImage.'"/>
										</div>
										<div class="t-s-head-content">
										<div class="t-h-c-name">
										<span><a href="'.$post->username.'" class="profile-popup" data-popup="'.$data->user_id.'">'.$post->screenName.(($userClass->checkVerified($post->user_id)) ? '<i class="icon-verified verified"></i>' : '').'</a></span>
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

										</div>
										<div class="t-show-footer">
										<div class="t-s-f-right">
										<ul> 
										'.(($userClass->loggedIn() === true) ? '
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
										?>	

									<?php endif; ?>


								<?php endforeach; ?>
							</div>
							<!--NOTIFICATION WRAPPER FULL WRAPPER END-->

							<!--Notificatiion ends here-->

							<div class="loading-div">
								<img id="loader" src="<?php echo BASE_URL; ?>assets/images/loading.svg" style="display: none;"/> 
							</div>
							<div class="popupPost"></div>	
							<div class="popupProfile"></div>	
						</div><!-- in left wrap-->
						</div><!-- in center end -->

						<div class="in-right">
							<div class="in-right-wrap">

								<!--Who To Follow-->
								<?php $followClass->whoToFollow($user_id,$user_id) ?>
								<!--Who To Follow-->

							</div><!-- in left wrap-->

						</div><!-- in right end -->

					</div><!--in full wrap end-->

				</div><!-- in wrappper ends-->
			</div><!-- inner wrapper ends-->
		</div><!-- ends wrapper -->

		<!-- Scripts start -->
		<?php require_once "./includes/scripts.php"; ?>
		<!-- Scripts end -->
		
	</body>
</html>