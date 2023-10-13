<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        return view('Customer/cart');
    }

    public function create()
    {
        return view('Cart/show');
    }

    public function store(Request $request)
    {
        Product::create([
            'photo' => $request->photo,
            'product_name' => $request->product_name,
            'price' => $request->price,
            'user_id' =>  $request->user_id,
        ]);

        return redirect()->route('cart.index')->with('Item Added');
    }

    public function showRestore()
    {
        return view('Cart/restore');
    }

    public function destroy($id)
    {
        Product::find($id)->delete();

        return redirect()->route('cart.index')->with('success','Product Remove');
    }

    public function destroyPermanent($id)
    {
        Product::find($id)->forceDelete();

        return redirect()->route('cart.index')->with('success','Product Deleted');
    }

    public function restore($id)
    {
        Product::onlyTrashed()->where('uuid', $id)->restore();

        return redirect()->route('cart.index')->with('success','Product Restored');
    }

    public function search(Request $request)
    {
        $search = $request['search']  ?? "";
        if($search != "")
        {
            $cart = Product::where('product_name', 'like','%'.$search.'%')->get();
        }
        else
        {
            $cart = Product::all();
        }
        
        return view('Customer/search', compact('cart'));
    }
}
