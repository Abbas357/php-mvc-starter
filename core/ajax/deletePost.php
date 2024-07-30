<?php
include '../init.php';

$userClass->preventAccess($_SERVER['REQUEST_METHOD'], realpath(__FILE__), realpath($_SERVER['SCRIPT_FILENAME']));

if(isset($_POST['deletePost']) && !empty($_POST['deletePost'])){
	$post_id = $_POST['deletePost'];
	$user_id = $_SESSION['user_id'];
	$postClass->delete('posts', array('postID' => $post_id, 'postBy' => $user_id));
}

if(isset($_POST['showPopup']) && !empty($_POST['showPopup'])){
	$post_id = $_POST['showPopup'];
	$user_id = $_SESSION['user_id'];
	$post = $postClass->getPopupPost($post_id);
	?>
	<div class="share-popup">
		<div class="wrap5">
			<div class="share-popup-body-wrap">
				<div class="share-popup-heading">
					<h3>Are you sure you want to delete this Post?</h3>
					<span><button class="close-share-popup"><i class="fa fa-times" aria-hidden="true"></i></button></span>
				</div>
				<div class="share-popup-inner-body">
					<div class="share-popup-inner-body-inner">
						<div class="share-popup-comment-wrap">
							<div class="share-popup-comment-head">
								<img src="<?php echo BASE_URL.$post->profileImage; ?>"/>
							</div>
							<div class="share-popup-comment-right-wrap">
								<div class="share-popup-comment-headline">
									<a><?php echo $post->screenName; ?></a><?php echo $userClass->checkVerified($post->user_id) ? "<i class=\"icon-verified verified\"></i>" : ""; ?><span>‏@<?php echo $post->username; ?> <?php echo $post->postedOn; ?></span>
								</div>
								<div class="share-popup-comment-body">
									<?php echo $post->status; ?>  <?php echo $post->postImage; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="share-popup-footer"> 
					<div class="share-popup-footer-right">
						<button class="cancel-it f-btn">Cancel</button><button class="delete-it" type="submit">Delete</button>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php
}
?>