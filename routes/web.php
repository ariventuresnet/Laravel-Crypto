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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/exchange/{exchange}', 'HomeController@cryptocurrency')->name('cryptocurrency.show');
Route::view('/home', 'dashboard')->name('dashboard')->middleware('auth');
Route::resource('exchanges', 'ExchangeController');
Route::resource('cards', 'CardController');
Route::get('delete/exchanges/{exchange}' , 'ExchangeController@delete')->name('exchanges.delete');
