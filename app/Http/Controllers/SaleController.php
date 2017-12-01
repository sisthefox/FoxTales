<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Sale;
use App\User;
use DB;
use App\Quotation;
use Illuminate\Support\Facades\Auth;
use Session;

use Log;

class SaleController extends Controller
{
     public function index()
    {
        $sales = Sale::latest()->where('user_id', Auth::user()->id)->paginate(10);
        return view('sales.index',compact('sales'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sales.create');
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
            'sale_price' => 'required'
            //'book_image' => 'required|image|mimes:png,jpg'
        ]);

        $file = $request->file('book_image');
        $file->move('public/images/', $file->getClientOriginalName());
        $fileImage = 'public/images/'.$file->getClientOriginalName();

        $store = $request->all();
        $store['user_id'] = Auth::user()->id;
        $store['book_image'] = $fileImage;

        Sale::create($store);
        Session::flash('success','Book created successfully');
        return redirect()->route('sales.index');
                        //->with('success','Book was created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        return view('sales.show',compact('sale'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        return view('sales.edit',compact('sale'));
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
            'publishing_company' => 'required',
            'sale_price' => 'required',
            //'book_image' => 'required|image|mimes:png,jpg'
        ]);

        $file = $request->file('book_image');

        $file->move('public/images/', $file->getClientOriginalName());
        $fileImage = 'public/images/'.$file->getClientOriginalName();

        $store = $request->all();
        $store['user_id'] = Auth::user()->id;
        $store['book_image'] = $fileImage;

        $sale->update($store);
        Session::flash('success','Book was updated successfully');
        return redirect()->route('sales.index');
                        //->with('success','Book was updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('sale_comments')->where('sale_id','=',$id)->delete();

        Sale::destroy($id);
        Session::flash('success','Book was deleted successfully');
        return redirect()->route('sales.index');
                        //->with('success','Book was deleted successfully');
    }
}
