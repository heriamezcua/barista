<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


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
    public function registerUser(Request $request)
    {
        // Validation of form data
        $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:8|confirmed',
        ]);

        // Insert user in DB (registration)
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            // using Hash to encryp the password
            'password' => Hash::make($request->password),
        ]);

        // login
        Auth::login($user);

        return back()->with('success', 'You have been registered successfully.');
    }

    public function loginUser(Request $request)
    {
        // Validation of form data
        $details = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // login
        if (Auth::attempt($details)) {
            // if user login is successfull redirect to home page
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Invalid login credentials.',
        ]);
    }

    // logout
    public function logout()
    {
        Auth::logout();

        return back();
    }
}
