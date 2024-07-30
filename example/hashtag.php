<?php
include 'core/init.php';

if(isset($_GET['hashtag']) && !empty($_GET['hashtag'])){
	$hashtag = $userClass->checkInput($_GET['hashtag']);
	$user_id = @$_SESSION['user_id'];
	$user = $userClass->userData($user_id);
	$posts = $postClass->getPostsByHash($hashtag);
	$accounts = $postClass->getUsersByHash($hashtag);
	$notify = $messageClass->getNotificationCount($user_id);

}else{
	header('Location: '.BASE_URL.'index.php');
}

?>

<!doctype html>
<html>
<head>
	<title><?php echo '#'.$hashtag.' hashtag on Pak Connect'; ?></title>
	<meta charset="UTF-8" />

	<!-- Styles start -->
	<?php require_once "./includes/styles.php" ?>	
	<!-- Styles end -->

</head>
<body>

	<!-- Header Wrapper start -->
	<?php include "./includes/header.php" ?>	
	<!-- Header Wrapper end -->
	
			<!--#hash-header-->
			<div class="hash-header">
				<div class="hash-inner">
					<h1>#<?php echo $hashtag; ?></h1>
				</div>
			</div>	
			<!--#hash-header end-->

			<!--hash-menu-->
			<div class="hash-menu">
				<div class="hash-menu-inner">
					<ul>
						<li><a href="<?php echo BASE_URL.'hashtag/'.$hashtag; ?>">Latest</a></li>
						<li><a href="<?php echo BASE_URL.'hashtag/'.$hashtag.'?f=users'; ?>">Accounts</a></li>
						<li><a href="<?php echo BASE_URL.'hashtag/'.$hashtag.'?f=photos'; ?>">Photos</a></li>
					</ul>
				</div>
			</div>
			<!--hash-menu-->
			<!---Inner wrapper-->

			<div class="in-wrapper">
				<div class="in-full-wrap">

					<div class="in-left">
						<div class="in-left-wrap">

							<?php $followClass->whoToFollow($user_id, $user_id); ?>

						</div>
						<!-- in left wrap-->
					</div>
					<!-- in left end-->
					<?php if(strpos($_SERVER['REQUEST_URI'], '?f=photos')): ?>
						<!-- TWEETS IMAGES  -->
						<div class="hash-img-wrapper"> 
							<div class="hash-img-inner"> 
								<?php
								foreach ($posts as $post) {
									$likes = $postClass->likes($user_id, $post->postID); 
									$share = $postClass->checkShare($post->postID, $user_id);
									$user = $userClass->userData($post->shareBy);

									if(!empty($post->postImage)){
										echo '<div class="hash-img-flex">
										<img src="'.BASE_URL.$post->postImage.'" class="imagePopup" data-post="'.$post->postID.'"/>
										<div class="hash-img-flex-footer">
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
										</div>';
									}
								}
								?>	

							</div>
						</div> 
						<!-- TWEETS IMAGES -->
					<?php elseif(strpos($_SERVER['REQUEST_URI'], '?f=users')): ?>	
						<!--TWEETS ACCOUTS-->
						<div class="wrapper-following">
							<div class="wrap-follow-inner">
								<?php foreach ($accounts as $users): ?> 
									<div class="follow-unfollow-box">
										<div class="follow-unfollow-inner">
											<div class="follow-background">
												<img src="<?php echo BASE_URL.$users->profileCover; ?>"/>
											</div>
											<div class="follow-person-button-img">
												<div class="follow-person-img">
													<img src="<?php echo BASE_URL.$users->profileImage; ?>"/>
												</div>
												<div class="follow-person-button">
													<?php echo $followClass->followBtn($users->user_id, $user_id, $user_id); ?>
												</div>
											</div>
											<div class="follow-person-bio">
												<div class="follow-person-name">
													<a href="#"><?php echo $users->screenName; ?></a>
												</div>
												<div class="follow-person-tname">
													<a href="<?php echo BASE_URL.$users->username; ?>"> @<?php echo $users->username; ?></a><?php echo $followClass->checkFollowsYou($user_id, $users->user_id) ? "<span class='follow-you'>Follows You</span>" : ""; ?>
												</div>
												<div class="follow-person-dis">
													<?php echo $postClass->getPostLinks($users->bio); ?>
												</div>
											</div>
										</div>
									</div>
								<?php endforeach; ?>
							</div>
						</div>
						<!-- TWEETS ACCOUNTS -->
					<?php else: ?>

						<div class="in-center">
							<div class="in-center-wrap">
								<?php
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
										<span><a href="'.BASE_URL.$user->username.'">'.$user->screenName.'</a>'.(($userClass->checkVerified($user->user_id)) ? '<i class="icon-verified verified"></i>' : '').'</span>
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
										<span><a href="'.BASE_URL.$post->username.'">'.$post->screenName.'</a>'.(($userClass->checkVerified($post->user_id)) ? '<i class="icon-verified verified"></i>' : '').'</span>
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
										<span><a href="'.$post->username.'" data-popup="'.$post->user_id.'" class="profile-popup">'.$post->screenName.'</a>'.(($userClass->checkVerified($post->user_id)) ? '<i class="icon-verified verified"></i>' : '').'</span>
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
							</div>
						</div>
						
						<div class="in-right" style="margin-top: -10px">

							<?php $postClass->trends(); ?>

						</div>
					<?php endif; ?>
					<div class="popupPost"></div>
					<div class="popupProfile"></div>
				</div><!--in full wrap end-->
			</div><!-- in wrappper ends-->

		</div><!-- ends wrapper -->

		<!-- Scripts start -->
		<?php require_once "./includes/scripts.php"; ?>
		<!-- Scripts end -->

	</body>
</html>