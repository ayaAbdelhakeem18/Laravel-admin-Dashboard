<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/brands','API\DataController@brands');
Route::get('/categories','API\DataController@categories');
Route::get('/products','API\DataController@products');
Route::get('/brandProducts/{id}','API\DataController@brandProducts');
Route::get('/cateProducts/{id}','API\DataController@cateProducts');
Route::post('/register', 'API\DataController@register');
Route::post('/login', 'API\DataController@login');
