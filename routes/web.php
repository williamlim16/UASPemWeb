<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('movie', 'MovieController');

Route::get('/reserve/{sid}', 'ReserveController@index');
Route::post('/reserve/{sid}/store', 'ReserveController@store');
Route::get('/reserve/{sid}/success/{seat}', 'ReserveController@success');

Route::get('admin', 'AdminController@index');