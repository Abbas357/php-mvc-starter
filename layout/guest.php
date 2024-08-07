<?php
require_once('../app/init.php');
if (authenticated()) redirect('index');
function layoutTop($pageTitle = 'Page', $additionalCSS = [])
{
    echo "<!DOCTYPE html>
        <html lang='en'>
        <head>
            <title>$pageTitle | C&W Department, KP</title>";
    require_once '../includes/head.php';
    if (!empty($additionalCSS)) {
        foreach ($additionalCSS as $css) {
            echo "<link rel='stylesheet' href='".asset($css, false)."'>";
        }
    }
    echo "</head>
            <body>";
            $messages = getFlash();
            if ($messages): ?>
                <div style="max-width: 420px; position: fixed; z-index: 9999; top: 3.7rem; left:0; right:0; margin: 0 auto">
                    <?php foreach ($messages as $type => $message): ?>
                        <div class="alert alert-<?php echo $type; ?> alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong><?php echo $type === 'success' ? 'Well done!' : 'Uh Oh!' ?></strong> 
                            <?php echo $message; ?>.
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif;
            echo "
            ";
}

function layoutBottom($additionalJS = [])
{
    echo "<script src='".asset('vendor/jquery/jquery.min.js', false)."'></script>
        <script src='".asset('vendor/bootstrap/js/popper.min.js', false)."'></script>
        <script src='".asset('vendor/bootstrap/js/bootstrap.min.js', false)."'></script>
        <script src='".asset('js/theme.js', false)."'></script>"; 
    if (!empty($additionalJS)) {
        foreach ($additionalJS as $script) {
            echo "<script src='".asset($script, false)."'></script>";
        }
    }
    echo "
        </body>
    </html>
    ";
}
