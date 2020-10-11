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
Route::get('/wallets', 'HomeController@viewWallets')->name('cryptowallet');

Auth::routes();

Route::get('/exchanges/{exchange}', 'HomeController@cryptoExchangeDetails')->name('cryptoexchange.show');
Route::get('/cards/{card}', 'HomeController@cryptoCardDetails')->name('cryptocard.show');
Route::get('/loans/{loan}', 'HomeController@cryptoLoanDetails')->name('cryptoloan.show');
Route::get('/interests/{interest}', 'HomeController@cryptoInterestDetails')->name('cryptointerest.show');
Route::get('/wallets/{wallet}', 'HomeController@cryptoWalletDetails')->name('cryptowallet.show');


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

Route::get('donate', 'HomeController@donate')->name('donate');

Route::get('admin/autocomplete', 'AutocompleteController@index')->name('autocomplete.index');

Route::resource('admin/currencies', 'CurrencyController')->except('show');
Route::get('currency/delete/{currency}' , 'CurrencyController@destroy')->name('currencies.delete');

Route::resource('admin/countries', 'CountryController')->except('show');
Route::get('country/delete/{country}' , 'CountryController@destroy')->name('countries.delete');

Route::resource('admin/payments', 'PaymentController')->except('show');
Route::get('payment/delete/{payment}' , 'PaymentController@destroy')->name('payments.delete');

Route::resource('admin/cardmethods', 'CardMethodController')->except('show');
Route::get('cardmethod/delete/{cardmethod}' , 'CardMethodController@destroy')->name('cardmethods.delete');

Route::resource('admin/collaterals', 'CollateralController')->except('show');
Route::get('collateral/delete/{collateral}' , 'CollateralController@destroy')->name('collaterals.delete');

Route::resource('admin/wallet_types', 'WalletTypeController')->except('show');
Route::get('walletTypes/delete/{wallet_type}' , 'WalletTypeController@destroy')->name('wallet_types.delete');