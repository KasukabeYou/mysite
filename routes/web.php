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
    return view('welcome');
});
Route::get('top', 'TopController@index');

Route::get('mail', 'Mail\MailController@index');
Route::post('/mail/confirm', 'Mail\MailController@confirm')->name('mail.confirm');
Route::post('/mail/thanks', 'Mail\MailController@send')->name('mail.send');

Route::get('profile', 'Profile\ProfileController@index');
Route::get('works', 'Works\WorksController@index');

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