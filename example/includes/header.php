<div class="wrapper">
	<!-- header wrapper -->
	<div class="header-wrapper">	
		<div class="nav-container">
			<div class="nav">
				<div class="nav-logo"></div>
				<div class="nav-left">
					<ul class="nav-left__items">
						<li><a href="<?php echo BASE_URL;?>home"><i class="icon-home3" aria-hidden="true"></i>Home</a></li>
						<?php if($userClass->loggedIn() === true) { ?>
						<li><a href="<?php echo BASE_URL;?>i/notifications"><i class="icon-bell" aria-hidden="true"></i>Notification<span id="notification"><?php if($notify->totalN > 0){ echo '<span class="span-i">'.$notify->totalN.'</span>'; } ?></span></a></li>
						<li id="messagePopup"><a href="#"><i class="icon-envelope" aria-hidden="true"></i>Messages<span id="messages"><?php if($notify->totalM > 0){ echo '<span class="span-i">'.$notify->totalM.'</span>'; } ?></span></a></li>
						<?php } ?>
					</ul>
				</div><!-- nav left ends-->
				<div class="nav-right">
					<ul class="nav-right__items">
						<li class="search-box"><input type="text" id="search-box" class="search fa" placeholder=" &#xf002 &nbsp;Search"/>
							<div class="search-result">
							</div>
						</li>
						<?php if($userClass->loggedIn() === true) { ?>
						<li class="hover"><label class="drop-label" for="drop-wrap1"><img src="<?php echo BASE_URL.$user->profileImage; ?>"/></label>
							<input type="checkbox" id="drop-wrap1">
							<div class="drop-wrap">
								<div class="drop-inner">
									<ul>
										<li><a class="fa fa-user" href="<?php echo BASE_URL.$user->username; ?>">&nbsp; Profile</a></li>
										<li><a class="fa fa-gears" href="<?php echo BASE_URL;?>settings/account">&nbsp; Settings</a></li>
										<li><a class="fa fa-sign-out" href="<?php echo BASE_URL;?>includes/logout.php">&nbsp; Log out</a></li>
									</ul>
								</div>
							</div>
						</li>
						<li class="add-post"><label for="pop-up-post" class="addPostBtn"><button class="btn btn-primary">Post</button></label></li>
						<?php } else{
							echo '<li><a class="have-an-account" href="'.BASE_URL.'index.php">Have an account? Log in!</a>';
						} ?>
					</ul>
				</div><!-- nav right ends-->

			</div><!-- nav ends -->
		</div><!-- nav container ends -->
		</div><!-- header wrapper end -->