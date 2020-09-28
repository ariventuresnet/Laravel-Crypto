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
Route::get('/cards', 'HomeController@viewCards')->name('cryptocard');

Auth::routes();

Route::get('/exchanges/{exchange}', 'HomeController@cryptoExchange')->name('cryptoexchange.show');
Route::get('/cards/{card}', 'HomeController@cryptoCard')->name('cryptocard.show');


Route::view('/home', 'dashboard')->name('dashboard')->middleware('auth');
Route::resource('admin/exchanges', 'ExchangeController');
Route::resource('admin/cards', 'CardController');
Route::get('exchanges/delete/{exchange}' , 'ExchangeController@delete')->name('exchanges.delete');
Route::get('cards/delete/{card}' , 'CardController@delete')->name('cards.delete');
