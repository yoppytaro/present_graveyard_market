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

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


// トップ
Route::get('/', 'ItemController@index')->name('top')->middleware('auth');

// ユーザー
Route::resource('user', 'UserController')->except('index', 'create', 'store')->middleware('auth');

//　認証
Auth::routes();