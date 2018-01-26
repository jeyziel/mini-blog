<?php

Route::get('/', function () {
   $tasks = DB::table('tasks')->get();
   return $tasks;
});

Auth::routes();

Route::get('/', 'PostController@index');
Route::get('/posts/tags/{tag}', 'TagsController@index');

Route::get('/posts/create', 'PostController@create');
//Route::get('/posts/{show}','PostController@show');
Route::post('/posts', 'PostController@store');
Route::get('/posts/{post}','PostController@show');
Route::get('/home', 'HomeController@index')->name('home');


//comments
Route::post('/posts/{post}/comments','CommentsController@addComment');
