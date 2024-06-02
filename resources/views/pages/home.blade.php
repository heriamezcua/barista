@extends('layouts.master')

@section('title', 'Barista | Find the best coffee beans')

@section('content')
    <!-- SECTION HERO -->
    <div class="section-hero">
        <div class="hero">

            <div class="hero__text-box">
                <p class="heading-hero u-margin-bottom-small">
                    L'OR Barista Doble Espresso
                </p>
                <p class="text-normal u-margin-bottom-small">
                    Don't miss the opportunity and get the best double capacity coffee machine on the market.
                </p>
                <a href="#" class="btn btn--cta">Shop Now</a>
            </div>
        </div>
    </div>

    <!-- SECTION CATEGORIES -->
    <div class="section-categories">

        <div class="categories">

            <!-- CATEGORY -->
            <div class="category">
                <div class="category__img-box category__img-box--1 u-margin-bottom-small"></div>
                <a class="category__link" href="#">Coffee Beans</a>
            </div>

            <!-- CATEGORY -->
            <div class="category">
                <div class="category__img-box category__img-box--2 u-margin-bottom-small"></div>
                <a class="category__link" href="#">Coffee Pods</a>
            </div>

            <!-- CATEGORY -->
            <div class="category">
                <div class="category__img-box category__img-box--3 u-margin-bottom-small"></div>
                <a class="category__link" href="#">Machines</a>
            </div>

            <!-- CATEGORY -->
            <div class="category">
                <div class="category__img-box category__img-box--4 u-margin-bottom-small"></div>
                <a class="category__link" href="#">Accesories</a>
            </div>
        </div>
    </div>

    <!-- SECTION SELECTION -->
    <div class="section-selection">
        <div class="selection">
            <div class="selection__text-box">
                <h2 class="heading-primary u-margin-bottom-small">Top Selection</h2>
                <p class="text-normal u-margin-bottom-small">Your favorite coffee with exclusive offers and
                    discounts</p>
                <a class="btn btn--primary" href="#">Discover more</a>
            </div>

            <div class="product-box">
                <div class="product-box__categories u-margin-bottom-small">
                    <p class="product-box__category">Coffee</p>
                    <p class="product-box__category">Pods</p>
                    <p class="product-box__category">Machines</p>
                    <p class="product-box__category">Accessories</p>
                </div>
                <div class="product-box__products">
                    <!-- PRODUCT -->
                    <div class="product">
                        <div class="product__img">
                            IMAGE
                        </div>
                        <div class="product__content">
                            <p class="product__title">Coffee with milk</p>
                            <p class="product__category">Coffee Beans</p>
                            <div class="product__rating-box">

                            </div>
                            <p class="product__price">12€</p>
                        </div>
                    </div>
                    <!-- PRODUCT -->
                    <div class="product">
                        <div class="product__img">
                            IMAGE
                        </div>
                        <div class="product__content">
                            CONTEXT
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






    {{--    <section class="section-home">--}}
    {{--        <div class="container">--}}
    {{--            <h2>Home</h2>--}}

    {{--            <h3 class="text-secondary">Featured Products</h3>--}}

    {{--            <div class="section-featured">--}}

    {{--                <div class="featured d-flex">--}}

    {{--                    @foreach($products as $product)--}}

    {{--                        <x-product-card :product="$product"/>--}}

    {{--                    @endforeach--}}

    {{--                </div>--}}

    {{--            </div>--}}

    {{--        </div>--}}
    {{--    </section>--}}
@endsection
