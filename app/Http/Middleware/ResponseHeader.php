<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ResponseHeader
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        $response->header('TEST-HEADER','hoge');
        $response->header('Cache-control','no-store');
        $response->header('Pragma','no-cache');
        $response->header('X-Frame-Options','Deny');
        $response->header('X-Content-Type-Options', 'nosniff');
        $response->header('X-XSS-Protection', '1; mode=block');
        

        return $response;
    }
}
