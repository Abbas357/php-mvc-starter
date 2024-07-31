<!DOCTYPE html>
<html lang="en">
  <head>
    <title> Error 404: Page not found | C&W Department, KP </title>
    <?php require_once 'includes/head.php'; ?>
  </head>
  <body>
    <!--[if lt IE 10]>
    <div class="page-message" role="alert">You are using an <strong>outdated</strong> browser. Please <a class="alert-link" href="http://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</div>
    <![endif]-->
    <!-- .empty-state -->
    <main id="notfound-state" class="empty-state empty-state-fullpage bg-black">
      <!-- .empty-state-container -->
      <div class="empty-state-container">
        <div class="card">
          <div class="card-header bg-light text-left">
            <i class="fa fa-fw fa-circle text-red"></i> <i class="fa fa-fw fa-circle text-yellow"></i> <i class="fa fa-fw fa-circle text-teal"></i>
          </div>
          <div class="card-body">
            <h1 class="state-header display-1 font-weight-bold">
              <span>4</span> <i class="far fa-frown text-red"></i> <span>4</span>
            </h1>
            <h3> Page not found! </h3>
            <p class="state-description lead"> Sorry, we've misplaced that URL or it's pointing to something that doesn't exist. </p>
            <div class="state-action">
              <a href="auth-error-v1.html" class="btn btn-lg btn-light"><i class="fa fa-angle-right"></i> Go Home</a>
            </div>
          </div>
        </div>
      </div><!-- /.empty-state-container -->
    </main><!-- /.empty-state -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/popper.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/vendor/particles.js/particles.min.js"></script>
    <script>
      $(document).on('theme:init', () =>
      {
        particlesJS.load('notfound-state', 'assets/javascript/pages/particles-error.json');
      })
    </script>
    <script src="assets/javascript/theme.min.js"></script>
  </body>
</html>