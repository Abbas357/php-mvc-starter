<?php
include '../init.php';
$userClass->preventAccess($_SERVER['REQUEST_METHOD'], realpath(__FILE__), realpath($_SERVER['SCRIPT_FILENAME']));

$user_id = $_SESSION['user_id'];
if(isset($_POST['share']) && !empty($_POST['share'])){
	$post_id = $_POST['share'];
	$get_id = $_POST['user_id'];
	$comment = $userClass->checkInput($_POST['comment']);
	$postClass->share($post_id, $user_id, $get_id, $comment);

}
if(isset($_POST['showPopup']) && !empty($_POST['showPopup'])){
	$post_id = $_POST['showPopup'];
	$get_id = $_POST['user_id'];
	$post = $postClass->getPopupPost($post_id);
	?>
	<div class="share-popup">
		<div class="wrap5">
			<div class="share-popup-body-wrap">
				<div class="share-popup-heading">
					<h3>Share this to followers?</h3>
					<span><button class="close-share-popup"><i class="fa fa-times" aria-hidden="true"></i></button></span>
				</div>
				<div class="share-popup-input">
					<div class="share-popup-input-inner">
						<input type="text" class="shareMsg" placeholder="Add a comment.."/>
					</div>
				</div>
				<div class="share-popup-inner-body">
					<div class="share-popup-inner-body-inner">
						<div class="share-popup-comment-wrap">
							<div class="share-popup-comment-head">
								<img src="<?php echo BASE_URL.$post->profileImage; ?>"/>
							</div>
							<div class="share-popup-comment-right-wrap">
								<div class="share-popup-comment-headline">
									<a><?php echo $post->screenName; ?></a><?php echo $userClass->checkVerified($post->user_id) ? "<i class=\"icon-verified verified\"></i>" : ""; ?><span>‏@<?php echo $post->username; ?> - <?php echo $post->postedOn; ?></span>
								</div>
								<div class="share-popup-comment-body">
									<?php echo $postClass->getPostLinks($post->status); ?>  <?php echo $post->postImage; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="share-popup-footer"> 
					<div class="share-popup-footer-right">
						<button class="share-it" type="submit">Share</button>
					</div>
				</div>
			</div>
		</div>
	</div><!-- Share PopUp ends-->
	<?php
}
?>