<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\App;
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

Route::get('/users','UserController@index')->name('index');
Route::get('/users/search','UserController@search')->name('searchUsers');

Route::get('/users/create','UserController@create')->name('createUsers');
Route::post('/users/create','UserController@postCreate');

Route::get('/users/{id}','UserController@view');
Route::delete('/users/{id}','UserController@delete');

