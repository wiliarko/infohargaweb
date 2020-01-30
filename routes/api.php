<?php

use Illuminate\Http\Request;

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


Route::post('login', 'userController@login');

Route::get('coba','CobaController@indexapi');
Route::post('coba','CobaController@storeapi');
Route::put('/coba/{id}','CobaController@updateapi');
Route::delete('/coba/{id}','CobaController@destroyapi');

Route::post('product','ProductController@index');
Route::get('product/{id}','ProductController@detail');
Route::post('product/update','ProductController@update');
Route::post('product/barcode','ProductController@getbycode');