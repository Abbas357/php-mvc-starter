<?php
require_once '../layout/guest.php';
layoutTop('Login', [
  "vendor/flatpickr/flatpickr.min.css"
]);

?>
<main class="auth">

  <header id="auth-header" class="auth-header" style="background-image: url(<?php asset('images/illustration/img-1.png') ?> );">
    <h1>
      <img src="<?php asset('images/logo.png') ?>" width="200px" height="50px" alt="Logo">
      <span class="sr-only">Sign In</span>
    </h1>
    <p>Fill the Credentials</p>
  </header><!-- form -->
  <form class="auth-form" action="<?php toRoute('auth.login') ?>" method="post">
    <!-- .form-group -->
    <div class="form-group">
    <?php if(isset($error)){
      echo '<span class="error-li">
            <div class="span-fp-error">'.$error.'</div>
        </span> ';
    } ?>
      <div class="form-label-group">
        <input type="email" id="email" name="email" class="form-control" placeholder="Email" autofocus=""> <label for="email">Email</label>
      </div>
    </div><!-- /.form-group -->
    <!-- .form-group -->
    <div class="form-group">
      <div class="form-label-group">
        <input type="password" id="password" class="form-control" name="password" placeholder="Password"> <label for="password">Password</label>
      </div>
    </div><!-- /.form-group -->
    <!-- .form-group -->
    <div class="form-group">
      <input type="submit" name="login" value="Sign In" class="btn btn-lg btn-primary btn-block">
    </div><!-- /.form-group -->
    <!-- .form-group -->
    <div class="form-group text-center">
      <div class="custom-control custom-control-inline custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="remember-me"> <label class="custom-control-label" for="remember-me">Keep me sign in</label>
      </div>
    </div><!-- /.form-group -->
  </form><!-- /.auth-form -->
  <!-- copyright -->
  <footer class="auth-footer"> © 2018 All Rights Reserved. <a href="#">Privacy</a> and <a href="#">Terms</a>
  </footer>
</main>
<?php layoutBottom([
  "vendor/particles.js/particles.min.js",
  "js/pages/particles.js"
])
?>