<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/movie', 'MovieController@index');
// Route::get('/movie/create', 'MovieController@create');
// Route::post('/movie', 'MovieController@store');
// Route::get('/movie/{id}/edit', 'MovieController@edit');
// Route::get('/movie/{id}', 'MovieController@show');
// Route::patch('/movie/{id}', 'MovieController@update');
// Route::delete('/movie/{id}', 'MovieController@destroy');

Route::resource('movie', 'MovieController');
