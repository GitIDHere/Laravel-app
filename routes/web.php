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

Route::get('/', 'HomeController@index');
Route::get('my-account', 'MyAccountController@index');

Route::group(['middleware' => ['auth', 'seller']], function () {
    Route::get('seller-dashboard', 'SellerController@index');
    Route::post('thing', 'ProductController@thing');
    Route::resource('products', 'ProductController');
});
