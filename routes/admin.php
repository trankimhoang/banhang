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

        //Product
        Route::get('/product', 'Admin\ProductController@index')->name('product.list');

        Route::get('/product/add-product', 'Admin\ProductController@addProduct')->name('product.add');
        Route::post('/product/add-product', 'Admin\ProductController@addProductPost')->name('product.add.post');

        Route::get('product/edit-product/{id}', 'Admin\ProductController@editProduct')->name('product.edit');
        Route::post('/product/edit-product/{id}', 'Admin\ProductController@editProductPost')->name('product.edit.post');

        Route::get('product/delete-product/{id}', 'Admin\ProductController@deleteProduct')->name('product.delete');

        //Category
        Route::get('/category', 'Admin\CategoryController@listCategory')->name('category.list');

        Route::get('/category/add-category', 'Admin\CategoryController@addCategory')->name('category.add');
        Route::post('/category/add-category', 'Admin\CategoryController@addCategoryPost')->name('category.add.post');

        Route::get('/category/edit-category/{id}', 'Admin\CategoryController@editCategory')->name('category.edit');
        Route::post('/category/edit-category/{id}', 'Admin\CategoryController@editCategoryPost')->name('category.edit.post');

        Route::get('/category/delete-category/{id}', 'Admin\CategoryController@deleteCategory')->name('category.delete');

        //User
        Route::get('/user', 'Admin\UserController@listUser')->name('user.list');

        Route::get('/user/add-user', 'Admin\UserController@addUser')->name('user.add');
        Route::post('/user/add-user', 'Admin\UserController@addUserPost')->name('user.add.post');


        Route::get('/user/delete-user/{id}', 'Admin\UserController@deleteUser')->name('user.delete');
    });
});

