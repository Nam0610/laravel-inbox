<?php

use Illuminate\Support\Facades\Route;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::get('index', 'Api\InboxController@index')->name('index');
Route::post('create', 'Api\InboxController@store')->name('create');
Route::put('/update/{id}', 'Api\InboxController@update')->name('update');
Route::patch('/update/{id}', 'Api\InboxController@update')->name('update');
Route::delete('/destroy/{id}', 'Api\InboxController@destroy')->name('destroy');
Route::get('/show/{id}', 'Api\InboxController@show')->name('show');

