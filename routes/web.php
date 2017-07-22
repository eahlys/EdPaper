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
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/', 'DashController@index');

Route::get('/doc/add', 'DocumentsController@add');
Route::post('/doc/add', 'DocumentsController@upload');
Route::get('/doc/{id}', 'DocumentsController@show')->where('id', '[0-9]+');
Route::post('/doc/{id}', 'DocumentsController@edit')->where('id', '[0-9]+');
Route::get('/doc/{id}/view', 'DocumentsController@viewfile')->where('id', '[0-9]+');
Route::get('/doc/{id}/download', 'DocumentsController@download')->where('id', '[0-9]+');
Route::get('/doc/{id}/delete', 'DocumentsController@delete')->where('id', '[0-9]+');

Route::get('/share/{link}', 'ShareController@show')->where('link', '[a-zA-Z0-9]+');
Route::get('/share/{link}/view', 'ShareController@view')->where('link', '[a-zA-Z0-9]+');
Route::get('/share/{link}/download', 'ShareController@download')->where('link', '[a-zA-Z0-9]+');

Route::get('/doc/{id}/share', 'ShareController@share')->where('id', '[0-9]+');
Route::get('/doc/{id}/share/disable', 'ShareController@disable')->where('id', '[0-9]+');

Route::get('/cat', 'CategoriesController@listall');
Route::post('/cat/add', 'CategoriesController@add');
Route::get('/cat/shared', 'CategoriesController@listshare');
Route::get('/cat/{id}', 'CategoriesController@list')->where('id', '[0-9]+');
Route::get('/cat/{id}/edit', 'CategoriesController@edit')->where('id', '[0-9]+');
Route::post('/cat/{id}/edit', 'CategoriesController@sendedit')->where('id', '[0-9]+');
Route::get('/cat/{id}/delete', 'CategoriesController@delete')->where('id', '[0-9]+');

Route::get('/search', 'SearchController@search');

Route::get('/account', 'DashController@account');
Route::post('/account', 'DashController@editAccount');