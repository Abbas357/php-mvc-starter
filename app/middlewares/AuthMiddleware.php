<?php

namespace App\Middleware;

class AuthMiddleware
{
    public function handle($request, $next)
    {
        if (!authenticated()) {
            redirectToRoute('login.view');
        }
        return $next($request);
    }
}
