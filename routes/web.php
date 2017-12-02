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
    if(Auth::user()){
        return redirect(route('home'));
    }
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/account',function() {
    return redirect('/account/personal');
});
Route::get('/account/personal', 'AccountController@index');
Route::get('/account/account', 'AccountController@index');
Route::get('/account/notifications', 'AccountController@index');
Route::get('/agenda', 'EventController@index');

Route::get('/contacts', 'ContactController@index');
Route::post('/contacts/create', 'ContactController@store');

Route::get('/files', 'FileController@index');

Route::post('/labels/create', 'LabelController@store');

Route::post('/posts/{post}/comment', 'CommentController@store');

Route::get('/posts', 'PostController@index');
Route::get('/posts/create', 'PostController@create');
Route::post('/posts/create', 'PostController@store');
Route::get('/posts/{post}', 'PostController@show');
Route::get('/posts/{post}/edit', 'PostController@edit');
Route::post('/posts/{post}/edit', 'PostController@update')->name('');
Route::delete('/posts/{post}', 'PostController@destroy');

Route::get('/search', 'SearchController@index');


// Put, patch, delete {{ method_field('PATCH/DELETE') }}
