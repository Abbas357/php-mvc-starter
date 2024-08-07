<?php
require_once('../app/init.php');
if (!authenticated()) redirect('login');
function layoutTop($pageTitle = 'Page', $additionalCSS = [])
{
    global $main;
    echo "<!DOCTYPE html>
        <html lang='en'>
        <head>
            <title>$pageTitle | C&W Department, KP</title>";
    require_once '../includes/head.php';
    if (!empty($additionalCSS)) {
        foreach ($additionalCSS as $css) {
            echo "<link rel='stylesheet' href='" . asset($css, false) . "'>";
        }
    }
    echo "</head>
        <body>
            <div class='app'>";
    require_once '../includes/topbar.php';
    require_once '../includes/aside.php';
    echo "<main class='app-main'>";
    $messages = getFlash();
    if ($messages) : ?>
        <div class="col-lg-4" style="position: fixed; z-index: 9999; top: 3.7rem; left:0; right:0; margin: 0 auto">
            <?php foreach ($messages as $type => $message) : ?>
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
    require_once '../includes/footer.php';
    echo "</main>
            </div>";
    require_once '../includes/scripts.php';
    if (!empty($additionalJS)) {
        foreach ($additionalJS as $script) {
            echo "<script src='" . asset($script, false) . "'></script>";
        }
    }
    echo "
        </body>
    </html>
    ";
}
