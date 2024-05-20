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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['prefix' => 'admin'], function () {
    Route::post('login', 'Admin\Auth\LoginController@login')->name('admin.login');
    Route::get('login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('logout', 'Admin\Auth\LoginController@logout')->name('admin.logout');

    Route::post('register', 'Admin\Auth\RegisterController@register')->name('admin.register');
    Route::get('register', 'Admin\Auth\RegisterController@showRegistrationForm')->name('admin.register');

    Route::get('home', 'Admin\HomeController@index')->name('admin.home');
});

Route::get('/posts', 'PostController@index')->name('post.index');
Route::get('/posts/create', 'PostController@create')->name('post.create');
Route::get('/posts/{post}', 'PostController@show')->name('post.show');
Route::post('/posts', 'PostController@store')->name('post.store');
Route::put('/posts/{post}', 'PostController@update')->name('post.update');
Route::get('/posts/{post}/edit', 'PostController@edit')->name('post.edit');
Route::delete('/posts/{post}', 'PostController@delete')->name('post.delete');

Route::get('/home', 'HomeController@index')->name('home');
