<?php
class Post extends User {

	function __construct($pdo){
		$this->pdo = $pdo;
	}

	public function posts($user_id, $num){
		$stmt = $this->pdo->prepare("SELECT * FROM `posts` LEFT JOIN `users` ON `postBy` = `user_id` WHERE `postBy` = :user_id AND `shareID` = '0' OR `postBy` = `user_id` AND `shareBy` != :user_id AND `postBy` IN(SELECT `receiver` FROM `follow` WHERE `sender` = :user_id) AND `suspended` = 0 ORDER BY `postID` DESC LIMIT :num");
		$stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
		$stmt->bindParam(":num", $num, PDO::PARAM_INT);
		$stmt->execute();
		$posts = $stmt->fetchAll(PDO::FETCH_OBJ);
		foreach ($posts as $post) {
			$likes = $this->likes($user_id, $post->postID); 
			$share = $this->checkShare($post->postID, $user_id);
			$user = $this->userData($post->shareBy);
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
				<span><a href="'.BASE_URL.$user->username.'" >'.$user->screenName.'</a>'.(($this->checkVerified($user->user_id)) ? '<i class="icon-verified verified"></i>' : '').'</span>
				<span>@'.$user->username.'</span>
				<span>'.$this->timeAgo($share['postedOn']).'</span>
				</div>
				<div class="t-h-c-dis">
				'.$this->getPostLinks($post->shareMsg).'
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
				<span><a href="'.BASE_URL.$post->username.'">'.$post->screenName.'</a>'.(($this->checkVerified($post->user_id)) ? '<i class="icon-verified verified"></i>' : '').'</span>
				<span>@'.$post->username.'</span>
				<span>'.$this->timeAgo($post->postedOn).'</span>
				</div>
				<div class="share-t-s-b-inner-right-text">		
				'.$this->getPostLinks($post->status).'
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
				<img src="'.$post->profileImage.'"/>
				</div>
				<div class="t-s-head-content">
				<div class="t-h-c-name">
				<span><a href="'.$post->username.'" data-popup="'.$post->user_id.'" class="profile-popup">'.$post->screenName.'</a>'.(($this->checkVerified($post->user_id)) ? '<i class="icon-verified verified"></i>' : '').'</span>
				<span>@'.$post->username.'</span>
				<span>'.$this->timeAgo($post->postedOn).'</span>
				</div>
				<div class="t-h-c-dis">
				'.$this->getPostLinks($post->status).'
				</div>
				</div>
				</div>'.
				((!empty($post->postImage)) ? 
					'<!--post show head end-->
					<div class="t-show-body">
					<div class="t-s-b-inner">
					<div class="t-s-b-inner-in">
					<img src="'.$post->postImage.'" class="imagePopup" data-post="'.$post->postID.'"/>
					</div>
					</div>
					</div>
					<!--post show body end-->
					': '').'

				</div>').'
			<div class="t-show-footer">
			<div class="t-s-f-right">
			<ul> 	
			<li>'.(($post->postID === $share['shareID']) ? '<button class="Share" data-post="'.$post->postID.'" data-user="'.$post->postBy.'"><i class="fa fa-share" aria-hidden="true"></i><span class="sharesCount">'.$post->shareCount.'</span></button>' : '<button class="share" data-post="'.$post->postID.'" data-user="'.$post->postBy.'"><i class="fa fa-share" aria-hidden="true"></i><span class="sharesCount">'.(($post->shareCount > 0) ? $post->shareCount : '').'</span></button>').'</li>
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
	}

	public function getUserPosts($user_id){
		$stmt = $this->pdo->prepare("SELECT * FROM `posts` LEFT JOIN `users` ON `postBy` = `user_id` WHERE `postBy` = :user_id AND `shareID` = '0' AND `suspended` = 0 OR `shareBy` = :user_id ORDER BY `postID` DESC");
		$stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function addLike($user_id, $post_id, $get_id){
		$stmt= $this->pdo->prepare("UPDATE `posts` SET `likesCount` = `likesCount` +1 WHERE `postID` = :post_id");
		$stmt->bindParam(":post_id", $post_id, PDO::PARAM_INT);
		$stmt->execute();

		$this->create('likes', array('likeBy' => $user_id, 'likeOn' => $post_id));

		if($get_id != $user_id){
			$this->sendNotification($get_id, $user_id, $post_id, 'like');
		}
	}

	public function unlike($user_id, $post_id, $get_id){
		$stmt= $this->pdo->prepare("UPDATE `posts` SET `likesCount` = `likesCount` -1 WHERE `postID` = :post_id");
		$stmt->bindParam(":post_id", $post_id, PDO::PARAM_INT);
		$stmt->execute();

		$stmt = $this->pdo->prepare("DELETE FROM `likes` WHERE `likeBy` = :user_id AND `likeOn` = :post_id");
		$stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
		$stmt->bindParam(":post_id", $post_id, PDO::PARAM_INT);
		$stmt->execute();
	}

	public function likes($user_id, $post_id){
		$stmt = $this->pdo->prepare("SELECT * FROM `likes` WHERE `likeBy` = :user_id AND `likeOn` = :post_id");
		$stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
		$stmt->bindParam(":post_id", $post_id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function getTrendByHash($hashtag){
		$stmt = $this->pdo->prepare("SELECT * FROM `trends` WHERE `hashtag` LIKE :hashtag LIMIT 5");
		$stmt->bindValue(':hashtag', $hashtag.'%');
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function getMention($mention){
		$stmt = $this->pdo->prepare("SELECT `user_id`, `username`, `screenName`, `profileImage` FROM `users` WHERE `username` LIKE :mention OR `screenName` LIKE :mention LIMIT 5");
		$stmt->bindValue(':mention', $mention.'%');
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function addTrend($hashtag, $user_id){
		preg_match_all("/#+([a-zA-Z0-9_]+)/i", $hashtag, $matches);
		if($matches){
			$result = array_values($matches[1]);
		}

		$sql = "INSERT INTO `trends` (`hashtag`,`createdOn`, `createdBy`) VALUES (:hashtag, CURRENT_TIMESTAMP, $user_id)";
		foreach ($result as $trend) {
			if($stmt = $this->pdo->prepare($sql)){
				$stmt->execute(array(':hashtag' => $trend));
			}

		}
	}

	public function addMention($status, $user_id, $post_id){
		preg_match_all("/@+([a-zA-Z0-9_]+)/i", $status, $matches);
		if($matches){
			$result = array_values($matches[1]);
		}

		$sql = "SELECT * FROM `users` WHERE `username` = :mention";
		foreach ($result as $trend) {
			if($stmt = $this->pdo->prepare($sql)){
				$stmt->execute(array(":mention" => $trend));
				$data = $stmt->fetch(PDO::FETCH_OBJ);
			}
			if($data->user_id != $user_id){
				$this->sendNotification($data->user_id, $user_id, $post_id, 'mention');
			}
		} 
		
	}

	function getPostLinks($post){
		$post = preg_replace("/(https?:\/\/)([\w]+.)([\w\.]+)/", "<a href='$0' target='_blank'>$0</a>", $post);
		$post = preg_replace("/#([\w]+)/", "<a href='".BASE_URL."hashtag/$1' target='_blank'>$0</a>", $post);
		$post = preg_replace("/@([\w]+)/", "<a href='".BASE_URL."$1' target='_blank'>$0</a>", $post);
		return $post;
	}

	public function getPopupPost($post_id){
		$stmt = $this->pdo->prepare("SELECT * FROM `posts`, `users` WHERE `postID` = :post_id AND `postBy` = `user_id`");
		$stmt->bindParam(":post_id", $post_id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}

	public function share($post_id, $user_id, $get_id, $comment){
		$stmt = $this->pdo->prepare("UPDATE `posts` SET `shareCount` = `shareCount` +1 WHERE `postID` = :post_id");
		$stmt->bindParam(":post_id", $post_id, PDO::PARAM_INT);
		$stmt->execute();

		$stmt = $this->pdo->prepare("INSERT INTO `posts` (`status`,`postBy`,`postImage`,`shareID`,`shareBy`,`postedOn`,`likesCount`,`shareCount`,`shareMsg`) SELECT `status`,`postBy`,`postImage`,`postID`,:user_id,`postedOn`,`likesCount`,`shareCount`,:shareMsg FROM `posts` WHERE `postID` = :post_id");
		$stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
		$stmt->bindParam(":shareMsg", $comment, PDO::PARAM_STR);
		$stmt->bindParam(":post_id", $post_id, PDO::PARAM_INT);
		$stmt->execute();

		$this->sendNotification($get_id, $user_id, $post_id, 'share');

	}

	public function checkShare($post_id, $user_Id){
		$stmt = $this->pdo->prepare("SELECT * FROM `posts` WHERE `shareID` = :post_id AND `shareBy` = :user_id OR `postID` = :post_id AND `shareBy` = :user_id");
		$stmt->bindParam(":post_id", $post_id, PDO::PARAM_INT);
		$stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function comments($post_id){
		$stmt = $this->pdo->prepare("SELECT * FROM `comments` LEFT JOIN `users` ON `commentBy` = `user_id` WHERE `commentOn` = :post_id");
		$stmt->bindParam(":post_id",$post_id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function countPosts($user_id){
		$stmt = $this->pdo->prepare("SELECT COUNT(`postID`) AS `totalPosts` FROM `posts` WHERE `postBy` = :user_id AND `shareID` = '0' OR `shareBy` = :user_id");
		$stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
		$stmt->execute();
		$count = $stmt->fetch(PDO::FETCH_OBJ);
		echo $count->totalPosts;
	}

	public function countLikes($user_id){
		$stmt = $this->pdo->prepare("SELECT COUNT('likeID') AS `totalLikes` FROM `likes` WHERE `likeBy` = :user_id");
		$stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
		$stmt->execute();
		$count = $stmt->fetch(PDO::FETCH_OBJ);
		echo $count->totalLikes;
	}

	public function trends(){
		$stmt = $this->pdo->prepare("SELECT *, COUNT(`postID`) AS `postsCount` FROM `trends` INNER JOIN `posts` ON `status` LIKE CONCAT('%#', `hashtag`, '%') OR `shareMsg` LIKE CONCAT('%#', `hashtag`, '%') GROUP BY `hashtag` ORDER BY `postsCount` DESC LIMIT 8");
		$stmt->execute();
		$trends = $stmt->fetchAll(PDO::FETCH_OBJ);

		echo '<div class="trend-wrapper"><div class="trend-inner"><div class="trend-title"><h3>Trends</h3></div>';
		foreach ($trends as $trend) {
			echo '<div class="trend-body">
			<div class="trend-body-content">
			<div class="trend-link">
			<a href="'.BASE_URL.'hashtag/'.$trend->hashtag.'">#'.$trend->hashtag.'</a>
			</div>
			<div class="trend-posts">
			'.$trend->postsCount.' <span>posts</span>
			</div>
			</div>
			</div>';
		}
		echo '</div></div>';
	}

	public function getPostsByHash($hashtag){
		$stmt = $this->pdo->prepare("SELECT * FROM `posts` LEFT JOIN `users` ON `postBy` = `user_id` WHERE `status` LIKE :hashtag OR `shareMsg` LIKE :hashtag");
		$stmt->bindValue(":hashtag", '%#'.$hashtag.'%', PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function getUsersByHash($hashtag){
		$stmt = $this->pdo->prepare("SELECT DISTINCT * FROM `posts` INNER JOIN `users` ON `postBy` = `user_id` WHERE `status` LIKE :hashtag OR `shareMsg` LIKE :hashtag GROUP BY `user_id`");
		$stmt->bindValue(":hashtag", '%#'.$hashtag.'%',PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

}
?>