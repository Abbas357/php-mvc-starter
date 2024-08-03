<?php
require_once('app/init.php');
if (authenticated()) redirectTo('index');
function layoutTop($pageTitle = 'Page', $additionalCSS = [])
{
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
            <![endif]-->";
}

function layoutBottom($additionalJS = [])
{
    echo "<script src='" . asset('vendor/jquery', 'jquery.min.js') . "'></script>
      <script src='" . asset('vendor/bootstrap/js', 'popper.min.js') . "'></script>
      <script src='" . asset('vendor/bootstrap/js', 'bootstrap.min.js') . "'></script>
      <script src='" . asset('js', 'theme.js') . "'></script>";
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
