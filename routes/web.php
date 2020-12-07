<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('users', 'UsersController')->names('users');

Route::prefix('posts')->group(function ( ) {
    Route::get('/', 'PostController@index')->name('posts.index');
    Route::get('create', 'PostController@create')->name('posts.create');
    Route::get('/{post}', 'PostController@show')->name('posts.show');
    Route::post('store', 'PostController@store')->name('posts.store');
});

Route::prefix('admin')->group(  function ( ) {
    Route::get('dashboard', 'AuthController@dashboard')->name('admin.dashboard');
    Route::get('login', 'AuthController@showForm')->name('admin.show-form');
    Route::post('auth', 'AuthController@authenticate')->name('admin.authenticate');
    Route::get('logout', 'AuthController@logout')->name('admin.logout');
});

