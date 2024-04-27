@extends('layouts.master')

@section('title', $product->title)

@section('content')
    <section class="section-home">
        <div class="container">
            <h2>Single Product</h2>

            @if (session()->has ('addedToCart'))
                <section class="pop-up">
                    <div class="pop-up-box">
                        <div class="pop-up-title">
                            {{session()->get('addedToCart')}}
                        </div>
                        <div class="pop-up-actions">
                            <a href="{{route('home')}}" class="btn btn-outlined">Continue Shopping</a>
                            <a href="{{route('cart')}}" class="btn btn-primary">Go To Cart!</a>
                        </div>
                    </div>
                </section>
            @endif

            <div class="section-single">

                <x-product-single :product="$product" />

            </div>

        </div>
    </section>
@endsection
