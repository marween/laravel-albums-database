<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->group(function () {
    Route::post('logout', 'ApiAuthController@logout');
    Route::post('refresh', 'ApiAuthController@refresh');
    Route::get('user', 'ApiAuthController@user');
    
    Route::post('albums/create', 'AlbumsController@store');
    //Route::get('albums/search', 'AlbumsController@search');
    Route::delete('albums/{id}', 'AlbumsController@destroy');
    Route::put('albums/{id}', 'AlbumsController@update');
    Route::get('albums/{id}', 'AlbumsController@show');
});
Route::post('login', 'ApiAuthController@login');
