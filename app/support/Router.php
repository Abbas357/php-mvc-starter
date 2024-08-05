<?php

namespace App\Support;

class Router
{
    protected static $routes = [];
    protected static $namedRoutes = [];

    public static function get($uri, $modelMethod)
    {
        return self::addRoute('GET', $uri, $modelMethod);
    }

    public static function post($uri, $modelMethod)
    {
        return self::addRoute('POST', $uri, $modelMethod);
    }

    public static function patch($uri, $modelMethod)
    {
        return self::addRoute('PATCH', $uri, $modelMethod);
    }

    public static function put($uri, $modelMethod)
    {
        return self::addRoute('PUT', $uri, $modelMethod);
    }

    public static function delete($uri, $modelMethod)
    {
        return self::addRoute('DELETE', $uri, $modelMethod);
    }

    protected static function addRoute($method, $uri, $modelMethod)
    {
        self::$routes[$method][$uri] = $modelMethod;
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
        $uri = trim($requestUri, '/');
        $method = strtoupper($requestMethod);

        if (isset(self::$routes[$method][$uri])) {
            return self::callModelMethod(self::$routes[$method][$uri]);
        }

        http_response_code(404);
        require "../views/404.php";
    }

    protected static function callModelMethod($modelMethod)
    {
        list($modelClass, $method) = explode('@', $modelMethod);

        $modelClass = "\\App\\Models\\$modelClass";
        if (!class_exists($modelClass)) {
            throw new \Exception("Model $modelClass not found");
        }

        $modelInstance = new $modelClass();
        
        if (!method_exists($modelInstance, $method)) {
            throw new \Exception("Method $method not found in model $modelClass");
        }
        
        return $modelInstance->$method();
    }

    public static function getUriForNamedRoute($name)
    {
        return isset(self::$namedRoutes[$name]) ? self::$namedRoutes[$name] : null;
    }
}
