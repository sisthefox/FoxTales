<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Trade;
use App\User;
use DB;
use App\Quotation;
use Illuminate\Support\Facades\Auth;
use Session;

use Log;

class TradeController extends Controller
{
     public function index()
    {
        $trades = Trade::latest()->where('user_id', Auth::user()->id)->paginate(10);
        return view('trades.index',compact('trades'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trades.create');
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
            'book_image' => 'required|image|mimes:png,jpg'
        ]);

        $file = $request->file('book_image');
        $file->move('public/images/', $file->getClientOriginalName());
        $fileImage = 'public/images/'.$file->getClientOriginalName();

        $store = $request->all();
        $store['user_id'] = Auth::user()->id;
        $store['book_image'] = $fileImage;

        Trade::create($store);
        Session::flash('success','Book created successfully');
        return redirect()->route('trades.index');
                        //->with('success','Book created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Trade $trade)
    {
        return view('trades.show',compact('trade'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Trade $trade)
    {
        return view('trades.edit',compact('trade'));
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
        Session::flash('success','Book updated successfully');
        return redirect()->route('trades.index');
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

        DB::table('comments')->where('trade_id','=',$id)->delete();

        Trade::destroy($id);
        Session::flash('success', 'Book deleted successfully');
        return redirect()->route('trades.index');
                        //->with('success','Trade deleted successfully');
    }
}
