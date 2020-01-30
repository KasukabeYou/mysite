<?php

namespace App\Http\Middleware;

use Closure;
use Log;
use Redirect;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use App\Consts\CommonConst;

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
        // chk:　0：不正フラグ、1：初期フラグ、2：ログイン済み
        if (!Cache::has('chk')) {
            // 1を設定する
            Log::info('ログイン最初');
            Cache::flush();
            Cache::put('chk','1', CommonConst::CACHE_TIME);
            return Redirect::to('/login');
        } else if(Cache::get('chk') != 1) {
            // Loginしていない
            if (!Cache::has('loginInfo')) {
                Log::info('ログインできず' . Cache::has('loginInfo'));
                // リダイレクトのループ対策
                Cache::put('chk','1', CommonConst::CACHE_TIME);
                return Redirect::to('/login');
                // idが不一致
            }
        }
        if($request->uid != null && hash('sha256',Cache::get('loginInfo')) != $request->uid) {
            Log::info('不正ログイン');
            Cache::put('chk','1', CommonConst::CACHE_TIME);
            return Redirect::to('/login');
        } else {
            Log::info('ログイン成功'.$request->uid);
            $uid = Str::uuid();
            Cache::put('loginInfo', Str::uuid(), CommonConst::CACHE_TIME);
            $request->uid = hash('sha256', $uid);
        }

        return $next($request);
    }
}
