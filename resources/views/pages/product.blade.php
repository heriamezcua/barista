@extends('layouts.master')

@section('title', $product->title)

@section('content')

    <section class="section-product-single">

        <x-product-single :product="$product"/>

    </section>

    <section class="section-related">
        <div class="related">
            <div class="heading-box u-margin-bottom-big">
                <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" viewBox="0 0 24 24">
                    <path fill="#d70000"
                          d="M17.363 11.045a3.614 3.614 0 0 1 5.084 0a3.55 3.55 0 0 1 0 5.047L17 21.5l-5.447-5.408a3.55 3.55 0 0 1 0-5.047a3.614 3.614 0 0 1 5.084 0l.363.36zm1.88-6.288a5.986 5.986 0 0 1 1.689 3.338A5.619 5.619 0 0 0 17 8.808a5.617 5.617 0 0 0-6.856.818a5.55 5.55 0 0 0-.178 7.701l.178.185l2.421 2.404L11 21.485l-8.48-8.492A6 6 0 0 1 11 4.529a5.998 5.998 0 0 1 8.242.228"/>
                </svg>
                <h2 class="heading-primary">You might also like</h2>
            </div>


            <div class="products-box">
                @foreach($relatedProducts as $relatedProduct)

                    <x-product-card :product="$product"/>

                @endforeach
            </div>

        </div>
    </section>

    <section class="section-reviews">

        <div class="reviews">

            <div class="heading-box u-margin-bottom-big">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                     y="0px"
                     height="36px" viewBox="0 0 42.5 42.5" style="enable-background:new 0 0 42.5 42.5;"
                     xml:space="preserve">
                    <defs>
                    </defs>
                    <path fill="#d8a168" d="M5.31,0h31.87c1.46,0,2.71,0.53,3.74,1.57c1.04,1.04,1.57,2.28,1.57,3.74V23.9c0,1.46-0.53,2.71-1.57,3.74
                        c-1.04,1.04-2.28,1.57-3.74,1.57h-2.66L21.25,42.5V29.22H5.31c-1.46,0-2.71-0.53-3.74-1.57C0.53,26.61,0,25.36,0,23.9V5.31
                        C0,3.85,0.53,2.6,1.57,1.57S3.85,0,5.31,0 M34.53,5.31H5.31v2.66h29.22V5.31z M37.18,13.28H5.31v2.66h31.87V13.28z M29.22,21.25
                        H5.31v2.66h23.9V21.25z"/>
                </svg>

                <h2 class="heading-primary">Ratings & Reviews</h2>


            </div>

            <div class="reviews__content-box">
                <div class="reviews__ratings">

                    @php
                        // calc average rating
                        $rating = 0;
                        $totalReviews= count($product->reviews->where('status', 'approved'));

                        if($totalReviews!=0){
                        foreach ($product->reviews->where('status', 'approved') as $review){
                            $rating+= $review->rating / $totalReviews;
                        }

                        $rating = round($rating, 2);

                            // calc each number of rating numbers
                            $numRatingOne = $product->reviews->where('status', 'approved')->where('rating', 1)->count();
                            $numRatingTwo = $product->reviews->where('status', 'approved')->where('rating', 2)->count();
                            $numRatingThree = $product->reviews->where('status', 'approved')->where('rating', 3)->count();
                            $numRatingFour = $product->reviews->where('status', 'approved')->where('rating', 4)->count();
                            $numRatingFive = $product->reviews->where('status', 'approved')->where('rating', 5)->count();
                        }
                    @endphp

                    <div class="u-margin-bottom-small">
                        <h3 class="reviews__rating-heading">{{$rating}}</h3>
                    </div>

                    <div class="reviews__rating-box u-margin-bottom-small">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                             viewBox="0 0 24 24">
                            <path fill="currentColor"
                                  d="m5.825 21l1.625-7.025L2 9.25l7.2-.625L12 2l2.8 6.625l7.2.625l-5.45 4.725L18.175 21L12 17.275z"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                             viewBox="0 0 24 24">
                            <path fill="currentColor"
                                  d="m5.825 21l1.625-7.025L2 9.25l7.2-.625L12 2l2.8 6.625l7.2.625l-5.45 4.725L18.175 21L12 17.275z"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                             viewBox="0 0 24 24">
                            <path fill="currentColor"
                                  d="m5.825 21l1.625-7.025L2 9.25l7.2-.625L12 2l2.8 6.625l7.2.625l-5.45 4.725L18.175 21L12 17.275z"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                             viewBox="0 0 24 24">
                            <path fill="currentColor"
                                  d="m5.825 21l1.625-7.025L2 9.25l7.2-.625L12 2l2.8 6.625l7.2.625l-5.45 4.725L18.175 21L12 17.275z"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                             viewBox="0 0 24 24">
                            <path fill="currentColor"
                                  d="m5.825 21l1.625-7.025L2 9.25l7.2-.625L12 2l2.8 6.625l7.2.625l-5.45 4.725L18.175 21L12 17.275z"/>
                        </svg>
                    </div>

                    <div class="u-margin-bottom-medium">
                        <p class="text-normal">{{$totalReviews !== 0 ? 'Based on '. $totalReviews .' reviews' : 'There are no reviews yet, be the first to post one!'}}</p>
                    </div>

                    <div class="progress">
                        <!-- PROGRESS BOX -->
                        <div class="progress__box u-margin-bottom-small">
                            <div class="progress__text-box">
                                <p>1</p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                     viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                          d="m5.825 21l1.625-7.025L2 9.25l7.2-.625L12 2l2.8 6.625l7.2.625l-5.45 4.725L18.175 21L12 17.275z"/>
                                </svg>
                            </div>

                            <div class="progress__bar-box">
                                <div class="progress__bar" role="progressbar"
                                     aria-valuenow="50"
                                     aria-valuemin="0"
                                     style="width: 50%;"
                                     aria-valuemax="100">
                                </div>
                            </div>

                            <p class="progress__number">{{$totalReviews !== 0 ? $numRatingOne : 0}}</p>
                        </div>

                        <!-- PROGRESS BOX -->
                        <div class="progress__box u-margin-bottom-small">
                            <div class="progress__text-box">
                                <p>2</p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                     viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                          d="m5.825 21l1.625-7.025L2 9.25l7.2-.625L12 2l2.8 6.625l7.2.625l-5.45 4.725L18.175 21L12 17.275z"/>
                                </svg>
                            </div>

                            <div class="progress__bar-box">
                                <div class="progress__bar" role="progressbar"
                                     aria-valuenow="{{$totalReviews !== 0 ? $numRatingTwo : 0}}"
                                     aria-valuemin="0"
                                     style="width: {{$totalReviews !== 0 ? ($numRatingTwo / $totalReviews)*100 : 0}}%;"
                                     aria-valuemax="{{$totalReviews}}">
                                </div>
                            </div>

                            <p class="progress__number">{{$totalReviews !== 0 ? $numRatingTwo : 0}}</p>
                        </div>

                        <!-- PROGRESS BOX -->
                        <div class="progress__box u-margin-bottom-small">
                            <div class="progress__text-box">
                                <p>3</p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                     viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                          d="m5.825 21l1.625-7.025L2 9.25l7.2-.625L12 2l2.8 6.625l7.2.625l-5.45 4.725L18.175 21L12 17.275z"/>
                                </svg>
                            </div>

                            <div class="progress__bar-box">
                                <div class="progress__bar" role="progressbar"
                                     aria-valuenow="{{$totalReviews !== 0 ? $numRatingThree : 0}}"
                                     aria-valuemin="0"
                                     style="width: {{$totalReviews !== 0 ? ($numRatingThree / $totalReviews)*100 : 0}}%;"
                                     aria-valuemax="{{$totalReviews}}">
                                </div>
                            </div>

                            <p class="progress__number">{{$totalReviews !== 0 ? $numRatingThree : 0}}</p>
                        </div>

                        <!-- PROGRESS BOX -->
                        <div class="progress__box u-margin-bottom-small">
                            <div class="progress__text-box">
                                <p>4</p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                     viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                          d="m5.825 21l1.625-7.025L2 9.25l7.2-.625L12 2l2.8 6.625l7.2.625l-5.45 4.725L18.175 21L12 17.275z"/>
                                </svg>
                            </div>

                            <div class="progress__bar-box">
                                <div class="progress__bar" role="progressbar"
                                     aria-valuenow="{{$totalReviews !== 0 ? $numRatingFour : 0}}"
                                     aria-valuemin="0"
                                     style="width: {{$totalReviews !== 0 ? ($numRatingFour / $totalReviews)*100 : 0}}%;"
                                     aria-valuemax="{{$totalReviews}}">
                                </div>
                            </div>

                            <p class="progress__number">{{$totalReviews !== 0 ? $numRatingFour : 0}}</p>
                        </div>

                        <!-- PROGRESS BOX -->
                        <div class="progress__box u-margin-bottom-small">
                            <div class="progress__text-box">
                                <p>5</p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                     viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                          d="m5.825 21l1.625-7.025L2 9.25l7.2-.625L12 2l2.8 6.625l7.2.625l-5.45 4.725L18.175 21L12 17.275z"/>
                                </svg>
                            </div>

                            <div class="progress__bar-box">
                                <div class="progress__bar" role="progressbar"
                                     aria-valuenow="{{$totalReviews !== 0 ? $numRatingFive : 0}}"
                                     aria-valuemin="0"
                                     style="width: {{$totalReviews !== 0 ? ($numRatingFive / $totalReviews)*100 : 0}}%;"
                                     aria-valuemax="{{$totalReviews}}">
                                </div>
                            </div>

                            <p class="progress__number">{{$totalReviews !== 0 ? $numRatingFive : 0}}</p>
                        </div>
                    </div>
                </div>


                <div class="reviews__comments">

                    {{--                    <x-review-card :review="$review"/>--}}

                    <div class="review">
                        <div class="review__author-box u-margin-bottom-medium">
                            <div class="review__author-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" height="36px" viewBox="0 0 24 24">
                                    <g fill="none" fill-rule="evenodd">
                                        <path
                                            d="M24 0v24H0V0zM12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036c-.01-.003-.019 0-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.016-.018m.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022m-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01z"/>
                                        <path fill="currentColor"
                                              d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10s10-4.477 10-10S17.523 2 12 2M8.5 9.5a3.5 3.5 0 1 1 7 0a3.5 3.5 0 0 1-7 0m9.758 7.484A7.985 7.985 0 0 1 12 20a7.985 7.985 0 0 1-6.258-3.016C7.363 15.821 9.575 15 12 15s4.637.821 6.258 1.984"/>
                                    </g>
                                </svg>
                            </div>

                            <div class="review__author-info">
                                <p class="review__author-name">Hoxuro</p>
                                <p class="separator">-</p>
                                <p class="review__date">06/03/2024</p>
                            </div>

                            <div class="review__author-rating">
                                <svg xmlns="http://www.w3.org/2000/svg" height="18px"
                                     viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                          d="m5.825 21l1.625-7.025L2 9.25l7.2-.625L12 2l2.8 6.625l7.2.625l-5.45 4.725L18.175 21L12 17.275z"/>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" height="18px"
                                     viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                          d="m5.825 21l1.625-7.025L2 9.25l7.2-.625L12 2l2.8 6.625l7.2.625l-5.45 4.725L18.175 21L12 17.275z"/>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" height="18px"
                                     viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                          d="m5.825 21l1.625-7.025L2 9.25l7.2-.625L12 2l2.8 6.625l7.2.625l-5.45 4.725L18.175 21L12 17.275z"/>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" height="18px"
                                     viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                          d="m5.825 21l1.625-7.025L2 9.25l7.2-.625L12 2l2.8 6.625l7.2.625l-5.45 4.725L18.175 21L12 17.275z"/>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" height="18px"
                                     viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                          d="m5.825 21l1.625-7.025L2 9.25l7.2-.625L12 2l2.8 6.625l7.2.625l-5.45 4.725L18.175 21L12 17.275z"/>
                                </svg>
                            </div>
                        </div>

                        <div class="review__text-box">
                            <div class="u-margin-bottom-small">
                                <p class="review__title">BRING BACK REGULAR CAPPUCCINO!</p>
                            </div>

                            <div class="u-margin-bottom-medium">
                                <p class="review__body">
                                    I have been ordering via Dolce since 2014 and they used to sell a straight
                                    cappuccino -
                                    NOT SKINNY OR EXTRA CREMOSA which was a great taste. They do not seem to sell the
                                    straight cappuccino anymore , just skinny or extra cremosa. I love the great foam it
                                    creates but extra cremosa very sweet and skinny tastes like water. SHAME
                                </p>
                            </div>

                            <button class="btn btn--review">Show more/less</button>
                        </div>

                        <!-- TODO: IMPLEMENTAR PAGINATION -->
                        <div>PAGINATION</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-write">
        <div class="write">

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

                <div class="heading-box u-margin-bottom-big">
                    <div class="u-margin-bottom-small">
                        <h2 class="heading-secondary">My review for {{ucwords($product->title)}}</h2>
                    </div>

                    <p class="text text--small">Required fields are marked with an <span
                            class="text text--small text--red">*</span></p>

                </div>

                <form class="form-review" action="{{route('product.reviews.store', $product->id)}}" method="post">
                    @csrf

                    <!-- rating -->
                    <div class="form-review__group u-display-flex u-align-center u-margin-bottom-medium">
                        <label>Rating <span class="text--red">*</span></label>

                        <div class="rating-box">
                            @for ($i = 1; $i <= 5; $i++)
                                <div>
                                    <input type="checkbox" name="rating" value="{{ $i }}"
                                           id="rating-{{ $i }}">
                                    <label for="rating-{{ $i }}">{{ $i }}</label><br>
                                </div>
                            @endfor
                        </div>
                    </div>

                    <!-- summary -->
                    <div class="form-review__group u-margin-bottom-medium">
                        <label for="summary">Summary <span
                                class="text--red">*</span></label>
                        <input id="summary" type="text" name="summary"
                               placeholder="Example: Awesome product!">
                    </div>

                    <!-- review -->
                    <div class="form-review__group u-margin-bottom-medium">
                        <label for="review">Review</label>
                        <textarea id="review" type="text" name="review"
                                  placeholder="Example:The intense espresso can compete with any other variety of capsule coffee from other brands with much higher prices."></textarea>
                    </div>

                    <!-- nickname -->
                    <div class="form-review__group u-margin-bottom-medium">
                        <label for="nickname">Nickname <span
                                class="text--red">*</span></label>
                        <input id="nickname" type="text" name="nickname" style="width: 100%"
                               value="{{auth()->user()->name}}">
                    </div>

                    <div class="form-review__group u-text-center u-margin-top-big">
                        <button type="submit" class="btn btn--primary">Submit review</button>
                    </div>
                </form>

            @else
                <div class="u-text-center">
                    <p class="text text--normal">Only registered users can write reviews. Please <a class="btn" style="color: #d8a168; text-decoration: underline" href="{{route('login')}}">Sign in</a>
                        or
                        <a class="btn" style="color: #d8a168; text-decoration: underline" href="{{route('register')}}">Create an account</a></p>
                </div>

            @endif



        </div>
    </section>


    {{--                        <div class="col-md-6">--}}

    {{--                            @foreach($product->reviews->where('status', 'approved') as $review)--}}

    {{--                                <div class="review-box mb-4">--}}
    {{--                                    <div class="author mb-2">--}}
    {{--                                        {{$review->nickname}}--}}
    {{--                                        {{\Carbon\Carbon::parse($review->created_at)->format('d/m/Y')}}--}}
    {{--                                        {{$review->rating}}--}}
    {{--                                    </div>--}}

    {{--                                    <div class="review-body">--}}
    {{--                                        <p>{{$review->summary}}</p>--}}
    {{--                                        <p>{{$review->review}}</p>--}}
    {{--                                    </div>--}}

    {{--                                    <button class="btn btn-secondary">Show more / less</button>--}}
    {{--                                </div>--}}

    {{--                            @endforeach--}}

    {{--                        </div>--}}
    {{--                    </div>--}}



    {{--                </div>--}}
    {{--            </div>--}}

    {{--        </div>--}}
    {{--    </section>--}}

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
