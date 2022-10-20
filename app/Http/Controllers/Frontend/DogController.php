<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Dog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DogController extends Controller
{
    public function add()
    {
        return view('frontend.dogs');
    }

    public function insert(Request $request)
    {
        $dogs = Dog::where('user_id', Auth::id())->get();

        if($dogs->count() < 5){
            $dog = new Dog();
            $dog->user_id = Auth::id();
            $dog->name = $request->input('name');
            $dog->breed = $request->input('breed');
            $dog->save();

            return redirect('/profile')->with('status', "Dog added to the list of your dogs");
        }
        else{
            return redirect('/')->with('status', "You can have up to 5 dogs registerd per account.");
        }
    }

    public function update(Request $request, $dog_name)
    {
        $dog = Dog::where('name', $dog_name)->where('user_id', Auth::id())->first();
        if($dog){
            $dog->name = $request->name;
            $dog->breed = $request->breed;
            $dog->update();

            return redirect('/profile')->with('status', "Details About ".$request->name." edited successfully.");
        }
        else{
            return redirect('/profile')->with('status', "Link Broken");
        }
    }
}
