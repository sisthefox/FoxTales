<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Comment;
use App\User;
use App\Trade;
use Illuminate\Support\Facades\Auth;

use Log;

class CommentsController extends Controller
{
     public function index(Request $request)
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
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('comments.create')->with($request->all());
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'comment' => 'required',            
        ]);
        
        $store = $request->all();
		$store['user_id'] = Auth::user()->id;
     	 
        Comment::create($store);
        return redirect()->route('comments.index')
                        ->with('success','Book created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Trade $trade)
    {
        return view('comments.show',compact('comment'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Trade $trade)
    {
        return view('comments.edit',compact('trade'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trade $trade)
    {
        request()->validate([
            'book_title' => 'required',
            'author' => 'required',
            'description' => 'required',
            'publishing_company' => 'required'
        ]);

        $file = $request->file('book_image');
        
        $file->move('public/images/', $file->getClientOriginalName());
        $fileImage = 'public/images/'.$file->getClientOriginalName();
       
        $store = $request->all();
        $store['user_id'] = Auth::user()->id;
        $store['book_image'] = $fileImage;

        $trade->update($store);
        return redirect()->route('comments.index')
                        ->with('success','Wishlist updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Trade::destroy($id);
        return redirect()->route('comments.index')
                        ->with('success','Trade deleted successfully');
    }
}
