@extends('layouts.master')

@section('title', 'Barista | Find the best coffee beans')

@section('content')
    <!-- SECTION HERO -->
    <div class="section-hero">
        <div class="hero">

            <div class="hero__text-box">
                <p class="heading-primary u-margin-bottom-small">
                    Discover the Supreme Coffee Experience with Barista Excellence
                </p>
                <p class="text-normal u-margin-bottom-small">
                    Don't let it slip away and enjoy every morning with the perfect aroma and flavor of our coffee, made
                    with precision and passion by our state-of-the-art machine.
                </p>
                <a href="#" class="btn btn--cta">Shop Now</a>
            </div>
        </div>
    </div>

    


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
