<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\ReviewComment;
use App\User;
use App\Review;
use Illuminate\Support\Facades\Auth;
use Session;

use Log;

class ReviewCommentsController extends Controller
{
     public function index(Request $request)
    {
		 $reviews = \App\Review::with('User', 'Comment')->where([
         	['book_title','like', '%' . request('query'). '%'],
         	['user_id','<>', Auth::user()->id],
         ])->get();



         return view('reviewresults')->with('reviews', $reviews)
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
        return view('reviewcomments.create')->with($request->all());
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

        ReviewComment::create($store);
        Session::flash('success','Commente created successfully');
        return redirect()->route('reviewcomments.index');
                        //->with('success','Commente created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Trade $trade)
    {
        return view('reviewcomments.show',compact('comment'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Trade $trade)
    {
        return view('reviewcomments.edit',compact('trade'));
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
        Session::flash('success','Commente updated successfully');
        return redirect()->route('comments.index');
                        //->with('success','Wishlist updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('review_comments')->where('review_id','=',$id)->delete();

        Review::destroy($id);
        Session::flash('success','Commente updated successfully');
        return redirect()->route('review.index');
                        //->with('success','Trade deleted successfully');
    }
}
