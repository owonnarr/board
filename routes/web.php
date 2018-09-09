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

Route::get('/', 'ItemController@index')->name('home');

Route::post('/edit', 'ItemController@create')->name('create');
Route::get('/edit', 'ItemController@form')->name('form');
Route::post('/edit/{id}', 'ItemController@edit')->name('edit');
Route::get('/{id}', 'ItemController@show')->name('show_item');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

