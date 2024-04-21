@extends('layouts.master')

@section('title', 'Home')

@section('content')
    <section class="section-home">
        <div class="container">
            <h2>Home</h2>

            <h3 class="text-secondary">Featured Products</h3>

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
