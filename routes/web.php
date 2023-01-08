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

Route::get('/', 'PagesController@home');
// Route::get('blog/{id}', 'PostsController@show'); es el de abajo cambio en el video 21
Route::get('blog/{post}', 'PostsController@show')->name('posts.show'); //video 21

Route::group([
    'prefix'     => 'admin',
    'namespace'  => 'Admin',
    'middleware' => 'auth'],
    function(){
       Route::get('/', 'AdminController@index')->name('dashboard'); //video 13 aqui cambiar de home a admin y se le cambia el nombre del controlador de HomeController a AdminController
       Route::get('posts', 'PostsController@index')->name('admin.posts.index'); //video 12
       Route::get('especialista', 'EspecialistaController@index')->name('especialista.index');
       Route::get('posts/create', 'PostsController@create')->name('admin.posts.create'); //video 14 
       Route::post('posts', 'PostsController@store')->name('admin.posts.store'); //video 17 
       Route::get('posts/{post}', 'PostsController@edit')->name('admin.posts.edit');
       Route::put('posts/{post}', 'PostsController@update')->name('admin.posts.update'); //video 25
       Route::post('posts/{post}/photos', 'PhotosController@store')->name('admin.posts.photos.store'); //video 26
    });



// Authentication Routes... esto se hace para personalizar el login y registro//
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
