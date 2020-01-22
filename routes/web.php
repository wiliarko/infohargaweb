<?php

Route::get('/', function () {
    return view('coba');
});

Route::get('home', 'newController@index');
Route::get('add', 'newController@add');
Route::post('add', 'ProductController@store');
Route::get('crud/{p_id}/edit', 'newController@edit');
Route::post('/crud/save', 'newController@update');


Route::resource('coba', 'CobaController');
Route::resource('product', 'ProductController');
Route::resource('product/add', 'ProductController@addproduct');