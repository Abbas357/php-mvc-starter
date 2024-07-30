<?php
class User extends Main {
	
	function __construct($pdo){
		$this->pdo = $pdo;
	}

	public function search($search){
		$stmt = $this->pdo->prepare("SELECT * FROM `users` WHERE (`name` LIKE ? OR `email` LIKE ? OR `designation` LIKE ? OR `office` LIKE ?) AND `status` = 1");
		$stmt->bindValue(1, $search.'%', PDO::PARAM_STR);
		$stmt->bindValue(2, $search.'%', PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function login($email, $password){
		$stmt = $this->pdo->prepare("SELECT `id`, `password` FROM `users` WHERE `email` = :email");
		$stmt->bindParam(":email", $email, PDO::PARAM_STR);
		$stmt->execute();
	
		$user = $stmt->fetch(PDO::FETCH_OBJ);

		// Storing hash password like below
		// $password = 'user_password_here'; // The plain text password
		// $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
		
		if ($user && password_verify($password, $user->password)) {
			$_SESSION['user_id'] = $user->id;
			header('Location: index.php');
		} else {
			return false;
		}
	}	

	public function userData($id){
		$stmt = $this->pdo->prepare("SELECT * FROM `users` WHERE `id` = :id");
		$stmt->bindParam("id", $id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}

	public function logout(){
		$_SESSION = array();
		session_destroy();
		header('Location: '.BASE_URL.'index.php');
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

	public function checkStatus($id){
		$stmt = $this->pdo->prepare("SELECT * FROM `users` WHERE `id` = :id");
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);
		$stmt->execute();
		$user = $stmt->fetch(PDO::FETCH_OBJ);
		if($user->status){
			return true;
		}else{
			return false;
		}
	}

	public function userIdByEmail($email){
		$stmt = $this->pdo->prepare("SELECT `id` FROM `users` WHERE `email` = :email");
		$stmt->bindParam(":email", $email, PDO::PARAM_STR);
		$stmt->execute();
		$user = $stmt->fetch(PDO::FETCH_OBJ);
		return $user->id;
	}

}
?>