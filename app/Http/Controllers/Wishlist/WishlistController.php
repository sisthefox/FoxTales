<?php

namespace App\Http\Controllers\Wishlist;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WishlistController extends Controller
{
    public function index()
    {
		//$wishlist = self::orderBy('created_at', 'desc')->paginate(10);
        return view('wishlist/list');
    }

    public function newbook()
    {
    	return view('wishlist/newbook');
    }

	public function store($request)
    {
        $wishlist = new Book;
        $wishlist->name        = $request->name;
        $wishlist->description = $request->description;
        $wishlist->autor  	   = $request->autor;

        $wishlist->save();
        return redirect()->route('wishlist.index')->with('message', 'wishlist created successfully!');
    }

	public function show($id)
    {
        //
    }

   /* public function edit($id)
    {
        $product = Wishlist::findOrFail($id);
        return view('products.edit',compact('product'));
    }*/

    /*public function update(ProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->name        = $request->name;
        $product->description = $request->description;
        $product->quantity    = $request->quantity;
        $product->price       = $request->price;
        $product->save();
        return redirect()->route('products.index')->with('message', 'Product updated successfully!');
    }*/

   /* public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('alert-success','Product hasbeen deleted!');
    }*/
}


   