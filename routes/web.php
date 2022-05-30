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

Route::get('/resto/edit/{id}','HomeController@edit');
Route::post('/restoran/update','HomeController@update');
Route::get('/checkinout', 'CheckInOutController@display');

//by leo
Route::get('/ulasan','UlasanController@index');
Route::get('/ulasan/tambah','UlasanController@tambah');
Route::post('/ulasan/store','UlasanController@store');
Route::get('/ulasan/edit/{id}','UlasanController@edit');
Route::post('/ulasan/update','UlasanController@update');
Route::get('/nilaikuliah/hapus/{id}','UlasanController@hapus');