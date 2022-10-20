<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function view($id)
    {
        $user = User::where('id', $id)->first();
        return view('admin.users.view', compact('user'));
    }
}
