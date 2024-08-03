<?php

namespace App\Support;

class Response
{
    protected $headers = [];
    protected $statusCode = 200;

    public function header($key, $value)
    {
        $this->headers[$key] = $value;
        return $this;
    }

    public function headers(array $headers)
    {
        foreach ($headers as $key => $value) {
            $this->header($key, $value);
        }
        return $this;
    }

    public function status($code)
    {
        $this->statusCode = $code;
        return $this;
    }

    public function send($content)
    {
        http_response_code($this->statusCode);
        foreach ($this->headers as $key => $value) {
            header("{$key}: {$value}");
        }
        echo $content;
        exit;
    }

    public function json($data, $status = 200)
    {
        $this->header('Content-Type', 'application/json')
             ->status($status)
             ->send(json_encode($data));
    }

    public function text($content, $status = 200)
    {
        $this->header('Content-Type', 'text/plain')
             ->status($status)
             ->send($content);
    }

    public function html($content, $status = 200)
    {
        $this->header('Content-Type', 'text/html')
             ->status($status)
             ->send($content);
    }

    public function redirect($url, $status = 302)
    {
        $this->status($status)
             ->header('Location', $url)
             ->send('');
    }
}

// use App\Support\Response;

// // Create a new response instance
// $response = new Response();

// // Sending a JSON response
// $response->json(['message' => 'Success', 'data' => $data], 200);

// // Sending a plain text response
// $response->text('This is a plain text response.', 200);

// // Sending an HTML response
// $htmlContent = "<html><body><h1>Hello, World!</h1></body></html>";
// $response->html($htmlContent, 200);

// // Redirecting to another URL
// $response->redirect('http://example.com', 301);