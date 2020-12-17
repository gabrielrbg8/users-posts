<?php

use App\Jobs\UserWelcome as JobsUserWelcome;
use App\Mail\UserWelcome;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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
Route::resource('posts', 'PostController')->names('posts');
Route::resource('profiles', 'ProfileController')->names('profiles');
Route::resource('actions', 'ActionController')->names('actions');
Route::resource('profile-actions', 'ProfileActionController')->names('profile-actions');


// Route::get('teste-email', function(){
//     *** ROTA PARA TESTAR OS TEMPLATES DE E-MAIL ANTES DE ENVIAR ***
// });
