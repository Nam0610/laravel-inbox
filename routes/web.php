<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/index','InboxController@index')->name('index');
Route::get('/show/{id}','InboxController@show')->name('show');
Route::get('/create','InboxController@create')->name('create');
Route::post('/create_process','InboxController@createProcess')->name('create_process');
Route::get('/update/{id}','InboxController@update')->name('update');
Route::post('/update_process/{id}','InboxController@updateProcess')->name('update_process');
Route::get('/destroy/{id}','InboxController@destroy')->name('destroy');


