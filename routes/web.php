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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/account', 'AccountController@index');
Route::get('/agenda', 'EventController@index');
Route::get('/contacts', 'ContactController@index');
Route::get('/files', 'FileController@index');
Route::get('/search', 'SearchController@index');


Route::post('/posts/{post}/comment', 'CommentController@store');

Route::get('/posts', 'PostController@index');
Route::get('/posts/create', 'PostController@create');
Route::post('/posts/create', 'PostController@store');
Route::get('/posts/{post}', 'PostController@show');
Route::get('/posts/{post}/edit', 'PostController@edit');
Route::post('/posts/{post}/edit', 'PostController@update');
Route::delete('/posts/{post}', 'PostController@destroy');

// Put, patch, delete {{ method_field('PATCH/DELETE') }}
