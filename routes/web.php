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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('members','MemberController');

Route::resource('wishlists','WishlistController');

Route::resource('trades','TradeController');

//Route::get('auth.myaccount', 'MyAccountController@index')->name('myaccount');

Route::resource('myaccount','MyAccountController');

Route::resource('traderesults','SearchController');

Route::resource('comments','CommentsController');

