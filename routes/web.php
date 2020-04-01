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

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/page/{id}', 'PageController@showPage');
Route::get('/project/{id}', 'ProjectsController@showProject');
Route::get('/alle-projecten', 'ProjectsController@allProjects')->name('allProjects');
Route::get('content-blocks-list', 'ContentBlockController@contentBlocksList');
Route::get('pages-list', 'PageController@pagesList');
Route::get('projects-list', 'ProjectsController@projectsList');
Route::get('settings-list', 'SettingController@settingsList');
Route::resources([
    'content-blocks' => 'ContentBlockController',
    'pages' => 'PageController',
    'projects' => 'ProjectsController',
    'settings' => 'SettingController',
    ]);
