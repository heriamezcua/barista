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
        // return price * quantity and check if has discount
        if ($item['product']['discount']) {
            return (new self)->centsToPrice($item['product']['price'] * $item['quantity'] - ($item['product']['price'] * $item['quantity'] * $item['product']['discount'] / 100));
        }
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
