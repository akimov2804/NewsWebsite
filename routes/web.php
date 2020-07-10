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
Route::get('/news', 'HomeController@news')->name('news');
Route::get('/articles', 'HomeController@articles')->name('articles');
Route::get('/shapito', 'HomeController@shapito')->name('shapito');
Route::get('/currency', 'HomeController@currency')->name('currency');
Route::get('news/read/{id}', 'HomeController@ReadNews')->name('news/read');
Route::get('articles/read/{id}', 'HomeController@ReadArticles')->name('articles/read');
Route::get('shapito/read/{id}', 'HomeController@ReadShapito')->name('shapito/read');
