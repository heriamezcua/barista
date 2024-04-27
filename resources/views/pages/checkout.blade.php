@extends('layouts.master')

@section('title', 'Checkout')

@section('content')
    <header class="page-header">
        <h1 class="text-center">Checkout</h1>
    </header>

    <main class="checkout-page">
        <div class="container">

            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="checkout-form mt-5">
                        <form action="" id="payment-form" method="post" class="p-3" style="border-radius: 4px; box-shadow: 0 0 5px rgba(0,0,0,0.3)">
                            @csrf

                            <div class="field mb-3">
                                <label class="form-label" for="name">Name</label>
                                <input  type="text" id="name" name="name" class="form-control @error('name') has-error @enderror"
                                       placeholder="John Doe" value="{{old('name') ? old('name') : auth()->user()->name}}">
                                @error('name')
                                <span class="field-error">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="field mb-3">
                                <label class="form-label" for="email">Email</label>
                                <input  type="text" id="email" name="email" class="form-control @error('email') has-error @enderror"
                                       placeholder="email@example.com"
                                       value="{{old('email') ? old('email') : auth()->user()->email}}">
                                @error('email')
                                <span class="field-error">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="field mb-3">
                                <label class="form-label" for="phone">Phone</label>
                                <input  type="text" id="phone" name="phone" class="form-control @error('phone') has-error @enderror"
                                       placeholder="678901234" value="{{old('phone') ? old('phone') : auth()->user()->phone}}">
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
                                <input  type="text" id="state" name="state" class="form-control @error('state') has-error @enderror"
                                       placeholder="Alicante" value="{{old('state')}}">
                                @error('state')
                                <span class="field-error">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="field mb-3">
                                <label class="form-label" for="city">City</label>
                                <input  type="text" id="city" name="city" class="form-control @error('city') has-error @enderror"
                                       placeholder="Elche" value="{{old('city')}}">
                                @error('city')
                                <span class="field-error">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="field mb-3">
                                <label class="form-label" for="zipCode">ZipCode</label>
                                <input  type="text" id="zipCode" name="zipCode" class="form-control @error('zipCode') has-error @enderror"
                                       placeholder="03203" value="{{old('zipCode')}}">
                                @error('zipCode')
                                <span class="field-error">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="field">
                                <label class="form-label" for="address">Address</label>
                                <input  type="text" id="address" name="address" class="form-control @error('address') has-error @enderror"
                                       placeholder="C. Nicolás Copérnico, 7" value="{{old('address')}}">
                                @error('address')
                                <span class="field-error">{{$message}}</span>
                                @enderror
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
