<?php

use Illuminate\Support\Facades\Route;

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
Route::name('web.')->group(function() {
    Route::get('/','Web\HomeController@index')->name('home');

    Route::get('/search','Web\ProductController@search')->name('product.search');

    Route::get('/add-cart/{id}','Web\CartController@AddCart')->name('add_cart');

    Route::get('/list-cart','Web\CartController@ListProduct')->name('cart_list_product');

    Route::get('/delete-cart/{id}', 'Web\CartController@deleteCart')->name('delete_cart');

    Route::get('/detail-product/{id}', 'Web\ProductController@detailProduct')->name('detail_product');
});


