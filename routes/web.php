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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/package', 'PackageController@index');
Route::get('/package/create', 'PackageController@create');
Route::get('/package/edit/{id}', 'PackageController@edit');
Route::post('/package/update/{id}', 'PackageController@update')->name('package.update');







Route::get('/category', 'CategoryController@index');


