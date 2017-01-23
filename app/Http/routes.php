<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//Route::group(['middleware' => ['web']], function () {

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('posts.index');
});

Route::get('/', 'PostController@index');

Route::get('/posts/create', 'PostController@create');

Route::get('/posts/{id}', 'PostController@show');

Route::get('/posts/{id}/edit', 'PostController@edit');

Route::post('/posts', 'PostController@store');

Route::patch('/posts/{id}', 'PostController@update');

Route::delete('/posts/{id}', 'PostController@destroy');

Route::post('/posts/{post}/comments', 'CommentsController@store');

Route::delete('/posts/{post}/comments/{comment}', 'CommentsController@destroy');