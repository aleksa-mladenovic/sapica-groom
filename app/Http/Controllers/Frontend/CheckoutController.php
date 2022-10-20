<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $old_cartItems = Cart::where('user_id', Auth::id())->get();
        foreach ($old_cartItems as $item) {
            if(!Product::where('id', $item->prod_id)->where('quantity', '>=', $item->prod_qty)->exists()){
                $removeItem = Cart::where('user_id', Auth::id())->where('prod_id', $item->prod_id)->first();
                $removeItem->delete();
            }
        }

        $cartItems = Cart::where('user_id', Auth::id())->get();
        return view('frontend.checkout', compact('cartItems'));
    }

    public function placeorder(Request $request)
    {
        $order = new Order();
        $order->user_id = Auth::id();
        $order->fname = $request->input('fname');
        $order->lname = $request->input('lname');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->address1 = $request->input('address1');
        $order->address2 = $request->input('address2');
        $order->city = $request->input('city');
        $order->state = $request->input('state');
        $order->country = $request->input('country');
        $order->pincode = $request->input('pincode');
        $order->tracking_number = 'order'.rand(1111,9999);

        $total = 0;
        $cartItems = Cart::where('user_id', Auth::id())->get();
        foreach ($cartItems as $item) {
            $total += $item->product->selling_price*$item->prod_qty;
        }
        $order->total_price = $total;
        $order->save();

        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'prod_id' => $item->prod_id,
                'qty' => $item->prod_qty,
                'price' => $item->product->selling_price,
            ]);

            $product = Product::where('id', $item->prod_id)->first();
            $product->quantity = $product->quantity -$item->prod_qty;
            $product->update();
        }

        if(Auth::user()->address1 == null){
            $user = User::where('id', Auth::id())->first();

            $user->lname = $request->input('lname');
            $user->phone = $request->input('phone');
            $user->address1 = $request->input('address1');
            $user->address2 = $request->input('address2');
            $user->city = $request->input('city');
            $user->state = $request->input('state');
            $user->country = $request->input('country');
            $user->pincode = $request->input('pincode');
            $user->update();
        }

        $cartItems = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cartItems);
        
        return redirect('/my-orders')->with('status', "Order placed successfully");
    }
}
