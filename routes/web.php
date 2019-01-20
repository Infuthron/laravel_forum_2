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

Route::get('/home', function () {
    return view('pages.home');
});

Route::get('/', function () {
    return view('home');
});

Route::get('/home/pages/{category}', ['uses' => 'TopicsController@index']);

Route::get('/topic/{topic_id}', ['uses' => 'PostsController@index'])->name('posts.show');

Route::get('/laravel_forum_2/public/topics/create/', 'TopicsController@create');

Route::get('/auth/change/', 'UserController@edit');

Route::put('/auth/change/{user_id}', 'UserController@update');

Route::get('/pages/users/', 'UsersController@show');
Route::put('/pages/users/[user_id]', 'UsersController@update');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




Route::resource('topics', 'TopicsController');
Route::resource('posts', 'PostsController');
