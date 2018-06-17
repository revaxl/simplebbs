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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/profile', 'HomeController@profile')->name('profile');

Route::resource('/topics', 'TopicController');
Auth::routes();

Route::post('/comment', 'CommentController@store');
Route::delete('/comment/{id}/delete', 'CommentController@destroy');

