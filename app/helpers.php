<?php

function authenticated()
{
    return (isset($_SESSION['user_id'])) ? true : false;
}

function authUser()
{
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

function checkInput($var)
{
    $var = stripcslashes($var);
    $var = trim($var);
    $var = htmlspecialchars($var, ENT_QUOTES, 'UTF-8');
    return $var;
}

function redirectTo($path)
{
    $url = rtrim(config('app.url'), '/') . '/' . ltrim($path, '/');
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

function setFlash($key, $message)
{
    if (!isset($_SESSION)) {
        session_start();
    }
    $_SESSION['flash_messages'][$key] = $message;
}

function getFlash()
{
    if (!isset($_SESSION)) {
        session_start();
    }
    $messages = $_SESSION['flash_messages'] ?? [];
    unset($_SESSION['flash_messages']);

    return $messages;
}

function route($dir, $echo = true)
{
    $url = config('app.url') . $dir;
    if ($echo) {
        echo $url;
        return;
    }
    return $url;
}

function routeTo($name, $params = [])
{
    $routeUrl = \App\Support\Router::route($name, $params);
    echo config('app.url') . $routeUrl;
}

function redirectToRoute($name, $parameters = [])
{
    $route = \App\Support\Router::getUriForNamedRoute($name);
    if (!$route) {
        throw new \Exception("No route found with the name: $name");
    }
    $uri = $route['uri'];
    foreach ($parameters as $key => $value) {
        $uri = str_replace("{{$key}}", $value, $uri);
    }
    header("Location:" . config('app.url') .'/'. trim($uri, '/'));
    exit;
}

function request_url()
{
    if ($_SERVER['HTTP_HOST'] == 'localhost') {
        $array_uri = explode('/', $_SERVER['REQUEST_URI']);
        return implode('/', array_slice($array_uri, 2));
    } else {
        return implode('/', array_slice(explode('/', $_SERVER['REQUEST_URI']), 1));
    }
}

function hasActive($route, $output = 'has-active')
{
    $currentRoute = substr($_SERVER['REQUEST_URI'], strpos($_SERVER['REQUEST_URI'], '/', strpos($_SERVER['REQUEST_URI'], '/') + 1) + 1);
    return $currentRoute === trim($route, '/') ? $output : '';
}

function view($viewName, $data = [])
{
    extract($data);
    $viewPath = "../views/{$viewName}.php";
    if (file_exists($viewPath)) {
        require $viewPath;
    } else {
        http_response_code(404);
        require "../views/errors/404.php";
    }
}

function request($key = null)
{
    $request = new \App\Support\Request;
    if ($key) {
        return $request->input($key);
    }
    return $request;
}

function response()
{
    return new \App\Support\Response;
}

function pdo()
{
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

function config($key, $default = null)
{
    static $config;
    if (!$config) {
        $config = require __DIR__ . '/config.php';
    }
    $keys = explode('.', $key);
    $value = $config;

    foreach ($keys as $key) {
        if (isset($value[$key])) {
            $value = $value[$key];
        } else {
            return $default;
        }
    }

    return $value;
}

function asset($file, $echo = true)
{
    $url = config('app.url') .'/'. $file;
    if ($echo) {
        echo $url;
        return;
    }
    return $url;
}

function old($key, $default = '') {
    if (isset($_SESSION['old_input'][$key])) {
        return $_SESSION['old_input'][$key];
    }
    return $default;
}

function method($httpMethod)
{
    $validMethods = ['PUT', 'PATCH', 'DELETE'];

    if (in_array(strtoupper($httpMethod), $validMethods)) {
        echo '<input type="hidden" name="_method" value="' . htmlspecialchars(strtoupper($httpMethod), ENT_QUOTES, 'UTF-8') . '">';
    }

    echo '';
}

function abort($code) {
    $viewsPath = $viewsPath = '../views/errors/';
    http_response_code($code);
    switch ($code) {
        case 401:
            $viewFile = $viewsPath . '401.php';
            break;
        case 403:
            $viewFile = $viewsPath . '403.php';
            break;
        case 404:
            $viewFile = $viewsPath . '404.php';
            break;
        default:
            $viewFile = $viewsPath . 'default.php';
            break;
    }
    if (file_exists($viewFile)) {
        include $viewFile;
    } else {
        echo "<h1>Error $code</h1>";
        echo "<p>An error occurred.</p>";
    }
    exit;
}

function env($key, $default = null)
{
    static $envVars = null;

    if ($envVars === null) {
        $envVars = [];
        if (file_exists(__DIR__ . '/../.env')) {
            $lines = file(__DIR__ . '/../.env', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach ($lines as $line) {
                if (strpos(trim($line), '#') === 0) {
                    continue;
                }
                list($name, $value) = explode('=', $line, 2);
                $name = trim($name);
                $value = trim($value);
                $envVars[$name] = $value;
            }
        }
    }

    return $envVars[$key] ?? $default;
}

function dd(...$vars)
{
    function formatVar($var, $depth = 0)
    {
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
function ago($datetime)
{
    $time = strtotime($datetime);
    $current = time();
    $seconds = $current - $time;
    if ($seconds < 60) return ($seconds == 0) ? ' · now' : ' · ' . $seconds . 's ago';
    $minutes = round($seconds / 60);
    if ($minutes < 60) return ' · ' . $minutes . 'm ago';
    $hours = round($seconds / 3600);
    if ($hours < 24) return ' · ' . $hours . 'h ago';
    $days = round($seconds / 86400);
    if ($days < 7) return ' · ' . $days . 'd ago';
    $weeks = round($seconds / 604800);
    if ($weeks < 4) return ' · ' . $weeks . 'w ago';
    $months = round($seconds / 2600640);
    if ($months < 12) return ' · ' . date('M j', $time);
    $years = round($seconds / 31556952);
    return ' · ' . date('j M Y', $time);
}