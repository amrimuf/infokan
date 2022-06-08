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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/resto/view/{id}', 'HomeController@detail');
Route::get('/layouts/app','HomeController@cari');

Route::get('/resto/add','RestoranController@add');
Route::get('/resto/store','RestoranController@store');
Route::get('/resto/edit/{id}','RestoranController@edit');
Route::post('/resto/update','RestoranController@update');
Route::get('/checkinout', 'CheckInOutController@display');

//by leo
Route::get('/ulasan/{id}','UlasanController@index')->name('ulasan');
Route::get('/ulasan/tambah/{id}','UlasanController@tambah');
Route::post('/ulasan/store/{id}','UlasanController@store');
Route::get('/ulasan/edit/{id}','UlasanController@edit');
Route::post('/ulasan/update/{id}','UlasanController@update');
Route::get('/ulasan/hapus/{id}','UlasanController@hapus');

Route::get('/upload', 'HomeController@upload');
Route::post('/upload/proses', 'HomeController@proses_upload');

Route::post('/menu/store/{id}', 'HomeController@tambahmenu');
