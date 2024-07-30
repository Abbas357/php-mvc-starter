<?php
include '../core/init.php';
$user_id = $_SESSION['user_id'];
$user = $userClass->userData($user_id);

if(isset($_GET['step']) === true && empty($_GET['step']) ===false) {
	if(isset($_POST['next'])){
		$username = $userClass->checkInput($_POST['username']);

		if (!empty($username)) {
			if(strlen($username) > 20){
				$error = "Username must be between in 6-20 character";
			}elseif($userClass->checkUsername($username) === true){
				$error = "Username is already taken!";
			}else{
				$userClass->update('users', 'user_id', $user_id, array('username' => $username));
				header('Location: signup.php?step=2');
			}
		}else{
			$error = "Please enter your username to choose";
		}
	}
	?>
<!doctype html>
<html>
	<head>
		<title>Signup | Pak Connect</title>
		<meta charset="UTF-8" />
 		<link rel="stylesheet" href="assets/css/font/css/font-awesome.css"/>
		<link rel="stylesheet" href="../assets/css/style.css"/>
	</head>
	<!--Helvetica Neue-->
<body>
<div class="wrapper">
<!-- nav wrapper -->
<div class="nav-wrapper">
	
	<div class="nav-container">	
		<div class="nav-second">
			<ul class="nav-register-step">
				<li class="logo-step"><a href="#"><img src="<?php echo BASE_URL."assets/images/logo.png" ?>"></a></li>
				<li class="btn-step"><a href="" onclick="window.history.back()">Go Back</a></li>							
			</ul>
		</div><!-- nav second ends-->
	</div><!-- nav container ends -->

</div><!-- nav wrapper end -->

<!---Inner wrapper-->
<div class="inner-wrapper">
	<!-- main container -->
	<div class="main-container">
		<!-- step wrapper-->
		<?php if($_GET['step'] == '1'){ ?>
 		<div class="step-wrapper">
		    <div class="step-container">
				<form method="post">
					<h2>Choose a Username</h2>
					<h4>Don't worry, you can always change it later.</h4>
					<div>
						<input type="text" name="username" placeholder="Username"/>
					</div>
					<div>
						<ul>
						  <li><?php if(isset($error)){ echo $error; } ?></li>
						</ul>
					</div>
					<div>
						<input type="submit" name="next" value="Next"/>
					</div>
				 </form>
			</div>
		</div>
  		<?php } ?>
  		<?php if($_GET['step'] == '2'){ ?>
	<div class='lets-wrapper'>
		<div class='step-letsgo'>
			<h2>We're glad you're here, <span class="login-name-step"><?php echo $user->screenName; ?></span></h2>
			<p>Pak Connect is a constantly updating stream of the coolest, most important news, media, sports, TV and much more just for you.</p>
			<hr />
			<p>
				Tell us about yourself and we'll help you in getting most out of our service.
			</p>
			<span class="btn-step-go">
				<a href='../home.php' class='backButton'>Let's go!</a>
			</span>
		</div>
	</div>
  	
  	<?php } ?>
		
	</div><!-- main container end -->

</div><!-- inner wrapper ends-->
</div><!-- ends wrapper -->

</body>
</html>


<?php
}
?>