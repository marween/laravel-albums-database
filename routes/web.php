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


Route::resource ('albums', 'albumsController');

Auth::routes();

Route::get('/', 'albumsController@index');

// toutes les routes de connection renvoi vers home
// pour ne pas modifier les fichiers partout j'ai renvoyé vers l'index de l'album
Route::get('/home', 'HomeController@index')->name('home');
