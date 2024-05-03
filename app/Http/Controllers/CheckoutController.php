<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Stripe\Exception\ApiErrorException;
use Stripe\PaymentIntent;
use Stripe\Stripe;

class CheckoutController extends Controller
{
    public function stripeCheckout(Request $request)
    {

        // Request Validation
        $request->validate([
            'payment_method_id' => 'required',
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|max:255',
        ]);

        // We establish our Secret key
        Stripe::setApiKey(config('stripe.sk'));

        // We proceed to create a Payment Intent
        $intent = null;
        try {
            if ($request->payment_method_id) {

                // Here we have to fill in the customer data with $request
                $intent = PaymentIntent::create([
                    'payment_method' => $request->payment_method_id,
                    'amount' => Cart::totalAmount() * 100,
                    'currency' => 'usd',
                    'confirmation_method' => 'manual',
                    'confirm' => true,
                    'return_url' => route('success'),
                ]);
            }
        } catch (ApiErrorException $e) {
            # Display error on client
            echo json_encode([
                'error' => $e->getMessage()
            ]);
        }

        // Store the order
        $order = Order::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'country' => $request->country,
            'state' => $request->state,
            'city' => $request->city,
            'zip' => $request->zipCode,
            'stripe_id' => $request->payment_method_id,
            'status' => 'pending',
            'total' => Cart::totalAmount() * 100,
        ]);

        // Store the item realed to the order
        foreach (session()->get('cart') as $item) {
            $order->items()->create([
                'product_id' => $item['product']['id'],
                'quantity' => $item['quantity'],
            ]);
        }

        // Empty the cart
        session()->forget('cart');

        // If there is no error we will be redirected to the success path
        return view('pages.orderSuccess', ['order' => $order]);
    }
}
