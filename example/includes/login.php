<?php
if($_SERVER['REQUEST_METHOD'] == "GET" && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])){
	header('Location: ../index.php');
}
if(isset($_POST['login']) && !empty($_POST['login'])){
 	$email = $_POST['email'];
 	$password = $_POST['password'];
 	$error = '';

 	if(!empty($email) or !empty($password)){
 		$email = $userClass->checkInput($email);
 		$password = $userClass->checkInput($password);

 		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
 			$error = "Invalid format";
 		}else{
 			//submit form
 			if($userClass->login($email, $password) === false){
 				$error = "The email or password is incorrect";
 			}else{
 				header("Location: home.php");
 			}

 		}
 	}else{
 		$error = "Please enter username and password!";
 	}
 }
?>
<div class="login-div">
<form method="post"> 
<h3>Sign In </h3>
	<ul>
		<li>
		  <input type="text" name="email" placeholder="Email" autofocus/>
		</li>
		<li>
		  <input type="password" name="password" placeholder="password"/>
		</li>
		<li class="login-div__btn">
			<div>
				<input type="checkbox" Value="Remember me" id="remember"><label for="remember"> Remember me</label>
			</div>
			<div>
				<input type="submit" name="login" value="Log in"/>
			</div>
		</li>
	</ul>
	<?php if(isset($error)){
		echo '<span class="error-li">
	  			<div class="span-fp-error">'.$error.'</div>
	 		</span> ';
	} ?>
	
	</form>
</div>