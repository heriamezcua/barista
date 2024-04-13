<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Show register
    public function showRegister()
    {
        return view('pages.register');
    }

    // Show login
    public function showLogin()
    {
        return view('pages.login');
    }

    // Register user
    public function registerUser(Request $request){

    }
}
