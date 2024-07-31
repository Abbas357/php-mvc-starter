<?php
include '../init.php';
if(isset($_POST['profilePopup']) && !empty($_POST['profilePopup'])){
	$user_id = $_SESSION['user_id'];
	$profileId = $_POST['profilePopup'];
	$user = $userClass->userData($profileId);
	if(!$userClass->checkSuspension($profileId)){
		if(!$followClass->checkBlockedProfile($profileId, $user_id)){
			if(!$followClass->checkBlockedProfile($user_id, $profileId)){
				?>
				<div class="arrow-top"></div>
				<div class="info-box profile-popup-box">
					<div class="info-inner">
						<div class="info-in-head">
							<img src="<?php echo BASE_URL.$user->profileCover; ?>"/>
						</div>
						<div class="info-in-body">
							<div class="in-b-box">
								<div class="in-b-img">
									<img src="<?php echo BASE_URL.$user->profileImage; ?>"/>
								</div>
							</div>
							<div class="info-body-name">
								<div class="in-b-name">
									<div><a href="<?php echo $user->username; ?>"><?php echo $user->screenName; ?></a><?php echo $userClass->checkVerified($user->user_id) ? "<i class=\"icon-verified verified\"></i>" : ""; ?></div>
									<span><small><a href="<?php echo $user->username; ?>">@<?php echo $user->username; ?></a></small></span>
								</div>
							</div>
						</div>
						<div class="info-in-footer">
							<div class="number-wrapper">
								<div class="num-box">
									<div class="num-head">
										<a href="<?php echo BASE_URL.$user->username;?>">TWEETS</a>
									</div>
									<div class="num-body">
										<?php $postClass->countPosts($profileId); ?>
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
							</div>
						</div>
					</div>
				</div>

				<?php
			}
		}
	}
}
?>