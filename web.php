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

// トップ画面
Route::get('/', function () {
    return view('top/index');
});
Route::get('top', 'TopController@index');

// メール処理
Route::get('mail', 'Mail\MailController@index');
Route::post('/mail/confirm', 'Mail\MailController@confirm')->name('mail.confirm');
Route::post('/mail/thanks', 'Mail\MailController@send')->name('mail.send');

Route::get('profile', 'Profile\ProfileController@index');

// 処理一覧を設定
Route::get('works', 'Works\WorksController@index')->name('works.index');

// 会員処理
Route::get('member', 'Member\MemberController@show')->name('member.show');
Route::get('member/{id}/detail', 'Member\MemberController@detail')->name('member.detail')->where('id', '(.*)');

Route::get('member/signup', 'Member\MemberController@signup')->name('member.signup');
Route::post('member/add', 'Member\MemberController@create');

Route::get('member/{id}/edit', 'Member\MemberController@edit')->name('member.edit')->where('id', '(.*)');
Route::post('member/edit', 'Member\MemberController@update');

Route::get('member/{id}/del', 'Member\MemberController@delete')->name('member.del')->where('id', '(.*)');
Route::post('member/del', 'Member\MemberController@delUpdate');

Route::group(['namespace' => 'Api'], function() {
    // LineからのWebhookを受信
    Route::post('/line/webhook', 'LineWebhookController@webhook')->name('line.webhook');
});

if (env('APP_ENV') === 'production') {
    URL::forceScheme('https');
}
