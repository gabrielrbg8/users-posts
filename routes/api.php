<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('users')->group( function ( ) {
    Route::get('/', 'UsersController@getTotal')->name('users.total');
});

Route::prefix('posts')->group( function ( ) {
    Route::get('/', 'PostController@getTotal')->name('posts.total');
    Route::get('download', 'PostController@downloadArchives')->name('posts.download');
});

Route::prefix('files')->group( function ( ) {
    Route::get('/', 'PostFileController@getTotal')->name('files.total');
});

Route::prefix('profiles')->group( function ( ) {
    Route::get('/', 'ProfileController@getTotal')->name('profiles.total');
});

