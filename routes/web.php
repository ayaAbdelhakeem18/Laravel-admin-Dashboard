<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::group(["middleware"=>"checkAdmin"],function(){
    Route::get('/users','UserController@index')->name("UsersPage");
    Route::get('/category','CategoryController@index')->name("CategoryPage");
    Route::get('/products', 'ProductController@index')->name("ProductsPage");
    Route::get('/orders', 'OrderController@index')->name("OrdersPage");
    Route::get('/brands', 'BrandController@index')->name("BrandsPage");
    Route::get('/customers', 'CustomerController@index')->name("CustomersPage");
    // products operation
    Route::get('/show/productsShow/{id}', 'ProductController@show');
    Route::get('/products/delete/{id}', 'ProductController@delete');
    Route::post('/products/update/{id}', 'ProductController@update');
    Route::get('/creation/productCreationForm', 'ProductController@creationPage');
    Route::post('/products/create', 'ProductController@create');
    // brands operation
    Route::get('/show/brandShow/{id}', 'BrandController@show');
    Route::get('/brands/delete/{id}', 'BrandController@delete');
    Route::post('/brands/update/{id}', 'BrandController@update');
    Route::get('/creation/brandCreationForm', 'BrandController@creationPage');
    Route::post('/brands/create', 'BrandController@create');
    // categories operation
    Route::get('/show/cateShow/{id}', 'CategoryController@show');
    Route::get('/category/delete/{id}', 'CategoryController@delete');
    Route::post('/category/update/{id}', 'CategoryController@update');
    Route::get('/creation/cateCreationForm', 'CategoryController@creationPage');
    Route::post('/category/create', 'CategoryController@create');
    // users operation
    Route::get('/show/userShow/{id}', 'UserController@show');
    Route::get('/users/delete/{id}', 'UserController@delete');
    Route::post('/users/update/{id}', 'UserController@update');
    Route::get('/creation/userCreationForm', 'UserController@creationPage');
    Route::post('/users/create', 'UserController@create');
    // customers operation
    Route::get('/show/customerShow/{id}', 'CustomerController@show');
    Route::get('/customers/delete/{id}', 'CustomerController@delete');
    Route::post('/customers/update/{id}', 'CustomerController@update');
    Route::get('/creation/customerCreationForm', 'CustomerController@creationPage');
    Route::post('/customers/create', 'CustomerController@create');
    // orders operation
    Route::get('/show/orderShow/{id}', 'OrderController@show');
    Route::get('/orders/delete/{id}', 'OrderController@delete');
    Route::post('/orders/update/{id}', 'OrderController@update');
    Route::get('/creation/orderCreationForm', 'OrderController@creationPage');
    Route::post('/orders/create', 'OrderController@create');
});


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
