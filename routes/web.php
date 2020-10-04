<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// ログイン処理 ※詳細は「AuthRouteMethods」を参照
Auth::routes();

Route::group(['middleware'=>'set.locale'], function () {
    // トップ画面
    Route::get('/', function () {
        App::setLocale('ja');
        Session::put('locale','ja');
        return view('top/index');
    })->name('top');

    // メール処理
    Route::get('mail', 'Mail\MailController@index')->name('mail.index');
    Route::post('/mail/confirm', 'Mail\MailController@confirm')->name('mail.confirm');
    Route::post('/mail/thanks', 'Mail\MailController@send')->name('mail.send');
    
    Route::get('profile', 'Profile\ProfileController@index');
    
    // 処理一覧を設定
    Route::get('works', 'Works\WorksController@index')->name('works.index');
    
    // 会員処理
    Route::get('member', 'Member\MemberController@show')->name('member.show')->middleware('authc');
    Route::get('member/{id}/detail', 'Member\MemberController@detail')->name('member.detail')->where('id', '(.*)')->middleware('authc');
    // 登録
    Route::get('member/signup', 'Member\MemberController@signup')->name('member.signup');
    Route::post('member/add', 'Member\MemberController@create');
    // 編集
    Route::get('member/{id}/edit', 'Member\MemberController@edit')->name('member.edit')->where('id', '(.*)')->middleware('authc');
    Route::post('member/edit', 'Member\MemberController@update')->middleware('authc');
    // 削除
    Route::get('member/{id}/del', 'Member\MemberController@delete')->name('member.del')->where('id', '(.*)')->middleware('authc');
    Route::post('member/del', 'Member\MemberController@delUpdate')->middleware('authc');
});

// 天気
Route::get('/weather/index', 'Weather\WeatherController@index')->name('weather.index');
Route::post('/weather/output', 'Weather\WeatherController@output')->name('weather.output');

// Googleアカウントログイン
// Route::get('login/google', 'Auth\LoginController@redirectToGoogle');
// Route::get('login/google/callback', 'Auth\LoginController@handleGoogleCallback');

Route::get('/login/{social}', 'Auth\LoginController@socialLogin')->where('social', 'google|facebook|twitter');
Route::get('/login/{social}/callback', 'Auth\LoginController@handleProviderCallback')->where('social', 'google|facebook|twitter');

Route::group(['namespace' => 'Api'], function() {
    // LineからのWebhookを受信
    Route::post('/line/webhook', 'LineWebhookController@webhook')->name('line.webhook');
});

if (env('APP_ENV') === 'production') {
    URL::forceScheme('https');
}
