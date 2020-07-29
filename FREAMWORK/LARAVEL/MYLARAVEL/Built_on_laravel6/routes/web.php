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
    // return view('welcome');
    return redirect('/items');
});
Route::get('/items/create', 'ItemsController@create');
Route::post('/items', 'ItemsController@store');
Route::get('/items', 'ItemsController@index');
Route::get('/items/{id}', 'ItemsController@show');
Route::get('/items/{id}/edit', 'ItemsController@edit');
Route::put('/items/{id}', 'ItemsController@update');
Route::delete('item/{id}', 'ItemsController@destroy');
