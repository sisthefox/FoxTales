<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Sale;
use App\User;
use Illuminate\Support\Facades\Auth;

use Log;


class SearchSaleController extends Controller
{
    public function index()

	{
		  $sales = \App\Sale::with('User','Comment')->where([
         	['book_title','like', '%' . request('query'). '%'],
         	['user_id','<>', Auth::user()->id],
         ])->get();
		 		 
		
				 
         return view('salesresults')->with('sales', $sales)
         					  ->with('book_title', 'Search Results: '. request('query'))
         					  ->with('settings')
         					  ->with('query', request('query'));
	}	


}
