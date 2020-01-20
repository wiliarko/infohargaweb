<?php

Route::get('/', function () {
    return view('coba');
});

Route::get('home', 'ProductController@home');
Route::get('add', 'ProductController@add');
Route::post('add', 'ProductController@store');


Route::resource('coba', 'CobaController');
Route::resource('product', 'ProductController');
Route::resource('product/add', 'ProductController@addproduct');