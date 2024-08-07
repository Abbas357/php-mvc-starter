<?php

namespace App\Support;

class Request
{
    protected $data;
    protected $post;
    protected $get;
    protected $files;

    public function __construct()
    {
        $this->data = array_merge($_GET, $_POST);
        $this->post = array_merge($_POST);
        $this->get = array_merge($_GET);
        $this->files = $_FILES;
    }

    public function input($key, $default = null)
    {
        $value = $this->data[$key] ?? $default;
        return checkInput($value);
    }

    public function has($key)
    {
        return isset($this->data[$key]);
    }

    public function all()
    {
        return $this->data;
    }

    public function file($key)
    {
        return $this->files[$key] ?? null;
    }

    public function hasFile($key)
    {
        return isset($this->files[$key]) && $this->files[$key]['error'] === UPLOAD_ERR_OK;
    }

    public function query($key = null, $default = null)
    {
        if ($key === null) {
            return $this->get;
        }

        return $_GET[$key] ?? $default;
    }

    public function post($key = null, $default = null)
    {
        if ($key === null) {
            return $this->post;
        }

        return $_POST[$key] ?? $default;
    }

    public function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function isMethod($method)
    {
        return $this->method() === strtoupper($method);
    }

    public function isPost()
    {
        return $this->isMethod('POST');
    }

    public function isSubmitted()
    {
        return !empty($this->all());
    }

    public function uri()
    {
        return $_SERVER['REQUEST_URI'];
    }

    public function server($key = null)
    {
        return $key ? ($_SERVER[$key] ?? null) : $_SERVER;
    }

    public function headers()
    {
        return getallheaders();
    }

    public function header($key, $default = null)
    {
        $headers = $this->headers();
        return $headers[$key] ?? $default;
    }

    public function ip()
    {
        return $_SERVER['REMOTE_ADDR'];
    }
}
