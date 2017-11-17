<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Wishlist;
use App\User;
use Illuminate\Support\Facades\Auth;

use Log;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlists = Wishlist::latest()->where('user_id', Auth::user()->id)->paginate(10);
        return view('wishlists.index',compact('wishlists'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('wishlists.create');
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
            'classification' => 'required',
            'book_image' => 'required|image|mimes:png,jpg,JPG'            
        ]);

        $file = $request->file('book_image');
        $file->move('public/images/', $file->getClientOriginalName());
        $fileImage = 'public/images/'.$file->getClientOriginalName();

        $store = $request->all();
        $store['user_id'] = Auth::user()->id;
        $store['book_image'] = $fileImage;

        wishlist::create($store);
        return redirect()->route('wishlists.index')
                        ->with('success','Book created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Wishlist $wishlist)
    {
        return view('wishlists.show',compact('wishlist'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Wishlist $wishlist)
    {
        return view('wishlists.edit',compact('wishlist'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wishlist $wishlist)
    {
        request()->validate([
            'book_title' => 'required',
            'author' => 'required',
            'description' => 'required',
            'publishing_company' => 'required',
            'classification' => 'required'
        ]);

        $file = $request->file('book_image');
        
        $file->move('public/images/', $file->getClientOriginalName());
        $fileImage = 'public/images/'.$file->getClientOriginalName();
       
        $store = $request->all();
        $store['user_id'] = Auth::user()->id;
        $store['book_image'] = $fileImage;

        $wishlist->update($store);
        return redirect()->route('wishlists.index')
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
        Wishlist::destroy($id);
        return redirect()->route('wishlists.index')
                        ->with('success','Wishlist deleted successfully');
    }
}
