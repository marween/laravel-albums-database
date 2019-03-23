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
;

Route::resource('albums', 'WebAlbumsController');
Route::get('/', function () {return view('welcome');});
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::group(['prefix'=>'api'], function() {
    
    Route::post('logout', 'ApiAuthController@logout');
    Route::post('refresh', 'ApiAuthController@refresh');
    Route::get('user', 'ApiAuthController@user');

    Route::post('albums/create', 'AlbumsController@store');
    Route::get('albums/search', 'AlbumsController@search');
    Route::get('albums', 'AlbumsController@index');
    Route::delete('albums/{id}', 'AlbumsController@destroy');
    Route::put('albums/{id}', 'AlbumsController@update');
    Route::get('albums/{id}', 'AlbumsController@show');
  
});