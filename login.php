<?php
require_once 'layout/guest.php';
layoutTop('Home Page', [
  "assets/vendor/flatpickr/flatpickr.min.css"
]);

use App\Support\Auth;

use App\Models\User;
$user = new User();

if (isset($_POST['login']) && !empty($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $error = '';

  if (!empty($email) or !empty($password)) {
    $email = checkInput($email);
    $password = checkInput($password);
    

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error = "Invalid format";
    } else {
      //submit form
      if (Auth::attempt($email, $password) === false) {
        $error = "The email or password is incorrect";
      } else {
        redirectTo('index.php');
      }
    }
  } else {
    $error = "Please enter username and password!";
  }
}
?>
<main class="auth">

  <header id="auth-header" class="auth-header" style="background-image: url(assets/images/illustration/img-1.png);">
    <h1>
      <?php echo logo(); ?>
      <span class="sr-only">Sign In</span>
    </h1>
    <p>Fill the Credentials</p>
  </header><!-- form -->
  <form class="auth-form" method="post">
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
  "assets/vendor/particles.js/particles.min.js",
  "assets/js/pages/particles.js"
])
?>