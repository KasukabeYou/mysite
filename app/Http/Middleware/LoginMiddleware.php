<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Log;
use Redirect;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class LoginMiddleware
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
        // 初めて
        if (!Cache::has('chk')) {
            // 1を設定する
            Log::info('ログイン最初');
            Cache::put('chk','1', 300);
            return Redirect::to('/login');
        } else if(Cache::get('chk') != 1) {
            // Loginしていない
            if (!Cache::has('loginInfo')) {
                Log::info('ログインできず' . Cache::has('loginInfo'));
                // リダイレクトのループ対策
                Cache::put('chk','1', 300);
                return Redirect::to('/login');
                // idが不一致
            }
        }
        if($request->uid != null && hash('sha256',Cache::get('loginInfo')) != $request->uid) {
            Log::info('不正ログイン');
            Cache::put('chk','1', 300);
            return Redirect::to('/login');
        } else {
            Log::info('ログイン成功'.$request->uid);
            $uid = Str::uuid();
            Cache::put('loginInfo', Str::uuid(), 300);
            $request->uid = hash('sha256', $uid);
        }

        return $next($request);
    }
}
