<?php
function layoutTop($pageTitle = 'Page', $additionalCSS = [])
{
    echo "<!DOCTYPE html>
        <html lang='en'>
        <head>
            <title>$pageTitle | C&W Department, KP</title>";
    include_once 'includes/head.php';
    if (!empty($additionalCSS)) {
        foreach ($additionalCSS as $css) {
            echo "<link rel='stylesheet' href='$css'>";
        }
    }
    echo "</head>
        <body>
            <div class='app'>
            ";
    include_once 'includes/topbar.php';
    include_once 'includes/aside.php';
    echo "<main class='app-main'>
    ";
}

function layoutBottom($additionalJS = [])
{
    include_once 'includes/footer.php';
    echo "</main>
            </div>";
    include_once 'includes/scripts.php';
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
