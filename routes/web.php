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

Auth::routes();

Route::get('/', function () {
    return view('top/index');
});
Route::get('top', 'TopController@index');

Route::get('mail', 'Mail\MailController@index');
Route::post('/mail/confirm', 'Mail\MailController@confirm')->name('mail.confirm');
Route::post('/mail/thanks', 'Mail\MailController@send')->name('mail.send');

Route::get('profile', 'Profile\ProfileController@index');

// ログインを設定
Route::get('works', 'Works\WorksController@index')->name('works.index');

Route::get('member', 'Member\MemberController@show');
Route::get('member/{id}/detail', 'Member\MemberController@detail')->name('member.detail')->where('id', '(.*)');

Route::get('member/signup', 'Member\MemberController@signup');
Route::post('member/add', 'Member\MemberController@create');

Route::get('member/{id}/edit', 'Member\MemberController@edit')->name('member.edit')->where('id', '(.*)');
Route::post('member/edit', 'Member\MemberController@update');

Route::get('member/{id}/del', 'Member\MemberController@delete')->name('member.del')->where('id', '(.*)');
Route::post('member/del', 'Member\MemberController@delUpdate');

Route::get('login', 'Login\LoginController@index');
Route::post('login', 'Login\LoginController@login');
Route::get('logout', 'Login\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['namespace' => 'Api'], function() {
    // LineからのWebhookを受信
    Route::post('/line/webhook', 'LineWebhookController@webhook')->name('line.webhook');
});

// ログイン
Route::get('login/sisu',      'Login\LoginController@getSiSu');
Route::get('login/pfed',        'Login\LoginController@getPfEd');
Route::get('login/pwrs',        'Login\LoginController@getPwRs');
Route::get('login/azure/redirect', 'Login\LoginController@getAzureRedirect');
Route::post('/login/azure/callback', 'Login\LoginController@getAzureCallback');

// Codeよりトークンを取得
Route::match(['get', 'post'], '/login/token/sisu', 'Login\LoginController@getTokenSiSu');
Route::match(['get', 'post'], '/login/token/pfed', 'Login\LoginController@getTokenPfEd');
Route::match(['get', 'post'], '/login/token/pwrs', 'Login\LoginController@getTokenPwRs');
Route::get('login/logout', 'Auth\LoginController@logout')->name('logout');

// Codeよりトークンを取得
// Route::get('auth/login', 'Login\LoginController@viewLogin');
Route::get('/login/facebook', 'Login\LoginController@redirectToFacebookProvider');
Route::get('/login/facebook/callback', 'Login\LoginController@handleFacebookProviderCallback');