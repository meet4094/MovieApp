<?php

use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });
Route::view('/', 'index');
Route::view('/movie', 'show');
