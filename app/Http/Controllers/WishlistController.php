<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function addToWishlist($id)
    {
        Auth::user()->wishlist()->attach($id);
        return back();
    }

    public function removeFromWishlist($id)
    {
        Auth::user()->wishlist()->detach($id);
        return back();
    }
}
