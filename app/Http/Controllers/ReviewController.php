<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Review;
use App\User;
use Illuminate\Support\Facades\Auth;

use Log;

class ReviewController extends Controller
{
     public function index()
    {
        $reviews = Review::latest()->where('user_id', Auth::user()->id)->paginate(10);
        return view('reviews.index',compact('reviews'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reviews.create');
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
            'book_title' => 'required',
            'author' => 'required',
            'description' => 'required',
            'publishing_company' => 'required',
            //'book_image' => 'required|image|mimes:png,jpg'            
        ]);

        $file = $request->file('book_image');
        $file->move('public/images/', $file->getClientOriginalName());
        $fileImage = 'public/images/'.$file->getClientOriginalName();

        $store = $request->all();
        $store['user_id'] = Auth::user()->id;
        $store['book_image'] = $fileImage;

        Review::create($store);
        return redirect()->route('reviews.index')
                        ->with('success','Book created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        return view('reviews.show',compact('review'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        return view('reviews.edit',compact('review'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
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

        $review->update($store);
        return redirect()->route('reviews.index')
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
        Review::destroy($id);
        return redirect()->route('reviews.index')
                        ->with('success','Trade deleted successfully');
    }
}
