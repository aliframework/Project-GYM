<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.dashboard', compact('users'));
    }

    public function dashboard()
{
    return view('user.dashboard');
}

}