<?php

use Illuminate\Support\Facades\Route;

//Header Button
Route::get('/', 'CryptoController@index');
Route::get('/cards', 'CryptoController@viewCards')->name('cryptocard');
Route::get('/loans', 'CryptoController@viewLoans')->name('cryptoloan');
Route::get('/interests', 'CryptoController@viewInterestAccounts')->name('cryptointerest.accounts');
Route::get('/wallets', 'CryptoController@viewWallets')->name('cryptowallet');
Route::get('/treasuries', 'TreasuryController@viewTreasuries')->name('company.treasuries');


Auth::routes();

//Front-end
Route::get('/exchanges/{exchange}', 'CryptoController@cryptoExchangeDetails')->name('cryptoexchange.show');
Route::get('/cards/{card}', 'CryptoController@cryptoCardDetails')->name('cryptocard.show');
Route::get('/loans/{loan}', 'CryptoController@cryptoLoanDetails')->name('cryptoloan.show');
Route::get('/interests/{interest}', 'CryptoController@cryptoInterestDetails')->name('cryptointerest.show');
Route::get('/wallets/{wallet}', 'CryptoController@cryptoWalletDetails')->name('cryptowallet.show');

Route::get('donate', 'CryptoController@donate')->name('donate');

Route::get('/exchange/{slug}', 'CryptoController@PostOfExchange')->name('exchange.post');
Route::get('/card/{slug}', 'CryptoController@PostOfCard')->name('card.post');
Route::get('/loan/{slug}', 'CryptoController@PostOfLoan')->name('loan.post');
Route::get('/interest/{slug}', 'CryptoController@PostOfInterest')->name('interest.post');
Route::get('/wallet/{slug}', 'CryptoController@PostOfWallet')->name('wallet.post');



//Backend
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

Route::get('admin/autocomplete', 'AutocompleteController@index')->name('autocomplete.index');
Route::get('admin/category/more', 'CategoryMoreController@index')->name('category.more');

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

Route::resource('admin/deposits', 'DepositController')->except('show');
Route::get('deposit/delete/{deposit}' , 'DepositController@destroy')->name('deposits.delete');

Route::resource('admin/crypto_types', 'CryptoTypeController')->except('show');
Route::get('cryptoTypes/delete/{crypto_type}' , 'CryptoTypeController@destroy')->name('crypto_types.delete');

Route::resource('admin/categories', 'CategoryController')->except('show');
// Route::get('categories/delete/{category}', 'CategoryController@destroy')->name('categories.delete');

Route::resource('admin/posts', 'PostController');
Route::get('posts/delete/{post}', 'PostController@destroy')->name('posts.delete');

Route::resource('admin/treasuries', 'TreasuryController')->middleware('auth');
Route::get('treasury/delete/{treasury}' , 'TreasuryController@destroy')->name('treasuries.delete')->middleware('auth');

Route::resource('admin/cryptos', 'MoreCryptoController')->middleware('auth');
Route::get('crypto/delete/{crypto}' , 'MoreCryptoController@destroy')->name('cryptos.delete')->middleware('auth');


//ajax search
Route::post('getexchanges', 'CryptoController@AjaxRequestForExchange');
Route::post('exchange/lists', 'CryptoController@searchExchange')->name('exchanges.search');

Route::post('getcards', 'CryptoController@AjaxRequestForCard');
Route::post('card/lists', 'CryptoController@searchCard')->name('cards.search');

Route::post('getloans', 'CryptoController@AjaxRequestForLoan');
Route::post('loan/lists', 'CryptoController@searchLoan')->name('loans.search');

Route::post('getinterests', 'CryptoController@AjaxRequestForInterest');
Route::post('interest-account/lists', 'CryptoController@searchInterest')->name('interest.search');

Route::post('getwallets', 'CryptoController@AjaxRequestForWallet');
Route::post('wallet/lists', 'CryptoController@searchWallet')->name('wallet.search');

Route::post('gettreasuries', 'TreasuryController@AjaxRequestForTreasury');