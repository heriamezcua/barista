@extends('layouts.master')

@section('title', 'Checkout')

@section('head')
    <script src="https://js.stripe.com/v3/"></script>

    <style>
        .StripeElement {
            height: 40px;
            padding: 10px 12px;
            width: 100%;
            color: #fff;
            background-color: white;
            border: var(--bs-border-width) solid var(--bs-border-color);
            border-radius: 5px;
            /*box-shadow: 0 1px 3px #e6ebf1;*/
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        }

        .StripeElement--focus {
            color: var(--bs-body-color);
            background-color: #ffffff;
            border-color: var(--color-primary);
            outline: 0;
            box-shadow: 0 0 0 0.25rem rgba(216, 161, 104, .6);
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

    <section class="section-checkout">

        <div class="checkout">

            <div class="u-text-center u-margin-bottom-medium">
                <h2 class="heading-primary">Checkout</h2>
            </div>

            <div class="checkout__form-box">

                <form class="form" action="{{route('stripeCheckout')}}" id="payment-form" method="post">
                    @csrf

                    <div class="form__group u-margin-bottom-small">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name"
                               class="form-control @error('name') has-error @enderror"
                               placeholder="John Doe"
                               value="{{old('name') ? old('name') : auth()->user()->name}}">
                        @error('name')
                        <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form__group u-margin-bottom-small">
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email"
                               class="form-control @error('email') has-error @enderror"
                               placeholder="email@example.com"
                               value="{{old('email') ? old('email') : auth()->user()->email}}">
                        @error('email')
                        <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form__group u-margin-bottom-small">
                        <label for="phone">Phone</label>
                        <input type="text" id="phone" name="phone"
                               class="form-control @error('phone') has-error @enderror"
                               placeholder="678901234"
                               value="{{old('phone') ? old('phone') : auth()->user()->phone}}">
                        @error('phone')
                        <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form__group u-margin-bottom-small">
                        <label for="country">Country</label>
                        <select class="form-select" name="country" id="country">
                            <option value="">-- Select Country --</option>
                            <option value="Spain">Spain</option>
                            <option value="Spain">Italy</option>
                            <option value="Spain">France</option>
                        </select>
                        @error('country')
                        <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form__group u-margin-bottom-small">
                        <label for="state">State</label>
                        <input type="text" id="state" name="state"
                               class="form-control @error('state') has-error @enderror"
                               placeholder="Alicante" value="{{old('state')}}">
                        @error('state')
                        <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form__group u-margin-bottom-small">
                        <label for="city">City</label>
                        <input type="text" id="city" name="city"
                               class="form-control @error('city') has-error @enderror"
                               placeholder="Elche" value="{{old('city')}}">
                        @error('city')
                        <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form__group u-margin-bottom-small">
                        <label for="zipCode">ZipCode</label>
                        <input type="text" id="zipCode" name="zipCode"
                               class="form-control @error('zipCode') has-error @enderror"
                               placeholder="03203" value="{{old('zipCode')}}">
                        @error('zipCode')
                        <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form__group u-margin-bottom-medium">
                        <label for="address">Address</label>
                        <input type="text" id="address" name="address"
                               class="form-control @error('address') has-error @enderror"
                               placeholder="C. Nicolás Copérnico, 7" value="{{old('address')}}">
                        @error('address')
                        <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="u-margin-bottom-medium">
                        <input type="hidden" name="payment_method_id" id="payment_method_id" value="">

                        <div class="u-margin-bottom-small">
                            <label class="form-label">Payment Method</label>
                        </div>

                        <div id="card-element"></div>
                    </div>

                    <div class="form__group">
                        <button id="submit_btn" class="btn btn--primary">Finish payment</button>
                    </div>

                </form>


            </div>


        </div>

    </section>

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
