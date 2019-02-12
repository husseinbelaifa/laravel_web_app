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

Route::get('/','controllerr@index');
Route::get('/contact','controllerr@contact');
// Route::get('/{salutation}/{name}','controllerr@print_salution_with_name')
// ->where('salutation','[a-zA-Z]+')
// ->where('name','[a-zA-Z]+');
Route::get('/articles','articlecontroller@index');

Route::get('/articles/insert','articlecontroller@store');
Route::get('/articles/update','articlecontroller@update');
Route::get('/articles/delete','articlecontroller@destroy');
Route::get('/articles/{id}','articlecontroller@show')->name('article.show');

