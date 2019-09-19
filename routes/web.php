<?php

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

Route::get('/weather', ['as' => 'weather.index', 'uses' => 'WeatherController@index']);
Route::get('/orders', ['as' => 'orders.index', 'uses' => 'OrderController@index']);
Route::get('/orders/edit/{id}', ['as' => 'orders.edit', 'uses' => 'OrderController@edit']);
Route::post('/orders/update/{id}', ['as' => 'orders.update', 'uses' => 'OrderController@update']);
