<?php

Route::get('/', function () {
    return view('coba');
});

Route::get('product','ProductController@index');
Route::resource('coba', 'CobaController');