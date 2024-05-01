@extends('layouts.master')

@section('title', 'Checkout')

@section('head')
    <script src="https://js.stripe.com/v3/"></script>

    <style>
        .StripeElement {
            height: 40px;
            padding: 10px 12px;
            width: 100%;
            color: #32325d;
            background-color: white;
            border: var(--bs-border-width) solid var(--bs-border-color);
            border-radius: 5px;
            /*box-shadow: 0 1px 3px #e6ebf1;*/
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        }

        .StripeElement--focus {
            color: var(--bs-body-color);
            background-color: var(--bs-body-bg);
            border-color: #86b7fe;
            outline: 0;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }
    </style>
@endsection

@section('content')
    <header class="page-header">
        <h1 class="text-center">Checkout</h1>
    </header>

    <main class="checkout-page">
        <div class="container">

            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="checkout-form mt-5">
                        <form action="{{route('stripeCheckout')}}" id="payment-form" method="post" class="p-3"
                              style="border-radius: 4px; box-shadow: 0 0 5px rgba(0,0,0,0.3)">
                            @csrf

                            <div class="field mb-3">
                                <label class="form-label" for="name">Name</label>
                                <input type="text" id="name" name="name"
                                       class="form-control @error('name') has-error @enderror"
                                       placeholder="John Doe"
                                       value="{{old('name') ? old('name') : auth()->user()->name}}">
                                @error('name')
                                <span class="field-error">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="field mb-3">
                                <label class="form-label" for="email">Email</label>
                                <input type="text" id="email" name="email"
                                       class="form-control @error('email') has-error @enderror"
                                       placeholder="email@example.com"
                                       value="{{old('email') ? old('email') : auth()->user()->email}}">
                                @error('email')
                                <span class="field-error">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="field mb-3">
                                <label class="form-label" for="phone">Phone</label>
                                <input type="text" id="phone" name="phone"
                                       class="form-control @error('phone') has-error @enderror"
                                       placeholder="678901234"
                                       value="{{old('phone') ? old('phone') : auth()->user()->phone}}">
                                @error('phone')
                                <span class="field-error">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="field mb-3">
                                <label class="form-label" for="country">Country</label>
                                <select class="form-select" name="country" id="country">
                                    <option value="">-- Select Country --</option>
                                    <option value="Spain">Spain</option>
                                </select>
                                @error('country')
                                <span class="field-error">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="field mb-3">
                                <label class="form-label" for="state">State</label>
                                <input type="text" id="state" name="state"
                                       class="form-control @error('state') has-error @enderror"
                                       placeholder="Alicante" value="{{old('state')}}">
                                @error('state')
                                <span class="field-error">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="field mb-3">
                                <label class="form-label" for="city">City</label>
                                <input type="text" id="city" name="city"
                                       class="form-control @error('city') has-error @enderror"
                                       placeholder="Elche" value="{{old('city')}}">
                                @error('city')
                                <span class="field-error">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="field mb-3">
                                <label class="form-label" for="zipCode">ZipCode</label>
                                <input type="text" id="zipCode" name="zipCode"
                                       class="form-control @error('zipCode') has-error @enderror"
                                       placeholder="03203" value="{{old('zipCode')}}">
                                @error('zipCode')
                                <span class="field-error">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="field">
                                <label class="form-label" for="address">Address</label>
                                <input type="text" id="address" name="address"
                                       class="form-control @error('address') has-error @enderror"
                                       placeholder="C. Nicolás Copérnico, 7" value="{{old('address')}}">
                                @error('address')
                                <span class="field-error">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="field mb-3 mt-3">
                                <input type="hidden" name="payment_method_id" id="payment_method_id" value="">

                                <label class="form-label">Payment Method</label>
                                <div id="card-element"></div>
                            </div>

                            <div class="field">
                                <button id="submit_btn" class="btn btn-primary">Finish payment</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <script>
        // We generate a new Stripe object with our public key
        const stripe = Stripe('{{config('stripe.pk')}}');

        // I initialize the stripe elements on my website
        const elements = stripe.elements();

        // I create the card element and mount it in the div with id card-element
        const cardElement = elements.create('card');
        cardElement.mount('#card-element');

        // I store the form and submit in a variable
        const stripeForm = document.getElementById('payment-form');
        const submitBtn = document.getElementById('submit_btn');

        // I create an event to handle the form submit
        stripeForm.addEventListener('submit', function (event) {
            // We don't want to let default form submission happen here,
            // which would refresh the page.
            event.preventDefault();

            // Prevent multiple form submissions
            if (submitBtn.disabled) {
                return;
            }

            // Disable form submission while loading
            submitBtn.disabled = true;

            // create a PaymentMethod object with the details of
            // our client is an asynchronous function so
            // when it finishes loading the result will pass directly
            // to .then()
            stripe.createPaymentMethod({
                type: 'card',
                card: cardElement,
                billing_details: {
                    name: 'John Doe',
                },
            })
                .then(stripeMethodHandler);
        });


        // I created a function to handle the result when creating a
        // PaymentMethod
        function stripeMethodHandler(result) {
            if (result.error) {
                // show error
                console.log('ERROR');
            } else {
                // When submitting the form I want to pass the payment_method_id
                // generated with the user's data to later use it in the table
                // orders from my database
                document.getElementById('payment_method_id').value = result.paymentMethod.id;
                stripeForm.submit();
            }
        }
    </script>
@endsection
