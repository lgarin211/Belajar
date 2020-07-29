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
Route::get('/blank', function () {
    return view('master.blank');
});
Route::get('/mt1', function () {
    return view('materi1');
});
Route::get('/mt2', function () {
    return view('item');
});
Route::get('/iem/tambah', 'ItemConntroller@tambah'); //halaman tambah data
Route::post('/item', 'ItemController@Kirim'); //sesi penambahan data
Route::get('/item', 'ItemController@index'); //menampilkan data


// Route::get('/siswa/tambah', 'SiswaConntroller@tambah'); //halaman tambah data
// Route::post('/siswa', 'SiswaController@Kirim'); //sesi penambahan data
// Route::get('/siswa', 'SiswaController@index'); //menampilkan data
