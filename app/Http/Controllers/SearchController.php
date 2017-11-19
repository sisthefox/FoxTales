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
          $trades = Trades::latest()->where('user_id', Auth::user()->id)->paginate(10);
        return view('trades.index',compact('trades'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
}
}
