<?php

namespace App\Http\Middleware;

use Closure;
use Log;

class SetLocale
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
        Log::info("ロケール". session()->has('locale'));
        if(session()->has('locale')) {
            app()->setLocale(session('locale'));
        }
        return $next($request);
    }
}
