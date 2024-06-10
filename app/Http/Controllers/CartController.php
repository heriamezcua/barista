<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        // select from DB
        $product = Product::findOrFail($id);

        // create the item to store in the current session
        $item = [
            'product' => $product,
            'quantity' => $request->quantity
        ];

        // Cart logic
        if (session()->has('cart')) {

            $cart = session()->get('cart');

            // if the product already exists increment the quantity
            $key = $this->checkItemInCart($item);

            if ($key != -1) {
                $cart[$key]['quantity'] += $request->quantity;
                session()->put('cart', $cart);

                // Add new item
            } else {
                session()->push('cart', $item);
            }

        } else {
            // create the cart
            session()->push('cart', $item);
        }

        return back()->with('addedToCart', 'Product added to cart successfully!');
    }

    public function checkItemInCart($item)
    {
        foreach (session()->get('cart') as $key => $val) {
            if ($val['product']['id'] == $item['product']['id']) {
                return $key;
            }
        }

        return -1;
    }

    public function removeFromCart($key)
    {
        if (session()->has('cart')) {
            $cart = session()->get('cart');
            array_splice($cart, $key, 1);
            session()->put('cart', $cart);
            return back();
        }

        return back();
    }
}
