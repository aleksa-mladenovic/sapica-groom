<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Dog;
use App\Models\User;
use App\Models\Rating;
use App\Models\Review;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index()
    {
        $featured_products = Product::where('trending', '1')->take(15)->get();
        $user = User::where('id', Auth::id())->first();
        $role = 0;
        if($user){
            $role = $user->role_as;
        }
        return view('frontend.index', compact('featured_products', 'role'));
    }

    // Categories
    public function category()
    {
        $category = Category::where('status', '0')->get();
        return view('frontend.category', compact('category'));
    }

    public function view_category($slug)
    {
        if(Category::where('slug', $slug)->exists()){
            $category = Category::where('slug', $slug)->first();
            $products = Product::where('category_id', $category->id)->where('status', '0')->get();
            return view('frontend.products.index', compact('category', 'products'));
        }
        else{
            return redirect('/')->with('status', "There is no products in chosen category");
        }
    }

    // Products - Search bar
    public function view_product($cate_slug, $prod_slug)
    {
        if(Category::where('slug', $cate_slug)->exists()){
            if (Product::where('slug', $prod_slug)->exists()) {
                $product = Product::where('slug', $prod_slug)->where('status', '0')->first();
                $ratings = Rating::where('prod_id', $product->id)->get();
                $ratings_sum = Rating::where('prod_id', $product->id)->sum('stars_rated');
                $user_rating = Rating::where('prod_id', $product->id)->where('user_id', Auth::id())->first();
                $reviews = Review::where('prod_id', $product->id)->get();

                if ($ratings->count() > 0) {
                    $rating_val = $ratings_sum/$ratings->count();
                }
                else{
                    $rating_val = 0;
                }
                return view('frontend.products.view', compact('product', 'ratings', 'rating_val', 'user_rating', 'reviews'));
            }
            else{
                return redirect('/')->with('status', "There is such products");
            }
        }
        else{
            return redirect('/')->with('status', "There is no products in chosen category");
        }
    }

    public function productlistSearchBar()
    {
        $products = Product::select('name')->where('status', 0)->get();
        $data = [];

        foreach ($products as $item) {
            $data[] = $item['name'];
        }

        return $data;
    }

    public function search(Request $request)
    {
        $serach_data = $request->search_data;

        if($serach_data != ""){
            $product = Product::where("name", "LIKE", "%$serach_data%")->first();
            if($product){
                return redirect('view-category/'.$product->category->slug.'/'.$product->slug);
            }
            else{
                return redirect('/')->with("status", "No products matched your search");
            }
        }
        else{
            return redirect()->back();
        }
    }

    // Profile
    public function profile()
    {
        $dogs = Dog::where('user_id', Auth::id())->get();
        return view('frontend.profile', compact('dogs'));
    }
    public function updateUser(Request $request)
    {
        $user = User::find(Auth::id());

        $user->name = $request->input('fname');
        $user->lname = $request->input('lname');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->address1 = $request->input('address1');
        $user->address2 = $request->input('address2');
        $user->city = $request->input('city');
        $user->state = $request->input('state');
        $user->country = $request->input('country');
        $user->pincode = $request->input('pincode');
        $user->update();

        return redirect('/profile')->with('status', "User Details Edited Successfully");
    }
}