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

Route::get('/', [
    'uses' => 'FrontEndController@index',
    'as'=>  'index'
    ]);
    Route::get('product/{id}',[
        'uses'=>'FrontEndController@singleProduct',
        'as'=>'product.single'
        ]);

    Route::post('cart/add',[
        'uses' => 'ShoppingController@addToCart',
        'as'=>'cart.add'
    ]);
    Route::get('/cart',
    [
     'uses' => 'ShoppingController@cart',
     'as'=> 'cart'   
    ]);
    Route::get('cart/checkout',[
        'uses' => 'shoppingController@cartCheckOut',
        'as' =>'cart.checkout'
    ]);
    Route::post('cart/checkout',[
        'uses' => 'shoppingController@pay',
        'as' =>'cart.checkout'
    ]);
Route::resource('products', 'ProductsController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
