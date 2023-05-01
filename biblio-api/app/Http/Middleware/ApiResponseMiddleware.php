<?php

namespace App\Http\Middleware;

use Closure;

class ApiResponseMiddleware
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        $response->headers->remove('Cache-Control');
        $response->headers->remove('Content-Type');
        $response->headers->remove('Date');
        $response->header('Content-Type', 'application/json');

        return $response;
    }
}
