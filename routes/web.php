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

Route::get('/', 'WelcomeController@index')->name('welcome');

Auth::routes();

// Route::group(['middleware' => 'auth', 'prefix' => 'post'], function () {
//     Route::get('get-all', 'ProjectController@getAllPosts')->name('fetch_all');
//     // Route::get('create-post', 'ProjectController@createPost')->name('create_post');
//     Route::post('create-post', 'ProjectController@createPost')->name('create_post');
// });

Route::get('/home', 'HomeController@index')->name('home');
Route::get('content-blocks-list', 'ContentBlockController@contentBlocksList');
Route::get('projects-list', 'ProjectsController@projectsList');
Route::resources([
    'content-blocks' => 'ContentBlockController',
    'projects' => 'ProjectsController',
    ]);
