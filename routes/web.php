<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile/update', 'ProfileController@update')->name('profile.update');


// Route for posts
Route::get('/posts', 'PostController@index')->name('posts');
Route::get('/posts/trashed', 'PostController@postsTrashed')->name('posts.trashed');
Route::get('/post/create', 'PostController@create')->name('post.create');
Route::post('/post/store', 'PostController@store')->name('post.store');
Route::get('/post/show/{slug}', 'PostController@show')->name('post.show');
Route::get('/post/{id}', 'PostController@edit')->name('post.edit');
Route::post('/post/update/{id}', 'PostController@update')->name('post.update');
Route::get('/post/destroy/{id}', 'PostController@destroy')->name('post.destroy');
Route::get('/post/hdelete/{id}', 'PostController@hdelete')->name('post.hdelete');
Route::get('/post/restore/{id}', 'PostController@restore')->name('post.restore');


// Route for tags
Route::get('/tags', 'tagController@index')->name('tags');
Route::get('/tag/create', 'tagController@create')->name('tag.create');
Route::post('/tag/store', 'tagController@store')->name('tag.store');
Route::get('/tag/show/{slug}', 'tagController@show')->name('tag.show');
Route::get('/tag/{id}', 'tagController@edit')->name('tag.edit');
Route::post('/tag/update/{id}', 'tagController@update')->name('tag.update');
Route::get('/tag/destroy/{id}', 'tagController@destroy')->name('tag.destroy');



// Route for Users
Route::get('/users', 'userController@index')->name('users');
Route::get('/user/create', 'userController@create')->name('user.create');
Route::post('/user/store', 'userController@store')->name('user.store');
Route::get('/user/destroy/{id}', 'userController@destroy')->name('user.destroy');


