@extends('layouts.master')

@section('title', 'Home')

@section('content')
    <section class="section-wishlist">
        <div class="container">
            <h2>Wishlist</h2>

            <div class="section-featured">

                <div class="featured d-flex">

                    @foreach($products as $product)

                        <x-product-card :product="$product"/>

                    @endforeach

                </div>

            </div>
        </div>
    </section>
@endsection
