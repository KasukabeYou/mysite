<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Arr;
use App\Providers\SocialiteB2CProvider;
use Session;
use Socialite;

class LoginController extends Controller
{

    /**
     * The client ID.
     *
     * @var string
     */
    protected $clientId;

    /**
     * The client secret.
     *
     * @var string
     */
    protected $clientSecret;

    /**
     * The redirect URL.
     *
     * @var string
     */
    protected $redirectUrl;

    /**
     * コンストラクタ.
     */
    public function __construct()
    {
        $this->clientId = env('AZURE_CLIENT_ID');
        $this->clientSecret = env('AZURE_APP_KEY');
        
        $this->middleware('guest')->except(['logout', 'logout']);
    }

    /**
     * サインイン/サインアップ.
     * 
     * @param $req リクエスト.
     */
    public function getSiSu(Request $req)
    {
        // リダイレクトＵＲＬの設定.
        $this->redirectUrl = env('AZURE_REDIRECT_URI_TOKEN_SISU');

        // パラメータの設定.
        $config = $this->getConfig(
            env('AZURE_SISU_POLICY'),
            $this->redirectUrl
        );

        // 認証処理の実行.
        return (new SocialiteB2CProvider($req, $this->clientId, $this->clientSecret, $this->redirectUrl))
            ->setConfig($config)
            ->redirect();
    }

