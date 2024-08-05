<?php 
namespace App\Models;
use PDO;
class News extends Model
{
    public function __construct(PDO $pdo) {
        parent::__construct($pdo);
    }
    
    public function getUserPosts($user_id){
		$stmt = $this->pdo->prepare("SELECT * FROM `posts` LEFT JOIN `users` ON `postBy` = `user_id` WHERE `postBy` = :user_id AND `shareID` = '0' AND `suspended` = 0 OR `shareBy` = :user_id ORDER BY `postID` DESC");
		$stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	function getPostLinks($post){
		$post = preg_replace("/(https?:\/\/)([\w]+.)([\w\.]+)/", "<a href='$0' target='_blank'>$0</a>", $post);
		$post = preg_replace("/#([\w]+)/", "<a href='".config('app.url')."hashtag/$1' target='_blank'>$0</a>", $post);
		$post = preg_replace("/@([\w]+)/", "<a href='".config('app.url')."$1' target='_blank'>$0</a>", $post);
		return $post;
	}

	public function checkShare($post_id, $user_Id){
		$stmt = $this->pdo->prepare("SELECT * FROM `posts` WHERE `shareID` = :post_id AND `shareBy` = :user_id OR `postID` = :post_id AND `shareBy` = :user_id");
		$stmt->bindParam(":post_id", $post_id, PDO::PARAM_INT);
		$stmt->bindParam(":user_id", $user_Id, PDO::PARAM_INT);
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

}
