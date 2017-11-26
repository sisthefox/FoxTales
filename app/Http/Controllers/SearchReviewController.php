<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Review;
use App\User;
use Illuminate\Support\Facades\Auth;

use Log;


class SearchReviewController extends Controller
{
    public function index()

	{
		  $reviews = \App\Review::with('User','Comment')->where([
         	['book_title','like', '%' . request('query'). '%'],
         	['user_id','<>', Auth::user()->id],
         ])->get();
		 		 
		
				 
         return view('reviewresults')->with('reviews', $reviews)
         					  ->with('book_title', 'Search Results: '. request('query'))
         					  ->with('settings')
         					  ->with('query', request('query'));
	}	


}
