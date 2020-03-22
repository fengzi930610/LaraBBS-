<?php
use Illuminate\Http\Request;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/492/{id}', function (Request $request) {
    // $orederCount = 64918+72402+51499+79122+10512.58+17225.06+18676+16427+17846.9+59157+61523+125534+65318+15595+98179.2+153240.5+323637+20100.95+72124+56111+14799;
    // print_r($orederCount);die;//1413947.19
    // $recharCount = 381294;
    // print_r($recharCount);die;
    $count = $request->route('id');
    // $count = 26;
    $data = [];
    for($i=0; $i< $count; $i++){
        $data = [
            rand(1,49),
            // rand(1,49),
            // rand(1,49),
            // rand(1,49),
            // rand(1,49)
        ];
        print_r($data);
        // $data[] = rand(1,49);
    }
    // sort($data);
    // $data = array_unique($data);//数组去重
    // print_r($data);
});

// Auth::routes();

Route::get('/', 'PagesController@root')->name('root');

// 用户身份验证相关的路由
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// 用户注册相关路由
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// 密码重置相关路由
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

// Email 认证相关路由
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
// Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
Route::post('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');//该路由默认为post请求



Route::resource('users', 'UsersController', ['only' => ['show', 'update', 'edit']]);

/**
Route::get('/users/{user}', 'UsersController@show')->name('users.show');
Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit');
Route::patch('/users/{user}', 'UsersController@update')->name('users.update');
 */
