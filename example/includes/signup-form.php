<?php
if($_SERVER['REQUEST_METHOD'] == "GET" && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])){
	header('Location: ../index.php');
}
if(isset($_POST['signup'])){
	$email = $_POST['email'];
	$password = $_POST['password'];
	$screenName = $_POST['screenName'];
	$gender = $_POST['gender'];
	$error = '';

	if(empty($screenName) or empty($password) or empty($email) or empty($gender)){
		$error = 'All fields are required';
	}else{
		$screenName = $userClass->checkInput($screenName);
		$password = $userClass->checkInput($password);
		$email = $userClass->checkInput($email);
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$error = "Invalid Email format";
		}elseif(strlen($screenName) >20 or strlen($screenName) < 6){
			$error = "Name must be between 20 and 6 characters";
		}elseif(strlen($password) < 6){
			$error = "Password is too short";
		}elseif(empty($gender)){
			$error = "Select your gender";
		}else{
			if($userClass->checkEmail($email) === true){
				$error = 'Email is already in use';
			}else{
				//Create Account
				if($gender === "male"){
					$profileImage = 'assets/images/maleAvatar.jpg';
				}else {
					$profileImage = 'assets/images/femaleAvatar.jpg';
				}
				$user_id = $userClass->create('users', array('email' => $email, 'password' => md5($password), 'screenName' => $screenName, 'gender' => $gender, 'profileImage' => $profileImage, 'profileCover' => 'assets/images/defaultCover.jpg', 'joinDate' => date('Y-m-d')));
				$_SESSION['user_id'] = $user_id;
				header("Location: includes/signup.php?step=1");
			}
		}
	}
}
?>

<form method="post">
<div class="signup-div"> 
	<h3>Sign up </h3>
	<ul>
		<li>
		    <input type="text" name="screenName" placeholder="Full Name"/>
		</li>
		<li>
		    <input type="email" name="email" placeholder="Email"/>
		</li>
		<li>
			<input type="password" name="password" placeholder="Password"/>
		</li>
		<li class="input-radio">
			<input type="radio" name="gender" id="male" value="male" checked/><label for="male">Male</lable>
			<input type="radio" name="gender" id="female" value="female"/><label for="female">female</lable>
		</li>
		<li>
			<input type="submit" name="signup" Value="Signup for PakConnect">
		</li>
	</ul>
	<?php
		if(isset($error)){
			echo '<span class="error-li">
	  <div class="span-fp-error">'.$error.'</div>
	 </span> ';
		}
	?>
	
</div>
</form>