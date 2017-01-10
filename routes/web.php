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




Route::group(['middleware' => ['auth']], function () {

    Route::get('my-account', [
        'as' => 'my-account',
        'uses' => 'MyAccountController@index'
    ]);



    Route::get('seller-register', [
        'as' => 'seller-register',
        'uses' => 'Seller\RegistrationController@create'
    ]);

    Route::post('seller-register', [
        'as' => 'seller-register-post',
        'uses' => 'Seller\RegistrationController@store'
    ]);

});


Route::group(['middleware' => ['auth', 'sellerAuth']], function () {

    Route::get('seller-dashboard', [
        'as' => 'seller-overview',
        'uses' => 'Seller\OverviewController@index'
    ]);

    Route::resource('products', 'Seller\ProductController',
    [
        'names' => [
            'index' => 'all-products',
            'create' => 'create-product-form',
            'store' => 'store-product',
            'show' => 'show-product',
            'edit' => 'edit-product-form',
            'update' => 'update-product',
            'destroy' => 'destroy-product',
        ]
    ]);

});
