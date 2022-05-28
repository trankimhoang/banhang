<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::prefix('/admin')->name('admin.')->group(function () {
    Route::middleware('guest:admin')->group(function () {
        Route::get('login', 'Admin\Auth\LoginController@showLoginForm')->name('login'); // render giao dien
        Route::post('login', 'Admin\Auth\LoginController@login')->name('login_post'); // kiem tra dang nhap
//        Route::get('password/reset', 'Admin\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
//        Route::post('password/email', 'Admin\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//        Route::get('password/reset/{token}', 'Admin\Auth\ResetPasswordController@showResetForm')->name('password.reset');
//        Route::post('password/reset', 'Admin\Auth\ResetPasswordController@reset')->name('password.update');
    });

    Route::get('logout', 'Admin\Auth\LoginController@logout')->name('logout');


    Route::middleware('auth:admin')->group(function (){
        Route::get('/test', function (){
            // check trang thai dang nhap
//        if (\Illuminate\Support\Facades\Auth::guard('admin')->check() == true) {
//            print_r(\Illuminate\Support\Facades\Auth::guard('admin')->user()->toArray());
//
//            echo 'thanh cong';
//        } else {
//            echo 'chua dang nhap';
//        }


            return view('layouts.app');
        })->name('home');
    });
});
