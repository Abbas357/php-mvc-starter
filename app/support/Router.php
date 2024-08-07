<?php

namespace App\Support;

class Router
{
    protected static $routes = [];
    protected static $namedRoutes = [];

    public static function get($uri, $controllerMethod)
    {
        return self::addRoute('GET', $uri, $controllerMethod);
    }

    public static function post($uri, $controllerMethod)
    {
        return self::addRoute('POST', $uri, $controllerMethod);
    }

    public static function patch($uri, $controllerMethod)
    {
        return self::addRoute('PATCH', $uri, $controllerMethod);
    }

    public static function put($uri, $controllerMethod)
    {
        return self::addRoute('PUT', $uri, $controllerMethod);
    }

    public static function delete($uri, $controllerMethod)
    {
        return self::addRoute('DELETE', $uri, $controllerMethod);
    }

    protected static function addRoute($method, $uri, $controllerMethod)
    {
        self::$routes[$method][$uri] = $controllerMethod;
        return new static($method, $uri);
    }

    protected $method;
    protected $uri;

    public function __construct($method, $uri)
    {
        $this->method = $method;
        $this->uri = $uri;
    }

    public function name($name)
    {
        self::$namedRoutes[$name] = ['method' => $this->method, 'uri' => $this->uri];
    }

    public static function route($name, $params = [])
    {
        if (!isset(self::$namedRoutes[$name])) {
            throw new \Exception("Route [{$name}] not defined.");
        }

        $route = self::$namedRoutes[$name];
        $uri = $route['uri'];

        foreach ($params as $key => $value) {
            $uri = str_replace("{{$key}}", $value, $uri);
        }

        return $uri;
    }

    public static function dispatch($requestUri, $requestMethod)
    {
        $parsedUrl = parse_url($requestUri);
        $uri = trim($parsedUrl['path'], '/');
        $method = strtoupper($requestMethod);

        $queryParams = [];
        if (isset($parsedUrl['query'])) {
            parse_str($parsedUrl['query'], $queryParams);
        }

        foreach (self::$routes[$method] as $routeUri => $controllerMethod) {
            $routePattern = preg_replace('/\{[^\}]+\}/', '([^/]+)', $routeUri);
            $routePattern = "@^" . trim($routePattern, '/') . "$@";

            if (preg_match($routePattern, $uri, $matches)) {
                array_shift($matches); // Remove the full match
                return self::callControllerMethod($controllerMethod, $matches, $queryParams);
            }
        }

        http_response_code(404);
        require "../views/errors/404.php";
    }

    protected static function callControllerMethod($controllerMethod, $params = [])
    {
        list($controllerClass, $method) = explode('@', $controllerMethod);

        $controllerClass = "\\App\\Controllers\\$controllerClass";
        if (!class_exists($controllerClass)) {
            throw new \Exception("Controller $controllerClass not found");
        }

        $controllerInstance = new $controllerClass();
        
        if (!method_exists($controllerInstance, $method)) {
            throw new \Exception("Method $method not found in model $controllerClass");
        }
        
        return call_user_func_array([$controllerInstance, $method], $params);
    }

    public static function getUriForNamedRoute($name)
    {
        return isset(self::$namedRoutes[$name]) ? self::$namedRoutes[$name] : null;
    }
}