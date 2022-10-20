<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Whishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WhishlistController extends Controller
{
    public function index()
    {
        $wishlist = Whishlist::where('user_id', Auth::id())->get();
        return view('frontend.whishlist', compact('wishlist'));
    }

    public function addProduct(Request $request)
    {
        $product_id = $request->input('product_id');

        if(Auth::check()){
            $prod_check = Product::where('id', $product_id)->first();
            if($prod_check){
                if(Whishlist::where('prod_id', $product_id)->where('user_id', Auth::id())->exists()){
                    return response()->json(['status' => $prod_check->name." Already added to Whishlist"]); 
                }
                else{
                    $whishlistItem = new Whishlist();
                    $whishlistItem->user_id = Auth::id();
                    $whishlistItem->prod_id = $product_id;
                    $whishlistItem->save();
                    return response()->json(['status' => $prod_check->name." Added to Whishlist"]); 
                }
            }
        }
        else{
            return response()->json(['status' => "Login to add to Whishlist"]);
        }
    }

    public function delete(Request $request)
    {
        $prod_id = $request->input('prod_id');
        if(Whishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()){
            $whishlistItem = Whishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
            $whishlistItem->delete();
            return response()->json(['status' => "Product removed from wishlist successfully"]);
        }
    }

    public function wishlistcount()
    {
        $wishlistCount = Whishlist::where('user_id', Auth::id())->count();
        return response()->json(['count'=>$wishlistCount]);
    }
}
