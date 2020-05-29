<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('movie', 'MovieController');

Route::get('/reserve/{sid}', 'ReserveController@index');
Route::post('/reserve/{sid}/store', 'ReserveController@store');
Route::get('/reserve/{sid}/success/{seat}', 'ReserveController@success');

Route::get('/admin', 'AdminController@index');

Route::get('/admin/movie', ['uses'=>'AdminController@movie', 'as'=>'admin.movie']);
Route::get('/admin/movie/create', 'AdminController@movieCreate');
Route::patch('/admin/movie/store', 'AdminController@movieInsert');
Route::get('/admin/movie/edit/{mid}', 'AdminController@movieEdit');
Route::post('/admin/movie/editdetail/{mid}', 'AdminController@movieUpdate');
Route::get('/admin/movie/delete/{mid}', 'AdminController@movieDestroy');
Route::get('/admin/movie/success', 'AdminController@movieSuccess');

Route::get('/admin/screening', ['uses'=>'AdminController@screening', 'as' =>'admin.screening']);
Route::get('/admin/screening/create', 'AdminController@screeningCreate');
Route::patch('/admin/screening/store', 'AdminController@screeningInsert');
Route::get('/admin/screening/edit/{mid}', 'AdminController@screeningEdit');
Route::post('/admin/screening/editdetail/{mid}', 'AdminController@screeningUpdate');
Route::get('/admin/screening/delete/{mid}', 'AdminController@screeningDestroy');
Route::get('/admin/screening/success', 'AdminController@screeningSuccess');


Route::get('/admin/facility', 'AdminController@facility');
Route::get('/admin/statistics', 'AdminController@statistics');
