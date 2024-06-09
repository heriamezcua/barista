<?php

namespace App\Models;

class Cart
{

    public function centsToPrice($cents)
    {
        return number_format($cents / 100, 2);
    }

    public static function unitPrice($item)
    {
        // return price * quantity
        return (new self)->centsToPrice($item['product']['price'] * $item['quantity']);
    }

    public static function totalAmount()
    {
        $total = 0;
        $cart = session('cart');

        if (is_array($cart) || is_object($cart)) {
            foreach ($cart as $item) {
                $total += self::unitPrice($item);
            }
        }
        return $total;
    }

    public static function totalItems()
    {
        $quantity = 0;
        $cart = session('cart');

        if (is_array($cart) || is_object($cart)) {
            foreach ($cart as $item) {
                $quantity += $item['quantity'];
            }
        }
        return $quantity;
    }

}
