<?php

namespace App\Http\Controllers\Login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Log;
use Illuminate\Support\Facades\Cache;
use App\Member;
use Illuminate\Support\Str;
use App\Consts\CommonConst;

class LoginController extends Controller
{
    public function index() {
        return view('login.login');
    }
    
    /**
     * ログインチェック.
     */
    public function login(Request $req) {
        
        // ユーザー情報取得
        $members = Member::where('mail', $req->mail)->exists();
        // データがあり次第対応
        // $members = Member::where('mail', $req->mail)->where('password', $req->password)->exists();
        Log::info('お試し1');
        // 存在チェック
        if(!$members) {
            Log::info('会員情報なし');
            Cache::put('chk', 0, CommonConst::CACHE_TIME);
            return view('login.login');
        }
        
        // 存在しているなら設定 ※おいおいはハッシュ化
        $uid = Str::uuid();
        Cache::put('loginInfo', $uid, CommonConst::CACHE_TIME);

        return view('top.index',['id'=>hash('sha256',$uid)]);
    }
    
    /** 
     * ログアウト.
     */
    public function logout() {
        
        // キャッシュ削除
        Cache::flush();
        // フラグ設定
        Cache::put('chk','1', CommonConst::CACHE_TIME);
        
        return view('login.login');
    }
}
