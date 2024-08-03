<?php

function pdo() {
    static $pdo = null;

    if ($pdo === null) {
        $dsn = 'mysql:host=localhost;dbname=cwdgkp_new';
        $username = 'root';
        $password = '';
        $options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        );

        try {
            $pdo = new PDO($dsn, $username, $password, $options);
        } catch (PDOException $e) {
            die("Connection Problem: " . $e->getMessage());
        }
    }
    return $pdo;
}

function authenticated(){
    return (isset($_SESSION['user_id'])) ? true : false;
}

function authUser() {
    if (isset($_SESSION['user_id'])) {
        $userId = $_SESSION['user_id'];
        $sql = "SELECT * FROM users WHERE id = :id";
        
        try {
            $stmt = $GLOBALS['pdo']->prepare($sql);
            $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
            $stmt->execute();
            
            $result = $stmt->fetch(PDO::FETCH_OBJ);
            return $result ?: null;
        } catch (PDOException $e) {
            error_log("Database query failed: " . $e->getMessage());
            return null;
        }
    }
    return null;
}

function dd(...$vars) {
    function formatVar($var, $depth = 0) {
        $indent = str_repeat('  ', $depth);
        if (is_array($var)) {
            $output = "Array (\n";
            foreach ($var as $key => $value) {
                $output .= $indent . '  [' . (is_string($key) ? '"' . $key . '"' : $key) . '] => ' . formatVar($value, $depth + 1) . "\n";
            }
            $output .= $indent . ')';
        } elseif (is_object($var)) {
            $reflection = new ReflectionObject($var);
            $output = 'Object (' . get_class($var) . ') {' . "\n";
            foreach ($reflection->getProperties() as $property) {
                $property->setAccessible(true);
                $name = $property->getName();
                $value = $property->getValue($var);
                $output .= $indent . '  ' . $name . ' => ' . formatVar($value, $depth + 1) . "\n";
            }
            $output .= $indent . '}';
        } elseif (is_resource($var)) {
            $output = 'Resource (' . get_resource_type($var) . ')';
        } else {
            ob_start();
            var_dump($var);
            $output = ob_get_clean();
        }
        return $output;
    }

    echo '<style>
            .dd-container { font-family: Arial, sans-serif; line-height: 1.6; }
            .dd-container pre { background: #f5f5f5; padding: 10px; border: 1px solid #ddd; }
            .dd-container .type { color: #555; font-weight: bold; }
            .dd-container .header { font-size: 1.2em; margin-bottom: 10px; }
            .dd-container .error { color: red; }
            .dd-container .file { font-style: italic; color: #777; }
        </style>';

    echo '<div class="dd-container">';
    echo '<div class="header">Dump:</div>';
    echo '<div class="file">Called from: ' . basename(debug_backtrace()[0]['file']) . ' on line ' . debug_backtrace()[0]['line'] . '</div>';
    
    foreach ($vars as $var) {
        echo '<div class="type">Type: ' . gettype($var) . '</div>';
        echo '<pre>' . formatVar($var) . '</pre>';
    }

    echo '</div>';

    die();
}

function checkInput($var)
{
    $var = stripcslashes($var);
    $var = trim($var);
    $var = htmlspecialchars($var, ENT_QUOTES, 'UTF-8');
    return $var;
}

function preventAccess($request, $currentFile, $currently)
{
    if (headers_sent()) {
        return;
    }
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && $currentFile === $currently) {
        redirectTo('index');
    }
}

function redirectTo($path)
{
    if (!defined('BASE_URL')) {
        throw new RuntimeException('BASE_URL is not defined.');
    }
    $url = rtrim(BASE_URL, '/') . '/' . ltrim($path, '/');
    if (headers_sent()) {
        throw new RuntimeException('Headers already sent.');
    }
    header('Location: ' . $url);
    exit();
}

function redirectBack($fallback = 'index')
{
    $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
    if ($referer) {
        redirectTo(parse_url($referer, PHP_URL_PATH));
    } else {
        redirectTo($fallback);
    }
}

function timeAgo($datetime)
{
    $time = strtotime($datetime);
    $current = time();
    $seconds = $current - $time;

    if ($seconds < 60) {
        return ($seconds == 0) ? ' · now' : ' · ' . $seconds . 's ago';
    }

    $minutes = round($seconds / 60);
    if ($minutes < 60) {
        return ' · ' . $minutes . 'm ago';
    }

    $hours = round($seconds / 3600);
    if ($hours < 24) {
        return ' · ' . $hours . 'h ago';
    }

    $days = round($seconds / 86400);
    if ($days < 7) {
        return ' · ' . $days . 'd ago';
    }

    $weeks = round($seconds / 604800);
    if ($weeks < 4) {
        return ' · ' . $weeks . 'w ago';
    }

    $months = round($seconds / 2600640);
    if ($months < 12) {
        return ' · ' . date('M j', $time);
    }

    $years = round($seconds / 31556952);
    return ' · ' . date('j M Y', $time);
}

function logo($width = 250, $height = 60, $alt = 'Logo')
{
    $path = 'assets/images/logo.png';
    $basePath = defined('BASE_URL') ? rtrim(BASE_URL, '/') . '/' : '';
    $fullPath = $basePath . ltrim($path, '/');
    return sprintf(
        '<img src="%s" style="width:%dpx; height:%dpx" alt="%s" />',
        htmlspecialchars($fullPath, ENT_QUOTES, 'UTF-8'),
        (int)$width,
        (int)$height,
        htmlspecialchars($alt, ENT_QUOTES, 'UTF-8')
    );
}

function redirectIfDirectAccess()
{
    if ($_SERVER['REQUEST_METHOD'] === "GET" && realpath(__FILE__) === realpath($_SERVER['SCRIPT_FILENAME'])) {
        redirectTo('index');
        exit;
    }
}

function asset($type, $file)
{
    $baseUrl = defined('BASE_URL') ? BASE_URL : '';

    $validTypes = ['js', 'css', 'vendor'];

    if (!in_array($type, $validTypes)) {
        throw new InvalidArgumentException("Invalid asset type provided.");
    }

    return $baseUrl . '/assets/' . $type . '/' . $file;
}