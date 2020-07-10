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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/news', 'NewsController@index')->name('news');
Route::get('/cards', 'CardsController@index')->name('cards');
Route::get('/articles', 'ArticlesController@index')->name('articles');
Route::get('/shapito', 'ShapitoController@index')->name('shapito');
Route::get('/polygon', 'PolygonController@index')->name('polygon');
