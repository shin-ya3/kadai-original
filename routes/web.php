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
//トップページ
Route::get('/', 'BoardsController@index');
Route::resource('board', 'BoardsController', ['only' => ['store', 'create','destroy']]);

//スレッド
Route::get('board/{id}','ThreadsController@index')->name('thread.index');
Route::get('thread/{id}/edit','ThreadsController@edit')->name('thread.edit');

Route::put('thread/{id}','ThreadsController@update')->name('thread.update');

Route::get('board/{id}/thread/create','ThreadsController@create')->name('thread.create');
Route::post('board/{id}/thread','ThreadsController@store')->name('thread.store');

Route::resource('thread', 'ThreadsController', ['only' => ['destroy']]);

//投稿
Route::get('thread/{thread_id}', 'PostsController@index')->name('post.index');
Route::post('thread/{thread_id}/post', 'PostsController@store')->name('post.store');
Route::get('thread/{thread_id}/post/create', 'PostsController@create')->name('post.create');
Route::put('thread/{thread_id}/post/{id}','PostsController@update')->name('post.update');

Route::get('thread/{thread_id}/post/{id}/edit','PostsController@edit')->name('post.edit');


/*
Route::resource('board', 'BoardController');
Route::resource('board.thread', 'ThreadController');
Route::resource('board.thread.post', 'PostController');
*/