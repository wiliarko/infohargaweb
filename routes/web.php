<?php

Route::get('/', function () {
    return view('coba');
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



//Route::resource('product', 'NewController');

// Route::resource('coba', 'CobaController');
// Route::resource('product', 'ProductController');
// Route::resource('product/add', 'ProductController@addproduct');