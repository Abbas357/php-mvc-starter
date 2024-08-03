<?php
require_once('app/init.php');
// use App\Models\User;
// $user = new User($pdo);
// dd(authUser());
if (!authenticated()) redirectTo('login');
function layoutTop($pageTitle = 'Page', $additionalCSS = [])
{
    global $main;
    echo "<!DOCTYPE html>
        <html lang='en'>
        <head>
            <title>$pageTitle | C&W Department, KP</title>";
    require_once 'includes/head.php';
    if (!empty($additionalCSS)) {
        foreach ($additionalCSS as $css) {
            echo "<link rel='stylesheet' href='$css'>";
        }
    }
    echo "</head>
        <body>
        <!--[if lt IE 10]>
        <div class='page-message' role='alert'>You are using an <strong>outdated</strong> browser. Please <a class='alert-link' href='http://browsehappy.com/'>upgrade your browser</a> to improve your experience and security.</div>
        <![endif]-->
            <div class='app'>
            ";
    require_once 'includes/topbar.php';
    require_once 'includes/aside.php';
    echo "<main class='app-main'>
    ";
}

function layoutBottom($additionalJS = [])
{
    require_once 'includes/footer.php';
    echo "</main>
            </div>";
    require_once 'includes/scripts.php';
    if (!empty($additionalJS)) {
        foreach ($additionalJS as $script) {
            echo "<script src='$script'></script>";
        }
    }
    echo "
        </body>
    </html>
    ";
}
