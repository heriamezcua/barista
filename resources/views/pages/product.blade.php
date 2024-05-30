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


                    <div class="row">
                        <div class="col-md-6">
                            <div class="rating-box">
                                @php
                                    // calc average rating
                                    $rating = 0;
                                    $totalReviews= count($product->reviews->where('status', 'approved'));

                                    if($totalReviews!=0){
                                    foreach ($product->reviews->where('status', 'approved') as $review){

                                        $rating+= $review->rating / $totalReviews;
                                    }

                                        // calc each number of rating numbers
                                        $numRatingOne = $product->reviews->where('status', 'approved')->where('rating', 1)->count();
                                        $numRatingTwo = $product->reviews->where('status', 'approved')->where('rating', 2)->count();
                                        $numRatingThree = $product->reviews->where('status', 'approved')->where('rating', 3)->count();
                                        $numRatingFour = $product->reviews->where('status', 'approved')->where('rating', 4)->count();
                                        $numRatingFive = $product->reviews->where('status', 'approved')->where('rating', 5)->count();
                                    }

                                @endphp

                                <h2>{{$rating}}</h2>
                                <p class="text-secondary">{{$totalReviews !== 0 ? 'Based on '. $totalReviews .' reviews' : 'There are no reviews yet, be the first to post one!'}}</p>

                                <div class="progress-box">
                                    <div class="progress mb-3">
                                        <p style="margin-right: 10px;">1
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                 viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="m5.825 21l1.625-7.025L2 9.25l7.2-.625L12 2l2.8 6.625l7.2.625l-5.45 4.725L18.175 21L12 17.275z"/>
                                            </svg>
                                        </p>
                                        <div class="progress-bar" role="progressbar"
                                             aria-valuenow="{{$totalReviews !== 0 ? $numRatingOne : 0}}"
                                             aria-valuemin="0"
                                             style="width: {{$totalReviews !== 0 ? ($numRatingOne / $totalReviews)*100 : 0}}%;"
                                             aria-valuemax="{{$totalReviews}}"></div>
                                        <p style="margin-left: auto">{{$totalReviews !== 0 ? $numRatingOne : 0}}</p>
                                    </div>
                                    <div class="progress mb-3">
                                        <p style="margin-right: 10px;">2
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                 viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="m5.825 21l1.625-7.025L2 9.25l7.2-.625L12 2l2.8 6.625l7.2.625l-5.45 4.725L18.175 21L12 17.275z"/>
                                            </svg>
                                        </p>
                                        <div class="progress-bar" role="progressbar"
                                             aria-valuenow="{{$totalReviews !== 0 ? $numRatingTwo : 0}}"
                                             aria-valuemin="0"
                                             style="width: {{$totalReviews !== 0 ? ($numRatingTwo / $totalReviews)*100 : 0}}%;"
                                             aria-valuemax="{{$totalReviews}}"></div>
                                        <p style="margin-left: auto">{{$totalReviews !== 0 ? $numRatingTwo : 0}}</p>
                                    </div>
                                    <div class="progress mb-3">
                                        <p style="margin-right: 10px;">3
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                 viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="m5.825 21l1.625-7.025L2 9.25l7.2-.625L12 2l2.8 6.625l7.2.625l-5.45 4.725L18.175 21L12 17.275z"/>
                                            </svg>
                                        </p>
                                        <div class="progress-bar" role="progressbar"
                                             aria-valuenow="{{$totalReviews !== 0 ? $numRatingThree : 0}}"
                                             aria-valuemin="0"
                                             style="width: {{$totalReviews !== 0 ? ($numRatingThree / $totalReviews)*100 : 0}}%;"
                                             aria-valuemax="{{$totalReviews}}"></div>
                                        <p style="margin-left: auto">{{$totalReviews !== 0 ? $numRatingThree : 0}}</p>
                                    </div>
                                    <div class="progress mb-3">
                                        <p style="margin-right: 10px;">4
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                 viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="m5.825 21l1.625-7.025L2 9.25l7.2-.625L12 2l2.8 6.625l7.2.625l-5.45 4.725L18.175 21L12 17.275z"/>
                                            </svg>
                                        </p>
                                        <div class="progress-bar" role="progressbar"
                                             aria-valuenow="{{$totalReviews !== 0 ? $numRatingFour : 0}}"
                                             aria-valuemin="0"
                                             style="width: {{$totalReviews !== 0 ? ($numRatingFive / $totalReviews)*100 : 0}}%;"
                                             aria-valuemax="{{$totalReviews}}"></div>
                                        <p style="margin-left: auto">{{$totalReviews !== 0 ? $numRatingFour : 0}}</p>
                                    </div>
                                    <div class="progress">
                                        <p style="margin-right: 10px;">5
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                 viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="m5.825 21l1.625-7.025L2 9.25l7.2-.625L12 2l2.8 6.625l7.2.625l-5.45 4.725L18.175 21L12 17.275z"/>
                                            </svg>
                                        </p>
                                        <div class="progress-bar" role="progressbar"
                                             aria-valuenow="{{$totalReviews !== 0 ? $numRatingFive : 0}}"
                                             aria-valuemin="0"
                                             style="width: {{$totalReviews !== 0 ? ($numRatingFive / $totalReviews)*100 : 0}}%;"
                                             aria-valuemax="{{$totalReviews}}"></div>
                                        <p style="margin-left: auto">{{$totalReviews !== 0 ? $numRatingFive : 0}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">

                        </div>
                    </div>

                    @if(auth()->user())
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{session('error')}}
                            </div>
                        @endif

                        <div class="row pb-4">
                            <div class="col-md-6 mx-auto">
                                <h3>My review for {{ucwords($product->title)}}</h3>
                                <p class="text-secondary">Required fields are marked with an <span
                                        class="text-danger">*</span></p>

                                <form action="{{route('product.reviews.store', $product->id)}}" method="post">
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

    <!-- Script to select only 1 checkbox -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const checkboxEls = document.querySelectorAll('input[type="checkbox"]');

            checkboxEls.forEach(checkboxEl => {
                checkboxEl.addEventListener('change', function () {
                    if (this.checked) {
                        checkboxEls.forEach(checkboxEl => {
                            if (checkboxEl !== this) {
                                checkboxEl.checked = false;
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
