<?php

Route::get('/', function () {
    return view('coba');
});

Route::resource('coba', 'CobaController');