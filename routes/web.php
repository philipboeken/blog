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
    if (Auth::user()) {
        return redirect(route('home'));
    }
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/account', function () {
        return redirect('/account/personal');
    });
    Route::get('/account/personal', 'AccountController@index');
    Route::get('/account/account', 'AccountController@index');
    // Route::get('/account/notifications', 'AccountController@index');

    Route::get('/agenda', 'EventController@index');
    Route::post('/agenda/create', 'EventController@store');
    Route::post('/agenda/{event}/edit', 'EventController@update');

    Route::get('/contacts', 'ContactController@index');
    Route::post('api/v1/contacts', '\App\Api\V1\ContactController@store');
    Route::put('api/v1/contacts/{contact}', '\App\Api\V1\ContactController@update');
    Route::delete('api/v1/contacts/{contact}', '\App\Api\V1\ContactController@destroy');

    Route::get('/files', function () {
        return view('files.index');
    });
    Route::get('/files/{type}/{id?}', 'FileController@index');
    Route::post('files/add', 'FileController@store');
    Route::post('files/edit/{id}', 'FileController@edit');
    Route::post('files/delete/{id}', 'FileController@destroy');

    Route::post('/labels/create', 'LabelController@store');

    Route::post('/posts/{post}/comment', 'CommentController@store');

    Route::get('/posts', 'PostController@index')->name('posts');
    Route::get('/api/v1/posts', '\App\Api\V1\PostController@index');

    Route::get('/posts/create', 'PostController@create');
    Route::post('/posts/create', 'PostController@store');
    Route::get('/posts/{post}', 'PostController@show');
    Route::get('/posts/{post}/edit', 'PostController@edit');
    Route::put('/posts/{post}/edit', 'PostController@update');
    Route::delete('/posts/{post}', 'PostController@destroy');

    Route::get('/search', 'SearchController@index');
});

// Put, patch, delete {{ method_field('PATCH/DELETE') }}
