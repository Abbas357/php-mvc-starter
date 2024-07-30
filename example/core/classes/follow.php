<?php
class Follow extends User {

	function __construct($pdo){
		$this->pdo = $pdo;
	}

	public function checkFollow($followerID, $user_id){
		$stmt = $this->pdo->prepare("SELECT * FROM `follow` WHERE `sender` = :user_id AND `receiver` = :followerID");
		$stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
		$stmt->bindParam(":followerID", $followerID, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function checkFollowsYou($user_id, $followerID){
		$stmt = $this->pdo->prepare("SELECT * FROM `follow` WHERE `sender` = :followerID AND `receiver` = :user_id");
		$stmt->bindParam(":followerID", $followerID, PDO::PARAM_INT);
		$stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
		$stmt->execute();
		$count = $stmt->rowCount();
		if($count > 0){
			return true;
		}else {
			return false;
		}
	}

	public function followBtn($profileID, $user_id, $followID){
		$data = $this->checkFollow($profileID, $user_id);
		if($this->loggedIn() === true){
			if($profileID != $user_id){
				if($data['receiver'] == $profileID){
					//Following
					if(!$this->checkBlockedProfile($user_id, $profileID)){
						if(!$this->checkBlockedProfile($user_id, $profileID)){
							return "<button class='f-btn following-btn follow-btn' data-follow='".$profileID."' data-profile='".$followID."'>Following</button>";
						}else {
							return "<button class='f-btn blocked-follow' disabled>Follow</button>";
						}}else{
							return "<button class='f-btn blocked-follow' disabled>Follow</button>";
						}
						
					}else{
					//Follow button
						if(!$this->checkBlockedProfile($profileID, $user_id)){
							if(!$this->checkBlockedProfile($user_id, $profileID)){
								return "<button class='f-btn follow-btn' data-follow='".$profileID."' data-profile='".$followID."'><i class='fa fa-user-plus'></i>Follow</button>";
							}else {
								return "<button class='f-btn blocked-follow' disabled><i class='fa fa-remove'></i>Follow</button>";
							}}else{
								return "<button class='f-btn blocked-follow' disabled><i class='fa fa-remove'></i>Follow</button>";
							}
						}
					}else{
				//edit button
						return "<button class='f-btn fa fa-edit' onclick=location.href='".BASE_URL."profileEdit.php'></i> Edit Profile</button>";
					}
				}else{
					return "<button class='f-btn' onclick=location.href='index.php'><i class='fa fa-user-plus'></i></button>";
				}
			}

			public function follow($followID, $user_id, $profileID){
				$this->create('follow', array('sender' => $user_id, 'receiver' => $followID, 'followOn' => date('Y-m-d')));
				$stmt = $this->pdo->prepare("SELECT `user_id`, `following`, `followers` FROM `users` LEFT JOIN `follow` ON `sender` = :user_id AND CASE WHEN `receiver` = :user_id THEN `sender` = `user_id` END WHERE `user_id` = :profileID");
				$stmt->execute(array("user_id" => $user_id, "profileID" => $profileID));
				$data = $stmt->fetch(PDO::FETCH_ASSOC);
				echo json_encode($data);
				$this->sendNotification($followID, $user_id, $followID, 'follow');
			}

			public function unfollow($followID, $user_id, $profileID){
				$this->delete('follow', array('sender' => $user_id, 'receiver' => $followID));
				$stmt = $this->pdo->prepare("SELECT `user_id`, `following`, `followers` FROM `users` LEFT JOIN `follow` ON `sender` = :user_id AND CASE WHEN `receiver` = :user_id THEN `sender` = `user_id` END WHERE `user_id` = :profileID");
				$stmt->execute(array("user_id" => $user_id, "profileID" => $profileID));
				$data = $stmt->fetch(PDO::FETCH_ASSOC);
				echo json_encode($data);
			}

			public function calcFollowingCount($profileId){
				$stmt = $this->pdo->prepare("SELECT COUNT(`sender`) AS `following` FROM `follow` where `sender` = :profileId");
				$stmt->bindParam(":profileId", $profileId, PDO::PARAM_INT);
				$stmt->execute();
				$count = $stmt->fetch(PDO::FETCH_OBJ);
				return $count->following;
			}

			public function calcFollowersCount($profileId){
				$stmt = $this->pdo->prepare("SELECT COUNT(`receiver`) AS `followers` FROM `follow` where `receiver` = :profileId");
				$stmt->bindParam(":profileId", $profileId, PDO::PARAM_INT);
				$stmt->execute();
				$count = $stmt->fetch(PDO::FETCH_OBJ);
				return $count->followers;
			}

			public function checkBlocked($profileID, $user_id){
				$stmt = $this->pdo->prepare("SELECT * FROM `block` WHERE `blockBy` = :user_id AND `blocked` = :profileID");
				$stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
				$stmt->bindParam(":profileID", $profileID, PDO::PARAM_INT);
				$stmt->execute();
				return $stmt->fetch(PDO::FETCH_ASSOC);
			}

			public function blockBtn($profileID, $user_id){
				$data = $this->checkBlocked($profileID, $user_id);
				if($this->loggedIn() === true){
					if($profileID != $user_id){
						if($data['blocked'] == $profileID){
					//Blocked
							return "<button class='b-btn blocked block-btn' data-profile='".$profileID."'>Blocked</button>";
						}else{
					//Block
							return "<button class='b-btn not-blocked block-btn' data-profile='".$profileID."'><i class='fa fa-'></i>Block</button>";
						}
					}
				}
			}

			public function block($user_id, $profileID){
				$this->create('block', array('blockBy' => $user_id, 'blocked' => $profileID));
			}

			public function unBlock($user_id, $profileID){
				$this->delete('block', array('blockBy' => $user_id, 'blocked' => $profileID));
			}

			public function checkBlockedProfile($user_id, $profileID){
				$stmt = $this->pdo->prepare("SELECT * FROM `block` WHERE `blockBy` = :user_id AND `blocked` = :profileID");
				$stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
				$stmt->bindParam(":profileID", $profileID, PDO::PARAM_INT);
				$stmt->execute();
				$user = $stmt->fetch(PDO::FETCH_OBJ);
				$count = $stmt->rowCount();
				if($count > 0) {
					return true;
				}else{
					return false;
				}
			}

			public function getBlockedAccounts($user_id){
				$stmt = $this->pdo->prepare("SELECT `blocked` FROM `block` LEFT JOIN `users` ON `blockBy` = `user_id` WHERE `blockBy` = :user_id AND `suspended` = 0");
				$stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
				$stmt->execute();
				$users = $stmt->fetchAll(PDO::FETCH_OBJ);
				foreach($users as $user){
					$stmt = $this->pdo->prepare("SELECT * FROM `users` WHERE `user_id` = $user->blocked");
					$stmt->execute();
					$user = $stmt->fetch(PDO::FETCH_OBJ);
					echo '<div class="blocked-body">
					<div class="blocked-body-info">
					<div class="follow-img">
					<img src="'.BASE_URL.$user->profileImage.'"/>
					</div>
					<div class="fo-co-head">
					<a href="'.BASE_URL.$user->username.'" class="profile-popup" data-popup="'.$user->user_id.'">'.$user->screenName.'</a>'.(($this->checkVerified($user->user_id)) ? '<i class="icon-verified verified"></i>' : '').'<br /><span> @' .$user->username.'</span>
					</div>
					</div>
					<!-- BLOCK BUTTON -->
					<div class="blocked-body-btn">
					'.$this->blockBtn($user->user_id, $user_id).'
					</div>
					</div>
					<hr style="border-top: 0.5px solid #eeefff; width: 100%" />';
				}
			}

			public function reportBtn($profileID, $user_id){
				if($this->loggedIn() === true){
					if($profileID != $user_id){
						return "<button class='report-btn' data-profile='".$profileID."'>Report</button>";
					}
				}
			}

			public function photosCount($profileID){
				$stmt = $this->pdo->prepare("SELECT COUNT(`postImage`) as 
					`totalImages` FROM `posts` WHERE NULLIF(postImage, '') IS NOT NULL and postBy = :profileID");
				$stmt->bindParam(":profileID", $profileID, PDO::PARAM_INT);
				$stmt->execute();
				$count = $stmt->fetch(PDO::FETCH_OBJ);
				return $count->totalImages;
			}

			public function followingList($profileID, $user_id, $followID){
				$stmt = $this->pdo->prepare("SELECT * FROM `users` LEFT JOIN `follow` ON `receiver` = `user_id` AND CASE WHEN `sender` = :user_id THEN `receiver` = `user_id` END WHERE `sender` IS NOT NULL");
				$stmt->bindParam(":user_id", $profileID, PDO::PARAM_INT);
				$stmt->execute();
				$followings =$stmt->fetchAll(PDO::FETCH_OBJ);
				foreach ($followings as $following) {
					echo '<div class="follow-unfollow-box">
					<div class="follow-unfollow-inner">
					<div class="follow-background">
					<img src="'.BASE_URL.$following->profileCover.'"/>
					</div>
					<div class="follow-person-button-img">
					<div class="follow-person-img"> 
					<img src="'.BASE_URL.$following->profileImage.'"/>
					</div>
					<div class="follow-person-button">
					<!-- FOLLOW BUTTON -->
					'.$this->followBtn($following->user_id, $user_id, $followID) .'
					</div>
					</div>
					<div class="follow-person-bio">
					<div class="follow-person-name">
					<a href="'.BASE_URL.$following->username.'">'.$following->screenName.'</a>'.(($this->checkVerified($following->user_id)) ? '<i class="icon-verified verified"></i>' : '').'
					</div>
					<div class="follow-person-tname">
					<a href="'.BASE_URL.$following->username.'">@'.$following->username.'</a>'.(($this->checkFollowsYou($user_id, $following->user_id)) ? '<span class="follow-you">Follows You</span>' : '').'
					</div>
					<div class="follow-person-dis">
					'.Post::getPostLinks($following->bio).'
					</div>
					</div>
					</div>
					</div>';
				}
			}

			public function followersList($profileID, $user_id, $followID){
				$stmt = $this->pdo->prepare("SELECT * FROM `users` LEFT JOIN `follow` ON `sender` = `user_id` AND CASE WHEN `receiver` = :user_id THEN `sender` = `user_id` END WHERE `receiver` IS NOT NULL");
				$stmt->bindParam(":user_id", $profileID, PDO::PARAM_INT);
				$stmt->execute();
				$followings =$stmt->fetchAll(PDO::FETCH_OBJ);
				foreach ($followings as $following) {
					echo '<div class="follow-unfollow-box">
					<div class="follow-unfollow-inner">
					<div class="follow-background">
					<img src="'.BASE_URL.$following->profileCover.'"/>
					</div>
					<div class="follow-person-button-img">
					<div class="follow-person-img"> 
					<img src="'.BASE_URL.$following->profileImage.'"/>
					</div>
					<div class="follow-person-button">
					<!-- FOLLOW BUTTON -->
					'.$this->followBtn($following->user_id, $user_id, $followID) .'
					</div>
					</div>
					<div class="follow-person-bio">
					<div class="follow-person-name">
					<a href="'.BASE_URL.$following->username.'">'.$following->screenName.'</a>'.(($this->checkVerified($following->user_id)) ? '<i class="icon-verified verified"></i>' : '').'
					</div>
					<div class="follow-person-tname">
					<a href="'.BASE_URL.$following->username.'">@'.$following->username.'</a>
					</div>
					<div class="follow-person-dis">
					'.Post::getPostLinks($following->bio).'
					</div>
					</div>
					</div>
					</div>';
				}
			}

			public function whoToFollow($user_id, $profileId){
				$stmt = $this->pdo->prepare("SELECT * FROM `users` WHERE `user_id` != :user_id AND `user_id` NOT IN (SELECT `receiver` FROM `follow` WHERE `sender` = :user_id) ORDER BY rand() LIMIT 3");
				$stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
				$stmt->execute();
				$data = $stmt->fetchAll(PDO::FETCH_OBJ);

				echo '<div class="follow-wrap"><div class="follow-inner"><div class="follow-title"><h3>Who to follow</h3></div>';
				foreach ($data as $user) {
					echo '<div class="follow-body">
					<div class="follow-img">
					<img src="'.BASE_URL.$user->profileImage.'"/>
					</div>
					<div class="follow-content">
					<div class="fo-co-head">
					<a href="'.BASE_URL.$user->username.'" class="profile-popup" data-popup="'.$user->user_id.'">'.$user->screenName.'</a>'.(($this->checkVerified($user->user_id)) ? '<i class="icon-verified verified"></i>' : '').'<br><span> @' .$user->username.'</span>'.(($this->checkFollowsYou($user_id, $user->user_id)) ? '<span class="follow-you">Follows You</span>' : '').'
					</div>
					<!-- FOLLOW BUTTON -->
					'.$this->followBtn($user->user_id, $user_id, $profileId).'
					</div>
					</div>';
				}
				echo '</div></div>';
			}

		}
		?>