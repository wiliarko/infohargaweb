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

Route::get('product', 'NewController@index');
Route::get('product/add', 'NewController@add');
Route::post('product/add', 'NewController@store');
Route::get('product/{p_id}/edit', 'NewController@edit');
Route::post('product/save', 'NewController@update');
Route::get('product/{p_id}/delete', 'NewController@destroy');

Route::get('toko', 'tokoController@index');
Route::get('toko/add', 'tokoController@add');
Route::post('toko/add', 'tokoController@store');
Route::get('toko/{t_id}/edit', 'tokoController@edit');
Route::post('toko/save', 'tokoController@update');
Route::get('toko/{t_id}/delete', 'tokoController@destroy');

Route::post('login', 'userController@login');

// Route::get('coba','CobaController@indexapi');
// Route::post('coba','CobaController@storeapi');
// Route::put('/coba/{id}','CobaController@updateapi');
// Route::delete('/coba/{id}','CobaController@destroyapi');

// Route::post('product','ProductController@index');
// Route::get('product/{id}','ProductController@detail');
// Route::post('product/update','ProductController@update');
// Route::post('product/barcode','ProductController@getbycode');