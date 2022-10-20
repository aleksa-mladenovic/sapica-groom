<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::where('id', Auth::id())->first();
        $role = 0;
        if($user){
            $role = $user->role_as;
        }
        return view('admin.index', compact('role'));
    }
}
