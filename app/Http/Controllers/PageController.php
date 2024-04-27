<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class PageController extends Controller
{
    public function home()
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('pages.home', ['products' => $products]);
    }

    public function cart()
    {
        return view('pages.cart');
    }

    public function wishlist()
    {
        return view('pages.wishlist');
    }

    public function account()
    {
        return view('pages.account');
    }

    public function product($id)
    {
        $product = Product::findOrFail($id);
        return view('pages.product', ['product' => $product]);
    }

    public function checkout()
    {
        return view('pages.checkout');
    }
}
