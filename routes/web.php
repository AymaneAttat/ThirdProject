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
    return view('welcome');
});
Route::resource('/profile','Admin\ProfileController');
Auth::routes();
Route::resource('/allnews','Admin\AllNewsController');
Route::resource('/list','Admin\ListController');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/testhome', 'HomeController@test')->name('testhome');
Route::resource('/admin/categories', 'Admin\CategoriesController');
Route::resource('/admin/News', 'Admin\NewsController');