<?php

namespace App\Http\Middleware;

use Closure;

class GameMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $header = $request->header('Authorization');
        if($header == 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9'){
            return $next($request);
        }
        return  response()->json(['error' => 'invalid Key']);
    }
}
