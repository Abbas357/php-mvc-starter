<?php
class User {
	protected $pdo;

	function __construct($pdo){
		$this->pdo = $pdo;
	}

	public function checkInput($var){
		$var = htmlspecialchars($var);
		$var = trim($var);
		$var = stripcslashes($var);
		return $var;
	}

	public function preventAccess($request, $currentFile, $currently){
		if($request == "GET" && $currentFile == $currently){
			header('Location: '.BASE_URL.'index.php');
		}
	}

	public function search($search){
		$stmt = $this->pdo->prepare("SELECT `user_id`, `username`, `screenName`, `profileImage`, `profileCover`, `suspended` FROM `users` WHERE (`username` LIKE ? OR `screenName` LIKE ?) AND `suspended` = 0");
		$stmt->bindValue(1, $search.'%', PDO::PARAM_STR);
		$stmt->bindValue(2, $search.'%', PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function login($email, $password){
		$stmt = $this->pdo->prepare("SELECT `user_id` FROM `users` WHERE `email` = :email AND `password` = :password");
		$stmt->bindParam(":email", $email, PDO::PARAM_STR);
		$stmt->bindParam(":password", md5($password), PDO::PARAM_STR);
		$stmt->execute();

		$user = $stmt->fetch(PDO::FETCH_OBJ);
		$count = $stmt->rowCount();

		if($count > 0){
			$_SESSION['user_id'] = $user->user_id;
			header('Location: home.php');
		}else{
			return false;
		}
	}

	public function userData($user_id){
		$stmt = $this->pdo->prepare("SELECT * FROM `users` WHERE `user_id` = :user_id");
		$stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}

	public function logout(){
		$_SESSION = array();
		session_destroy();
		header('Location: '.BASE_URL.'index.php');
	}

	public function create($table, $fields = array()){
		$columns = implode(',', array_keys($fields));
		$values = ':'.implode(', :',array_keys($fields));
		$sql = "INSERT INTO {$table} ({$columns}) VALUES ({$values})";
		if($stmt = $this->pdo->prepare($sql)){
			foreach ($fields as $key => $data) {
				$stmt->bindValue(':'.$key,$data);
			}
			$stmt->execute();
			return $this->pdo->lastInsertId();
		}
	}

	public function update($table, $fieldName, $user_id, $fields = array()){
		$columns = '';
		$i = 1;

		foreach($fields as $name => $value){
			$columns .= "`{$name}` = :{$name}";
			if($i < count($fields)){
				$columns .= ', ';
			}
			$i++;
		}
		$sql = "UPDATE {$table} SET {$columns} WHERE `$fieldName` = {$user_id}";
		if($stmt = $this->pdo->prepare($sql)){
			foreach ($fields as $key => $value) {
				$stmt->bindValue(':'.$key, $value);
			}
			$stmt->execute();
		}
	}

	public function delete($table, $array){
		$sql = "DELETE FROM `{$table}`";
		$where = " WHERE ";

		foreach($array as $name => $value){
			$sql .= "{$where} `{$name}` = :{$name}";
			$where = " AND ";

		}

		if($stmt = $this->pdo->prepare($sql)){
			foreach($array as $name => $value) {
				$stmt->bindValue(':'.$name, $value);
			}

			$stmt->execute();
		}
	}

	public function checkUsername($username){
		$stmt = $this->pdo->prepare("SELECT `username` FROM `users` WHERE `username` = :username");
		$stmt->bindParam(":username", $username, PDO::PARAM_STR);
		$stmt->execute();

		$count = $stmt->rowCount();
		if($count > 0){
			return true;
		}else{
			return false;
		}
	}

	public function checkPassword($password){
		$stmt = $this->pdo->prepare("SELECT `password` FROM `users` WHERE `password` = :password");
		$stmt->bindParam(":password", md5($password), PDO::PARAM_STR);
		$stmt->execute();

		$count = $stmt->rowCount();
		if($count > 0){
			return true;
		}else{
			return false;
		}
	}

	public function checkEmail($email){
		$stmt = $this->pdo->prepare("SELECT `email` FROM `users` WHERE `email` = :email");
		$stmt->bindParam(":email", $email, PDO::PARAM_STR);
		$stmt->execute();

		$count = $stmt->rowCount();
		if($count > 0){
			return true;
		}else{
			return false;
		}
	}

	public function loggedIn(){
		return (isset($_SESSION['user_id'])) ? true : false;
	}

	public function checkVerified($user_id){
		$stmt = $this->pdo->prepare("SELECT * FROM `users` WHERE `user_id` = :userId");
		$stmt->bindParam(":userId", $user_id, PDO::PARAM_INT);
		$stmt->execute();
		$user = $stmt->fetch(PDO::FETCH_OBJ);
		if($user->verified){
			return true;
		}else{
			return false;
		}		
	}

	public function checkSuspension($user_id){
		$stmt = $this->pdo->prepare("SELECT * FROM `users` WHERE `user_id` = :userId");
		$stmt->bindParam(":userId", $user_id, PDO::PARAM_INT);
		$stmt->execute();
		$user = $stmt->fetch(PDO::FETCH_OBJ);
		if($user->suspended){
			return true;
		}else{
			return false;
		}
	}

	public function suspension($profileId){
		$stmt = $this->pdo->prepare("SELECT COUNT(`reportOn`) AS totalReports, `reportOn` AS User FROM `report` WHERE `reportOn` = :profileId");
		$stmt->bindParam(":profileId", $profileId, PDO::PARAM_INT);
		$stmt->execute();
		$count = $stmt->fetch(PDO::FETCH_OBJ);
		if($count->totalReports >= 10){
			$stmt = $this->pdo->prepare("UPDATE `users` SET `suspended` = 1 WHERE `user_id` = $count->User");
			$stmt->execute();
			$this->delete("report", array("reportOn" => $profileId));    
		}
	}

	public function findGender($profileID, $male, $female){
		$stmt = $this->pdo->prepare("SELECT `gender` FROM `users` WHERE `user_id` = :profileID");
		$stmt->bindParam(":profileID", $profileID, PDO::PARAM_INT);
		$stmt->execute();
		$user = $stmt->fetch(PDO::FETCH_ASSOC);
		if($user['gender'] === 'male'){
			return $male;
		}else{
			return $female;
		}
	}

	public function designRowCount($user_id){
		$stmt = $this->pdo->prepare("SELECT * FROM `design` WHERE `designFor` = :user_id");
		$stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
		$stmt->execute();
		$count = $stmt->rowCount();
		if($count > 0) {
			return true;
		}else{
			return false;
		}
	}

	public function getDesignData($user_id){
		$stmt = $this->pdo->prepare("SELECT * FROM `design` WHERE `designFor` = :user_id");
		$stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}

	public function userIdByUsername($username){
		$stmt = $this->pdo->prepare("SELECT `user_id` FROM `users` WHERE `username` = :username");
		$stmt->bindParam(":username", $username, PDO::PARAM_STR);
		$stmt->execute();
		$user = $stmt->fetch(PDO::FETCH_OBJ);
		return $user->user_id;
	}

	public function uploadImage($file){
		$filename = basename($file['name']);
		$fileTmp = $file['tmp_name'];
		$fileSize = $file['size'];
		$error = $file['error'];

		$ext = explode('.', $filename);
		$ext = strtolower(end($ext));
		$allowed_ext = array('jpg', 'png', 'jpeg');

		if(in_array($ext, $allowed_ext) === true){
			if($error === 0){
				if($fileSize <= 209272152){ 
					$fileRoot = 'users/' . $filename;
					move_uploaded_file($fileTmp, $_SERVER['DOCUMENT_ROOT'].'/'.$fileRoot);
					return $fileRoot;
				}else{
					$GLOBALS['imageError'] = "The file size is too large";
				}
			}
		}else{
			$GLOBALS['imageError'] = "The extention is not allowed";
		}
	}

	public function timeAgo($datetime){
		$time = strtotime($datetime);
		$current = time();
		$seconds = $current - $time;
		$minutes = round($seconds / 60);
		$hours = round($seconds / 3600);
		$months = round($seconds / 2600640);

		if($seconds <= 60){
			if($seconds == 0){
				return 'now';
			}else{
				return ' · '.$seconds.'s';
			}
		}elseif($minutes <= 60){

			return ' · '.$minutes. 'm';

		}elseif($hours <= 24){

			return ' · '.$hours.'h';

		}elseif($months <= 12){

			return ' · '.date('M j', $time);

		}else{

			return ' · '.date('j M Y',$time);

		}
	}	

	public function sendNotification($get_id, $user_id, $target, $type){
		$this->create('notification', array('notificationFor' => $get_id, 'notificationFrom' => $user_id, 'target' => $target, 'type' => $type, 'time' => date('Y-m-d H:i:s')));
	}

	public function userJoinDate($user_id){
		$stmt = $this->pdo->prepare('SELECT DATE_FORMAT(`joinDate`, "%b %Y") AS `userJoinDate` FROM `users` WHERE `user_id` = :user_id');
		$stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
		$stmt->execute();
		$join = $stmt->fetch(PDO::FETCH_OBJ);
		return $join->userJoinDate;
	}

}
?>