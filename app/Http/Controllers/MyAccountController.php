<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Trade;
use App\Wishlist;
use App\Comment;
use App\Sale;
use DB;

class MyAccountController extends Controller
{
    public function index()
    {
		//$wishlist = self::orderBy('created_at', 'desc')->paginate(10);
        return view('auth/myaccount');
    }
    public function destroy($user)
    {


    	User::destroy($user);
        return redirect()->route('home')
                        ->with('success','Wishlist deleted successfully');
    }
}

