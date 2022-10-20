<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function add(Request $request)
    {
        $stars_rated = $request->input('product_rating');
        $prod_id = $request->input('prod_id');

        $prod_check = Product::where('id', $prod_id)->where('status', '0')->first();
        if($prod_check) {
            $verified_purchase = Order::where('orders.user_id', Auth::id())
                                ->join('orders_items', 'orders.id', 'orders_items.order_id')
                                ->where('orders_items.prod_id', $prod_id)->get();
            if($verified_purchase->count() > 0) {
                $rating = Rating::where('user_id', Auth::id())->where('prod_id', $prod_id)->first();
                if($rating){
                    $rating->stars_rated = $stars_rated;
                    $rating->update();
                }
                else{
                    Rating::create([
                        'user_id' => Auth::id(),
                        'prod_id' => $prod_id,
                        'stars_rated' => $stars_rated,
                    ]);
                }
                return redirect()->back()->with('status', "Thank you for rating this product.");
            }
            else{
                return redirect()->back()->with('status', "You can not rate product without purchasing it first.");
            }
        }
        else{
            return redirect()->back()->with('status', "Link broken");
        }
    }
}
