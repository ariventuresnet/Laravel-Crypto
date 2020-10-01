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
Route::get('/loans', 'HomeController@viewLoans')->name('cryptoloan');

Auth::routes();

Route::get('/exchanges/{exchange}', 'HomeController@cryptoExchange')->name('cryptoexchange.show');
Route::get('/cards/{card}', 'HomeController@cryptoCard')->name('cryptocard.show');
Route::get('/loans/{loan}', 'HomeController@cryptoLoan')->name('cryptoloan.show');


Route::view('/home', 'dashboard')->name('dashboard')->middleware('auth');
Route::resource('admin/exchanges', 'ExchangeController');
Route::resource('admin/cards', 'CardController');
Route::resource('admin/loans', 'LoanController');
Route::resource('admin/interests', 'InterestController');
Route::get('exchanges/delete/{exchange}' , 'ExchangeController@delete')->name('exchanges.delete');
Route::get('cards/delete/{card}' , 'CardController@delete')->name('cards.delete');
Route::get('loans/delete/{loan}' , 'LoanController@delete')->name('loans.delete');
