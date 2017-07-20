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
Route::get('/cat', 'CategoriesController@listall');
Route::post('/cat/add', 'CategoriesController@add');
Route::get('/cat/{id}', 'CategoriesController@list')->where('id', '[0-9]+');
Route::get('/cat/{id}/edit', 'CategoriesController@edit')->where('id', '[0-9]+');
Route::post('/cat/{id}/edit', 'CategoriesController@sendedit')->where('id', '[0-9]+');
Route::get('/cat/{id}/delete', 'CategoriesController@delete')->where('id', '[0-9]+');

Route::get('/account', 'DashController@account');
Route::post('/account', 'DashController@editAccount');