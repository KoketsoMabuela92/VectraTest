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

Route::post('/edit', 'EditAlbumController@index')->name('edit');

Route::post('/delete', 'DeleteAlbumController@index')->name('delete');

Route::post('/insert', 'InsertAlbumController@index')->name('insert');

Route::post('/review', 'AddReviewController@index')->name('review');
