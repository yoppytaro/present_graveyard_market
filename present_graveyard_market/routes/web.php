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


// アイテム
Route::resource('item', 'ItemController')->middleware('auth');


// 購入
Route::get('item/{item}/confirmation', 'OrderController@show')->name('order.confirmation')->middleware('auth');
Route::post('item/{item}', 'OrderController@store')->name('order.store')->middleware('auth');
Route::get('item/{item}/thank', 'OrderController@thank')->name('order.thank')->middleware('auth');

Route::get('orders', 'UserController@orders')->name('orders')->middleware('auth');

//認証
Auth::routes();

// お気に入り
Route::get('likes', 'LikeController@index')->name('likes')->middleware('auth');
Route::post('likes', 'LikeController@isLike')->name('likes')->middleware('auth');