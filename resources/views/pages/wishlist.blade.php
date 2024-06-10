@extends('layouts.master')

@section('title', 'Home')

@section('content')
    <section class="section-wishlist">
        <div class="wishlist">

            <div class="u-margin-bottom-big">
                <h2 class="heading-secondary">My wishlist</h2>
            </div>


            @if(!$products->isEmpty())

                <div class="wish-box">
                    @foreach($products as $product)
                        <x-product-card :product="$product"/>
                    @endforeach
                </div>

            @else

                <div class="wishlist__empty">

                    <div class="search-remove u-margin-bottom-small">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="#ffffff" width="100px" height="100px"
                             viewBox="0 0 32 32" version="1.1">
                            <path
                                d="M30.531 29.469l-10.451-10.451c1.645-1.874 2.649-4.346 2.649-7.053 0-5.917-4.797-10.714-10.714-10.714-0.005 0-0.011 0-0.016 0h0.001c-0 0-0.001 0-0.001 0-5.936 0-10.749 4.812-10.749 10.749 0 2.968 1.203 5.656 3.148 7.601v0c1.931 1.946 4.607 3.15 7.564 3.15 2.711 0 5.185-1.012 7.066-2.68l-0.011 0.010 10.451 10.451c0.136 0.136 0.324 0.22 0.531 0.22 0.415 0 0.751-0.336 0.751-0.751 0-0.207-0.084-0.395-0.22-0.531v0zM5.459 18.539c-1.688-1.676-2.733-3.998-2.733-6.564 0-5.108 4.141-9.249 9.249-9.249 2.566 0 4.888 1.045 6.564 2.733l0.001 0.001h0.002c1.674 1.674 2.709 3.986 2.709 6.54s-1.035 4.866-2.708 6.539v0l-0.002 0.001-0.001 0.003c-1.673 1.673-3.985 2.708-6.538 2.708-2.555 0-4.867-1.036-6.541-2.711l-0-0zM13.061 12l2.298-2.298c0.131-0.135 0.212-0.319 0.212-0.522 0-0.414-0.336-0.75-0.75-0.75-0.203 0-0.387 0.081-0.522 0.212l-2.298 2.298-2.298-2.298c-0.135-0.131-0.319-0.212-0.522-0.212-0.414 0-0.75 0.336-0.75 0.75 0 0.203 0.081 0.387 0.212 0.522l2.298 2.298-2.298 2.298c-0.141 0.136-0.228 0.327-0.228 0.538 0 0.414 0.336 0.75 0.75 0.75 0.211 0 0.402-0.087 0.538-0.228l2.298-2.298 2.298 2.298c0.135 0.131 0.319 0.212 0.522 0.212 0.414 0 0.75-0.336 0.75-0.75 0-0.203-0.081-0.387-0.212-0.522l0 0z"/>
                        </svg>
                    </div>

                    <p class="wishlist__empty-title">Your wishlist is empty</p>

                    <div class="u-margin-bottom-medium">
                        <p class="wishlist__empty-text">Explore a multitude of items at good prices from our main
                            page</p>
                    </div>

                    <a href="{{route('home')}}" class="btn btn--primary">Explore articles</a>

                </div>

            @endif

        </div>
    </section>
@endsection
