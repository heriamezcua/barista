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

                <x-product-single :product="$product"/>

            </div>

            <div class="section-comments mt-5 pt-5">
                <div class="container">
                    <h2 class="text-center mb-4">RATINGS & REVIEWS</h2>

                    @if(auth()->user())
                        <div class="row pb-4">
                            <div class="col-md-6 mx-auto">
                                <h3>My review for {{ucwords($product->title)}}</h3>
                                <p class="text-secondary">Required fields are marked with an <span
                                        class="text-danger">*</span></p>

                                <form action="#" method="post">
                                    @csrf

                                    <!-- rating -->
                                    <div class="form-group mb-4">
                                        <label>Rating <span class="text-danger">*</span></label>
                                        <div class="d-flex">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <div style="margin-right: 10px;">
                                                    <input type="checkbox" name="rating" value="{{ $i }}"
                                                           id="rating-{{ $i }}">
                                                    <label for="rating-{{ $i }}">{{ $i }}</label><br>
                                                </div>
                                            @endfor
                                        </div>
                                    </div>

                                    <!-- summary -->
                                    <div class="form-group mb-4">
                                        <label class="mb-2" for="summary">Summary <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="summary" style="width: 100%"
                                               placeholder="Example: Awesome product!">
                                    </div>

                                    <!-- review -->
                                    <div class="form-group mb-4">
                                        <label class="mb-2" for="review">Review</label>
                                        <input type="text" name="review" style="width: 100%" placeholder="Example:The intense espresso can compete with any other variety of capsule coffee from other brands
with much higher prices.">
                                    </div>

                                    <!-- nickname -->
                                    <div class="form-group mb-4">
                                        <label class="mb-2" for="nickname">Nickname <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="nickname" style="width: 100%"
                                               value="{{auth()->user()->name}}">
                                    </div>

                                    <div class="form-group text-center">
                                        <button type="submit" class="btn btn-primary">Submit review</button>
                                    </div>
                                </form>

                            </div>
                        </div>

                    @else
                        <div>
                            <p>Only registered users can write reviews. Please <a href="{{route('login')}}">Sign in</a>
                                or
                                <a href="{{route('register')}}">Create an account</a>.</p>
                        </div>

                    @endif

                </div>
            </div>

        </div>
    </section>
@endsection
