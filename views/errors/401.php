<!DOCTYPE html>
<html lang="en">
  <head>
    <title> Page not found | C&W Department, KP </title>
    <?php require_once '../includes/head.php'; ?>
  </head>
  <body>
    <main id="notfound-state" class="empty-state empty-state-fullpage bg-black">
      
      <div class="empty-state-container">
        <div class="card">
          <div class="card-header bg-light text-left">
            <i class="fa fa-fw fa-circle text-red"></i> <i class="fa fa-fw fa-circle text-yellow"></i> <i class="fa fa-fw fa-circle text-teal"></i>
          </div>
          <div class="card-body">
            <h1 class="state-header display-1 font-weight-bold">
              <span>4</span> <i class="far fa-frown text-blue"></i> <span>1</span>
            </h1>
            <h3> Unauthorized Access!</h3>
            <p class="state-description lead"> Please login to view this page or contact the website administrator for assistance. </p>
            <div class="state-action">
              <a href="<?php toRoute('dashboard') ?>" class="btn btn-lg btn-light"><i class="fa fa-angle-right"></i> Go Home</a>
            </div>
          </div>
        </div>
      </div>
    </main>
    <script src="<?php asset('vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?php asset('vendor/bootstrap/js/popper.min.js') ?>"></script>
    <script src="<?php asset('vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
    <script src="<?php asset('vendor/particles.js/particles.min.js') ?>"></script>
    <script>
      $(document).on('theme:init', () =>
      {
        particlesJS.load('notfound-state', "<?php asset('js/pages/particles-error.json', true) ?>");
      })
    </script>
    <script src="<?php asset('js/theme.min.js') ?>"></script>
  </body>
</html>