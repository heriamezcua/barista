<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Stripe\Exception\ApiErrorException;
use Stripe\PaymentIntent;
use Stripe\Stripe;

class CheckoutController extends Controller
{
    public function stripeCheckout(Request $request)
    {

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

            // If the intention to pay is established
            if ($request->payment_intent_id) {
                // We get the data
                $intent = PaymentIntent::retrieve(
                    $request->payment_intent_id
                );
                // We confirm the payment which will now appear in our stripe account
                $intent->confirm();
            }

        } catch (ApiErrorException $e) {
            # Display error on client
            echo json_encode([
                'error' => $e->getMessage()
            ]);
        }

        // If there is no error we will be redirected to the success path
        return redirect()->route('success');

    }
}
