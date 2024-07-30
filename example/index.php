<?php
include 'core/init.php';
if(isset($_SESSION['user_id'])){
	header("Location: home.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Pak Connect | Meet new People</title>
	<meta charset="UTF-8" />
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/font/css/font-awesome.css"/>
	<link rel="icon" type="image/ico" href="<?php echo BASE_URL; ?>assets/images/favicon.ico">
	<script type="text/javascript" src="<?php echo BASE_URL?>assets/js/globalVars.js"></script> 
	<link rel="stylesheet" href="<?php echo BASE_URL?>assets/css/style.css"/>
</head>
<body>
	<div class="front-img">
		<img src="assets/images/background.jpg"></img>
	</div>	

	<div class="wrapper">
		<!-- header wrapper -->
		<div class="header-wrapper">
			<div class="nav-container">
				<div class="nav-index">
					<div class="nav-index__left">
						<div class="nav-index__left--logo">
							<img src="<?php echo BASE_URL;?>/assets/images/logo.png" alt="">
						</div>
						<div>
							<a href="<?php echo BASE_URL;?>home.php"><i class="fa fa-home" aria-hidden="true"></i>Home</a>
						</div>
						<div>
							<a href="<?php echo BASE_URL;?>home.php"><i class="fa fa-user" aria-hidden="true"></i>About</a>	
						</div>
					</div>
					<div class="nav-index__right">
						<a href="#" class="fa fa-language"> Language</a></li>
					</div><!-- nav right ends-->

				</div><!-- nav ends -->

			</div><!-- nav container ends -->

		</div><!-- header wrapper end -->
		
		<!---Inner wrapper-->
		<div class="inner-wrapper">
			<!-- main container -->
			<div class="main-container">
				<!-- content left-->
				<div class="content-left">
					<h1>Welcome to Pak Connect</h1>
					<br/>
					<p>A place to connect with your friends — and Get updates from the people you love, And get the updates from the world and things that interest you.</p>
				</div><!-- content left ends -->	

				<!-- content right ends -->
				<div class="content-right">
					<!-- Log In Section -->
					<div class="login-wrapper">
						<?php include 'includes/login.php'; ?>
					</div><!-- log in wrapper end -->

					<!-- SignUp Section -->
					<div class="signup-wrapper">
						<?php include 'includes/signup-form.php'; ?>
					</div>
					<!-- SIGN UP wrapper end -->

				</div><!-- content right ends -->

			</div><!-- main container end -->

		</div><!-- inner wrapper ends-->
	</div><!-- ends wrapper -->
</body>
</html>
