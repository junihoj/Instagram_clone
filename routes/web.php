<?php

use Illuminate\Support\Facades\Route;
use App\Mail\NewUserWelcomeMail;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/email', function(){
	return new NewUserWelcomeMail();
});
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();


Route::post('follow/{user}', 'FollowsController@store');
Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
Route::get('/', 'PostsController@index');
Route::get('/p/create','PostsController@create');
Route::post('/p','PostsController@store');
Route::get('/p/{post}', 'PostsController@show')->name('posts.show');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');
