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



    //Seller routes
    Route::group(['middleware' => ['sellerAuth']], function () {

        Route::get('seller-dashboard', [
            'as' => 'seller-overview',
            'uses' => 'Seller\OverviewController@index'
        ]);

        //Products
        Route::resource('products', 'Seller\ProductController',
        [
            'names' => [
                'index' => 'seller-all-products',
                'create' => 'seller-create-product-form',
                'store' => 'seller-store-product',
                'show' => 'seller-show-product',
                'edit' => 'seller-edit-product-form',
                'update' => 'seller-update-product',
                'destroy' => 'seller-destroy-product',
            ]
        ]);



        //Orders
        Route::get('orders', [
            'as' => 'seller-outstanding-orders',
            'uses' => 'Seller\OrdersController@showOutstandingOrders'
        ]);













    });



});
