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

// Route::get('/', function () {
//     return view('welcome');
//});
Route::get('/','GkeeperController@index');
Route::get('/search','GkeeperController@create');
Route::post('/result','GkeeperController@search');
Route::get('/show','GkeeperController@show');
Route::get('/cars','CarsController@create');
Route::post('/cars','CarsController@store');
Route::get('/carsearch','CarsController@show');
Route::post('/carsearch','CarsController@edit');
Route::post('/save','GkeeperController@store');

Route::get('/result/{gkeeper}','GkeeperController@update');