    /**
     *  Facebookログイン.
     *
     * @return Response
     */
    public function redirectToFacebookProvider() {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * プロフィール編集.
     * 
     * @param $req リクエスト.
     */
    public function getPfEd(Request $req)
    {
        // リダイレクトＵＲＬの設定.
        $this->redirectUrl = env('AZURE_REDIRECT_URI_TOKEN_PFED');

        // パラメータの設定.
        $config = $this->getConfig(
            env('AZURE_PFED_POLICY'),
            $this->redirectUrl
        );

        // 認証処理の実行.
        return (new SocialiteB2CProvider($req, $this->clientId, $this->clientSecret, $this->redirectUrl))
            ->setConfig($config)
            ->redirect();
    }

    /**
     * パスワードリセット.
     * 
     * @param $req リクエスト.
     */
    public function getPwRs(Request $req)
    {
        // リダイレクトＵＲＬの設定.
        $this->redirectUrl = env('AZURE_REDIRECT_URI_TOKEN_PWRS');

        // パラメータの設定.
        $config = $this->getConfig(
            env('AZURE_PWRS_POLICY'),
            $this->redirectUrl
        );

        // 認証処理の実行.
        return (new SocialiteB2CProvider($req, $this->clientId, $this->clientSecret, $this->redirectUrl))
            ->setConfig($config)
            ->stateless()
            ->redirect();
    }

    /**
     * ログアウト.
     */
    public function logout()
    {
        return redirect(env('AZURE_LOGOUT_ENDPOINT'));
    }

    /**
     *  Azureのトークン情報の取得(サインイン・サインアップ).
     * 
     * @param $req リクエスト.
     */
    public function getTokenSiSu(Request $req)
    {
        return $this->getToken($req, env('AZURE_SISU_POLICY'));
    }

    /**
     *  Azureのトークン情報の取得(プロファイル編集).
     * 
     * @param $req リクエスト.
     */
    public function getTokenPfEd(Request $req)
    {
        return $this->getToken($req, env('AZURE_PFED_POLICY'));
    }

    /**
     *  Azureのトークン情報の取得(パスワードリセット).
     * 
     * @param $req リクエスト.
     */
    public function getTokenPwRs(Request $req)
    {
        return $this->getToken($req, env('AZURE_PWRS_POLICY'));
    }

    /**
     *  Azureのトークン情報の取得.
     * 
     * @param $req リクエスト.
     * @param $pol Azureのポリシー名.
     */
    private function getToken(Request $req, $pol)
    {
        // codeの取得
        $code = $req->input('code');
        
        // codeをコンフィグに設定する必要あり
        $config = $this->getTokenConfig(
            $pol, 
            env('AZURE_REDIRECT_URI_BASE'),
            $code
        );

        $this->clientId = env('AZURE_CLIENT_ID');
        $this->clientSecret = env('AZURE_APP_KEY');
        $this->redirectUrl = env('AZURE_REDIRECT_URI_BASE');
        $socialData = (new SocialiteB2CProvider($req, $this->clientId, $this->clientSecret, $this->redirectUrl))
            ->setConfig($config)
            ->token();

        // エラーの場合
        if (isset($req->error_description)) {
            return $this->errChk($req);
        }
        
        // TODO 登録処理が必要（ソーシャルかどうか）
        
        // セッションへ設定
        
        
        return view('works.index');
    }

    /**
     * Facebookコールバック.
     *
     * @return Response
     */
    public function handleFacebookProviderCallback()
    {
        try{
            $user = Socialite::driver('facebook')->user();

            if($user){
                dd($user);
                // OAuth Two Providers
                $token = $user->token;
                $refreshToken = $user->refreshToken;
                $expiresIn = $user->expiresIn;

                // All Providers
                $user->getId();
                $user->getNickname();
                $user->getName();
                $user->getEmail();
                $user->getAvatar();
            }
        }catch(Exception $e){
            return redirect("/");
        }
        
        return view('work/index');
    }

    /**
     * 認証要求時のコンフィグ情報を取得.
     * 
     * @param $policy Azureのポリシー.
     * @param $redirectUrl リダイレクトURL.
     */
    private function getConfig($policy, $redirectUrl) {

        $nonce = (string) Str::uuid();
        $clientId = env('AZURE_CLIENT_ID');
        $clientSecret = env('AZURE_APP_KEY');
        $redirectUrl = $redirectUrl;
        $additionalProviderConfig = array('tenant' => env('AZURE_TENANT')
                                            ,'client_id' => $clientId
                                            ,'policy' => $policy
                                            ,'nonce' => $nonce
                                            ,'response_type' => env('AZURE_RESPONSE_TYPE')
                                            ,'response_mode' => env('AZURE_RESPONSE_MODE')
                                            ,'scope' => env('AZURE_SCOPE')
                                            ,'redirect' => $redirectUrl);

        return new \SocialiteProviders\Manager\Config($this->clientId, $this->clientSecret, $this->redirectUrl, $additionalProviderConfig);
    }
    
    /**
     * トークン情報要求時のコンフィグ情報を取得.
     * 
     * @param $policy Azureのポリシー.
     * @param $redirectUrl リダイレクトURL.
     * @param $code   
     */
    private function getTokenConfig($policy, $redirectUrl, $code) {

        $clientId = env('AZURE_CLIENT_ID');
        $clientSecret = env('AZURE_APP_KEY');
        $redirectUrl = $redirectUrl;

        $additionalProviderConfig = array('grant_type' => 'authorization_code'
                                            ,'client_id'=> $clientId
                                            ,'scope' => $clientId
                                            ,'client_secret' => $clientSecret
                                            ,'code' => $code
                                            ,'redirect_uri' => $redirectUrl
                                            ,'tenant' => env('AZURE_TENANT')
                                            ,'policy' => $policy
                                            );

        return new \SocialiteProviders\Manager\Config($this->clientId, $this->clientSecret, $this->redirectUrl, $additionalProviderConfig);
    }

    /**
     * エラーチェック.
     * 
     * @param $req リクエスト.
     */
    private function errChk(Request $req){

        $err_des = $req->error_description;

        // パスワード忘れ
        if (mb_strpos($err_des, 'AADB2C90118') !== false) {
            // エンドポイント取得
            return $this->getPwRs($req);
        }

        // エラー制御を実装する箇所 
        if (mb_strpos($err_des, "AADB2C90091") >= 0) {
            $err_msg = "AADB2C90091:The user has cancelled entering self-asserted information";
            // 個人情報入力画面でキャンセルした場合
        } else if (mb_strpos($err_des, "AADB2C90273") >= 0) {
            $err_msg = "AADB2C90273:An invalid response was received : 'Error: access_denied,Error Description: Permissions error'";
            // SNS認証画面で（同意の）キャンセル
        } else if (mb_strpos($err_des, "AADB2C90151") >= 0) {
            $err_msg = "AADB2C90151:User has exceeded the maximum number for retries for multi-factor authentication.";
            // SMSコード間違いの最大回数オーバー
        } else if (mb_strpos($err_des, "AADB2CXXXX") >= 0) {
            $err_msg = "AADB2CXXXX:";
            // 今後必要の応じて追加
        } else {
            // 想定外
            $err_msg = "想定外";
        }
        return view('err.error', ['error_msg'=>$err_msg]);
    }
}
// use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;
// use Log;
// use Illuminate\Support\Facades\Cache;
// use App\Member;
// use Illuminate\Support\Str;
// use App\Consts\CommonConst;

// class LoginController extends Controller
// {
//     public function index() {
//         return view('login.login');
//     }
    
//     /**
//      * ログインチェック.
//      */
//     public function login(Request $req) {
        
//         // ユーザー情報取得
//         $members = Member::where('mail', $req->mail)->exists();
//         // データがあり次第対応
//         // $members = Member::where('mail', $req->mail)->where('password', $req->password)->exists();
//         Log::info('お試し1');
//         // 存在チェック
//         if(!$members) {
//             Log::info('会員情報なし');
//             Cache::put('chk', 0, CommonConst::CACHE_TIME);
//             return view('login.login');
//         }
        
//         // 存在しているなら設定 ※おいおいはハッシュ化
//         $uid = Str::uuid();
//         Cache::put('loginInfo', $uid, CommonConst::CACHE_TIME);

//         return view('top.index',['id'=>hash('sha256',$uid)]);
//     }

//     /** 
//      * ログアウト.
//      */
//     public function logout() {
        
//         // キャッシュ削除
//         Cache::flush();
//         // フラグ設定
//         Cache::put('chk','1', CommonConst::CACHE_TIME);
        
//         return view('login.login');
//     }
// }
