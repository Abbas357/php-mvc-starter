<?php
include '../init.php';

$userClass->preventAccess($_SERVER['REQUEST_METHOD'], realpath(__FILE__), realpath($_SERVER['SCRIPT_FILENAME']));

if(isset($_POST['showImage']) && !empty($_POST['showImage'])){
	$post_id = $_POST['showImage'];
	$user_id = @$_SESSION['user_id'];
	$post = $postClass->getPopupPost($post_id);
	$likes = $postClass->likes($user_id, $post_id);
	$share = $postClass->checkShare($post_id, $user_id);
	?>
	<div class="img-popup">
		<div class="wrap6">
			<span class="colose">
				<button class="close-imagePopup"><i class="fa fa-times" aria-hidden="true"></i></button>
			</span>
			<div class="img-popup-wrap">
				<div class="img-popup-body">
					<img src="<?php echo BASE_URL.$post->postImage; ?>"/>
				</div>
				<div class="img-popup-footer">
					<div class="img-popup-post-wrap">
						<div class="img-popup-post-wrap-inner">
							<div class="img-popup-post-left">
								<img src="<?php echo BASE_URL.$post->profileImage; ?>"/>
							</div>
							<div class="img-popup-post-right">
								<div class="img-popup-post-right-headline">
									<a href="<?php echo BASE_URL.$post->username; ?>"><?php echo $post->screenName; ?></a><?php echo $userClass->checkVerified($post->user_id) ? "<i class=\"icon-verified verified\"></i>" : ""; ?><span>@<?php echo $post->username; ?> - <?php echo $post->postedOn; ?></span>
								</div>
								<div class="img-popup-post-right-body">
									<?php echo $postClass->getPostLinks($post->status); ?>
								</div>
							</div>
						</div>
					</div>
					<div class="img-popup-post-menu">
						<div class="img-popup-post-menu-inner">
							<ul>
								<?php if($userClass->loggedIn() === true){
									echo '<li><button><i class="fa fa-share" aria-hidden="true"></i></button></li>	
									<li>'.(($post->postID === $share['shareID']) ? '<button class="Share" data-post="'.$post->postID.'" data-user="'.$post->postBy.'"><i class="fa fa-share" aria-hidden="true"></i><span class="sharesCount">'.$post->shareCount.'</span></button>' : '<button class="share" data-post="'.$post->postID.'" data-user="'.$post->postBy.'"><i class="fa fa-share" aria-hidden="true"></i><span class="sharesCount">'.(($post->shareCount > 0) ? $post->shareCount : '').'</span></button>').'</li>
									<li>'.(($likes['likeOn'] === $post->postID) ? '<button class="unlike-btn" data-post="'.$post->postID.'" data-user="'.$post->postBy.'"><i class="fa fa-heart" aria-hidden="true"></i><span class="likesCounter">'.$post->likesCount.'</span></button>' : '<button class="like-btn" data-post="'.$post->postID.'" data-user="'.$post->postBy.'"><i class="fa fa-heart-o" aria-hidden="true"></i><span class="likesCounter">'.(($post->likesCount > 0) ? $post->likesCount : '').'</span></button>').'</li>
									'.(($post->postBy === $user_id) ? '
										<li><label for="img-popup-menu"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></label>
										<input id="img-popup-menu" type="checkbox"/>
										<div class="img-popup-footer-menu">
										<ul>
										<li><label class="deletePost">Delete Post</label></li>
										</ul>
										</div>
										</li>' : '');
								}else{
									echo '<li><button><i class="fa fa-share" aria-hidden="true"></i></button></li>	
									<li><button class="share"><i class="fa fa-share" aria-hidden="true"></i><span class="sharesCount"></span></button></li>
									<li><button class="like-btn"><i class="fa fa-heart-o" aria-hidden="true"></i><span class="likesCounter"></span></button></li>';
								}
								?> 
								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!-- Image PopUp ends-->
	<?php
}
?>