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

Route::get('/results', function(){
	
	//lista todos os livros dos usuários
	//$trades = \App\Trade::where('user_id','<>', Auth::user()->id)->get();
	//select * from trades where book_title like '%trade%' and user_id<>6
	//$trades = DB::table('trades')->where([
	

	$trades = \App\Trade::where([
		['book_title','like', '%' . request('query'). '%'],
		['user_id','<>', Auth::user()->id],
	])->get();	
		
	return view('results')->with('trades', $trades)
						  ->with('book_title', 'Search Results: '. request('query'))
						  ->with('settings')
						  ->with('query', request('quey'));
						
});



