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
Route::get('/interests', 'HomeController@viewInterestAccounts')->name('cryptointerest.accounts');

Auth::routes();

Route::get('/exchanges/{exchange}', 'HomeController@cryptoExchangeDetails')->name('cryptoexchange.show');
Route::get('/cards/{card}', 'HomeController@cryptoCardDetails')->name('cryptocard.show');
Route::get('/loans/{loan}', 'HomeController@cryptoLoanDetails')->name('cryptoloan.show');
Route::get('/interests/{interest}', 'HomeController@cryptoInterestDetails')->name('cryptointerest.show');


Route::view('/home', 'dashboard')->name('dashboard')->middleware('auth');
Route::resource('admin/exchanges', 'ExchangeController');
Route::resource('admin/cards', 'CardController');
Route::resource('admin/loans', 'LoanController');
Route::resource('admin/interests', 'InterestController');
Route::resource('admin/wallets', 'WalletController');

Route::get('exchanges/delete/{exchange}' , 'ExchangeController@delete')->name('exchanges.delete');
Route::get('cards/delete/{card}' , 'CardController@delete')->name('cards.delete');
Route::get('loans/delete/{loan}' , 'LoanController@delete')->name('loans.delete');
Route::get('interests/delete/{interest}' , 'InterestController@delete')->name('interests.delete');
Route::get('wallets/delete/{wallet}' , 'WalletController@delete')->name('wallets.delete');
