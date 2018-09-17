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


Route::get('/edit', 'ItemController@form')->name('form')->middleware('auth');
Route::post('/edit', 'ItemController@create')->name('create');

Route::match(['get', 'post'], '/edit/{id}', 'ItemController@edit')->name('edit');
Route::get('/show/{id}', 'ItemController@show')->name('show');
Route::get('/delete/{id}', 'ItemController@delete')->name('delete');




Route::get('/', 'ItemController@index')->name('home');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::post('/login', '\App\Http\Controllers\Auth\LoginController@login');