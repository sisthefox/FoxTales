<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\SaleComment;
use App\User;
use App\Review;
use Illuminate\Support\Facades\Auth;
use Session;

use Log;

class SaleCommentsController extends Controller
{
     public function index(Request $request)
    {
		 $sales = \App\Sale::with('User', 'Comment')->where([
         	['book_title','like', '%' . request('query'). '%'],
         	['user_id','<>', Auth::user()->id],
         ])->get();



         return view('salesresults')->with('sales', $sales)
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
        return view('salescomments.create')->with($request->all());
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

        SaleComment::create($store);
        Session::flash('success','Comment has been sent');
        return redirect()->route('salescomments.index');
                        //->with('success','Commente created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        return view('salescomments.show',compact('sale'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        return view('salecomments.edit',compact('sale'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
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

        $sale->update($store);
        Session::flash('success','Comment has been updated');
        return redirect()->route('sales.index');
                        //->with('success','Sale updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sale::destroy($id);
        Session::flash('success','Comment has been deleted');
        return redirect()->route('sales.index');
                        //->with('success','Sale deleted successfully');
    }
}
