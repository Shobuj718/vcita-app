<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/package', 'API\PackageController@index');
Route::get('/package/{id}', 'API\PackageController@show');
Route::post('/package', 'API\PackageController@store');
Route::put('/package/{id}', 'API\PackageController@update');
Route::delete('/package/{id}', 'API\PackageController@delete');

