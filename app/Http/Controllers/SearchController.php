<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Trade;
use App\User;
use Illuminate\Support\Facades\Auth;

use Log;


class SearchController extends Controller
{
    public function index()

	{
		  $trades = \App\Trade::with('User', 'Comment')->where([
         	['book_title','like', '%' . request('query'). '%'],
         	['user_id','<>', Auth::user()->id],
         ])->get();
		 		 
		Log::info(print_r($trades, true));
				 
         return view('traderesults')->with('trades', $trades)
         					  ->with('book_title', 'Search Results: '. request('query'))
         					  ->with('settings')
         					  ->with('query', request('query'));
	}	

}
