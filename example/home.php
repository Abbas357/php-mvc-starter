<?php
include 'core/init.php';
$user_id = $_SESSION['user_id'];
$user = $userClass->userData($user_id);
//For Notification
$notify = $messageClass->getNotificationCount($user_id);
if($userClass->loggedIn() === false){
	header("Location: index.php");
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
		$post_id = $userClass->create('posts', array('status' => $status, 'postBy' => $user_id, 'postImage' => $postImage, 'postedOn' => date('Y-m-d H:i:s')));
		preg_match_all("/#+([a-zA-Z0-9_]+)/i", $status, $hashtag);
		
		if(!empty($hashtag)){
			$postClass->addTrend($status, $user_id);
		}
		
		$postClass->addMention($status, $user_id, $post_id);
		
	}else{
		$error = "Type or choose image to post";
	}
}

?>

<?php 
	if($userClass->checkSuspension($user_id)){
		$userClass->logout();
		if($userClass->loggedIn() === false){
			header("Location: ../$user->username");
		}
	}
?>

<!DOCTYPE HTML> 
<html>
<head>
	<title>Pak Connect | Homepage</title>
	<meta charset="UTF-8" />

	<!-- Styles start -->
	<?php require_once "./includes/styles.php" ?>	
	<!-- Styles end -->

</head>
<body>

	<!-- Wrapper start -->
	<?php include "./includes/header.php" ?>	
	<!-- Wrapper end -->
	
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
										<img src="<?php echo $user->profileCover; ?>"/>
									</div><!-- info in head end -->
									<div class="info-in-body">
										<div class="in-b-box">
											<div class="in-b-img">
												<!-- PROFILE-IMAGE -->
												<img src="<?php echo $user->profileImage; ?>"/>
											</div>
										</div><!--  in b box end-->
										<div class="info-body-name">
											<div class="in-b-name">
												<div><a href="<?php echo $user->username; ?>"><?php echo $user->screenName; ?></a><?php echo $userClass->checkVerified($user->user_id) ? "<i class=\"icon-verified verified\"></i>" : ""; ?></div>
												<span><small><a href="<?php echo $user->username; ?>">@<?php echo $user->username; ?></a></small></span>
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
													<span class="count-following"><?php echo $followClass->calcFollowingCount($user->user_id);  ?></span>
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
							<!--TWEET WRAPPER-->
							<div class="post-wrap">
								<div class="post-inner">
									<div class="post-h-left">
										<div class="post-h-img">
											<!-- PROFILE-IMAGE -->
											<img src="<?php echo $user->profileImage; ?>"/>
										</div>
									</div>
									<div class="post-body">
										<form method="post" enctype="multipart/form-data">
											<textarea class="status" name="status" placeholder="Type Something here!" rows="4" cols="50"></textarea>
											<div class="hash-box">
												<ul>
												</ul>
											</div>
										</div>
										<div class="post-footer">
											<div class="t-fo-left photo-left">
												<ul>
													<input type="file" name="file" id="file"/>
													<li><label for="file"><i class="fa fa-camera" aria-hidden="true"></i></label>
														<span class="post-error"><?php if(isset($error)){ echo $error; }elseif(isset($imageError)){ echo $imageError;} ?></span>
													</li>
												</ul>
											</div>
											<div class="t-fo-right post-right">
												<span id="count">140</span>
												<input type="submit" name="post" value="post"/>
											</form>
										</div>
									</div>
								</div>
							</div><!--TWEET WRAP END-->


							<!--Post SHOW WRAPPER-->
							<div class="posts">
								<?php $postClass->posts($user_id, 10); ?>
							</div>
							<!--TWEETS SHOW WRAPPER-->

							<div class="loading-div">
								<img id="loader" src="assets/images/loading.svg" style="display: none;"/> 
							</div>
							<div class="popupPost"></div>
							<div class="popupProfile"></div>
							<!--Post END WRAPER-->
						</div><!-- in left wrap-->
					</div><!-- in center end -->

						<div class="in-right">
							<div class="in-right-wrap">

								<!--Who To Follow-->
								<?php $followClass->whoToFollow($user_id,$user_id) ?>
								<!--Who To Follow-->
								<div style="font-size: 12px; color: grey">
									<br><p class="copyright">&copy; <a href="/">Pakconnect.com</a> 2018-2019</p>
							</div><!--in full wrap end-->

						</div><!-- in wrappper ends-->
					</div><!-- inner wrapper ends-->
				</div><!-- ends wrapper -->

		<!-- Scripts start -->
		<?php require_once "./includes/scripts.php"; ?>
		<!-- Scripts end -->

		</body>
</html>