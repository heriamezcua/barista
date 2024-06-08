@extends('layouts.master')

@section('title', $product->title)

@section('content')

    @props([
    'ratingInfo' => $ratingInfo,
    ])

    <section class="section-product-single">

        <x-product-single :product="$product" :ratingInfo="$ratingInfo"/>

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

                    <div class="product-box">
                        <x-product-card :product="$relatedProduct"/>
                    </div>
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
                    <div class="reviews__rating-box u-margin-bottom-small u-display-flex u-align-center">
                        <h3 class="reviews__rating-heading">{{$ratingInfo['rating']}}</h3>
                        <svg xmlns="http://www.w3.org/2000/svg" height="36px"
                             viewBox="0 0 24 24">
                            <path fill="currentColor"
                                  d="m5.825 21l1.625-7.025L2 9.25l7.2-.625L12 2l2.8 6.625l7.2.625l-5.45 4.725L18.175 21L12 17.275z"/>
                        </svg>
                    </div>

                    <div class="u-margin-bottom-medium">
                        <p class="text-normal">{{$ratingInfo['totalReviews'] !== 0 ? 'Based on '. $ratingInfo['totalReviews'] .' reviews' : 'There are no reviews yet, be the first to post one!!'}}</p>
                    </div>

                    <div class="progress">
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
                                     aria-valuenow="{{$ratingInfo['totalReviews'] !== 0 ? $ratingInfo['numRatingFive'] : 0}}"
                                     aria-valuemin="0"
                                     style="width: {{$ratingInfo['totalReviews'] !== 0 ? ($ratingInfo['numRatingFive'] / $ratingInfo['totalReviews'])*100 : 0}}%;"
                                     aria-valuemax="{{$ratingInfo['totalReviews']}}">
                                </div>
                            </div>

                            <p class="progress__number">{{$ratingInfo['totalReviews'] !== 0 ? $ratingInfo['numRatingFive'] : 0}}</p>
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
                                     aria-valuenow="{{$ratingInfo['totalReviews'] !== 0 ? $ratingInfo['numRatingFour'] : 0}}"
                                     aria-valuemin="0"
                                     style="width: {{$ratingInfo['totalReviews'] !== 0 ? ($ratingInfo['numRatingFour'] / $ratingInfo['totalReviews'])*100 : 0}}%;"
                                     aria-valuemax="{{$ratingInfo['totalReviews']}}">
                                </div>
                            </div>

                            <p class="progress__number">{{$ratingInfo['totalReviews'] !== 0 ? $ratingInfo['numRatingFour'] : 0}}</p>
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
                                     aria-valuenow="{{$ratingInfo['totalReviews'] !== 0 ? $ratingInfo['numRatingThree'] : 0}}"
                                     aria-valuemin="0"
                                     style="width: {{$ratingInfo['totalReviews'] !== 0 ? ($ratingInfo['numRatingThree'] / $ratingInfo['totalReviews'])*100 : 0}}%;"
                                     aria-valuemax="{{$ratingInfo['totalReviews']}}">
                                </div>
                            </div>

                            <p class="progress__number">{{$ratingInfo['totalReviews'] !== 0 ? $ratingInfo['numRatingThree'] : 0}}</p>
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
                                     aria-valuenow="{{$ratingInfo['totalReviews'] !== 0 ? $ratingInfo['numRatingTwo'] : 0}}"
                                     aria-valuemin="0"
                                     style="width: {{$ratingInfo['totalReviews'] !== 0 ? ($ratingInfo['numRatingTwo'] / $ratingInfo['totalReviews'])*100 : 0}}%;"
                                     aria-valuemax="{{$ratingInfo['totalReviews']}}">
                                </div>
                            </div>

                            <p class="progress__number">{{$ratingInfo['totalReviews'] !== 0 ? $ratingInfo['numRatingTwo'] : 0}}</p>
                        </div>

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
                                     aria-valuenow="{{$ratingInfo['totalReviews'] !== 0 ? $ratingInfo['numRatingOne'] : 0}}"
                                     aria-valuemin="0"
                                     style="width: {{$ratingInfo['totalReviews'] !== 0 ? ($ratingInfo['numRatingOne'] / $ratingInfo['totalReviews'])*100 : 0}}%"
                                     aria-valuemax="{{$ratingInfo['totalReviews']}}">
                                </div>
                            </div>

                            <p class="progress__number">{{$ratingInfo['totalReviews'] !== 0 ? $ratingInfo['numRatingOne'] : 0}}</p>
                        </div>
                    </div>
                </div>


                <div class="reviews__comments">
                    @php
                        $reviews = $product->reviews()->where('status', 'approved')->paginate(1);
                    @endphp

                    @if(!$reviews->count())
                        <div class="reviews__no-comments-box">
                            <p class="text text--normal">There are no reviews yet, be the first to post one!!</p>
                        </div>
                    @endif

                    @foreach($reviews as $review)

                        <div class="u-margin-bottom-big">
                            <x-review-card :review="$review"/>
                        </div>

                    @endforeach

                    <div class="reviews__pagination">
                        {{ $reviews->links() }}
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

                        <div class="form-review__rating-box">
                            @for ($i = 1; $i <= 5; $i++)
                                <div class="form-review__star-box">
                                    <label class="form-review__star-label" for="rating-{{ $i }}">
                                        <input type="checkbox" name="rating" value="{{ $i }}"
                                               id="rating-{{ $i }}">

                                        <svg class="star" xmlns="http://www.w3.org/2000/svg" width="32px" height="32px"
                                             viewBox="0 0 24 24">
                                            <path class="star-fill"
                                                  d="m5.825 21l1.625-7.025L2 9.25l7.2-.625L12 2l2.8 6.625l7.2.625l-5.45 4.725L18.175 21L12 17.275z"/>
                                        </svg>

                                    </label><br>
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
                    <p class="text text--normal">Only registered users can write reviews. Please <a class="btn"
                                                                                                    style="color: #d8a168; text-decoration: underline"
                                                                                                    href="{{route('login')}}">Sign
                            in</a>
                        or
                        <a class="btn" style="color: #d8a168; text-decoration: underline" href="{{route('register')}}">Create
                            an account</a></p>
                </div>

            @endif
        </div>
    </section>


    <!-- script for product image carousel -->
    <script>
        function changeImg(direction) {
            // Select elements
            const mainImgEl = document.querySelector('.product-single__main-img');
            const secImgEls = document.querySelectorAll('.product-single__sec-img');
            const totalSecImgs = secImgEls.length;

            let activeIndex = -1;

            // Find the active image
            secImgEls.forEach((img, index) => {
                if (img.classList.contains('product-single__sec-img--active')) {
                    img.classList.remove('product-single__sec-img--active');
                    activeIndex = index;
                }
            });

            // Change the active index
            if (direction === -1) {
                activeIndex = (activeIndex === 0) ? totalSecImgs - 1 : activeIndex - 1;
            } else if (direction === 1) {
                activeIndex = (activeIndex === totalSecImgs - 1) ? 0 : activeIndex + 1;
            }

            // Apply the active class and change the main image
            if (activeIndex === -1) {
                const lastImgIndex = totalSecImgs - 1;
                secImgEls[lastImgIndex].classList.add('product-single__sec-img--active');
                mainImgEl.style.backgroundImage = secImgEls[lastImgIndex].style.backgroundImage;
            } else if (activeIndex >= 0 && activeIndex < totalSecImgs) {
                secImgEls[activeIndex].classList.add('product-single__sec-img--active');
                mainImgEl.style.backgroundImage = secImgEls[activeIndex].style.backgroundImage;
            }
        }
    </script>

    <!-- script for quantity manipulation -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            (function quantityProducts() {
                const quantityArrowMinus = document.querySelector(".product-single__quantity-arrow--minus");
                const quantityArrowPlus = document.querySelector(".product-single__quantity-arrow--plus");
                const quantityNum = document.querySelector(".product-single__input-quantity-box input");

                quantityArrowMinus.addEventListener('click', quantityMinus);
                quantityArrowPlus.addEventListener('click', quantityPlus);

                function quantityMinus(e) {
                    e.preventDefault();

                    if (parseInt(quantityNum.value) > 1) {
                        quantityNum.value = parseInt(quantityNum.value) - 1;
                    }
                }

                function quantityPlus(e) {
                    e.preventDefault();

                    quantityNum.value = parseInt(quantityNum.value) + 1;
                }
            })();

        });
    </script>

    <!-- Script for stars checkbox -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ratingCheckboxes = document.querySelectorAll('input[type="checkbox"][name="rating"]');
            const starLabels = document.querySelectorAll('.form-review__star-label');

            // Add event listeners to the labels
            starLabels.forEach((label, index) => {
                label.addEventListener('click', function () {
                    // Uncheck all checkboxes
                    ratingCheckboxes.forEach(checkbox => {
                        checkbox.checked = false;
                        checkbox.closest('label').querySelector('.star').classList.remove('star-active');
                    });

                    // Check all stars up to the clicked one
                    for (let i = 0; i <= index; i++) {
                        ratingCheckboxes[i].checked = true;
                        ratingCheckboxes[i].closest('label').querySelector('.star').classList.add('star-active');
                    }
                });
            });
        });
    </script>

    <!-- Script to show more or less text btn -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const reviews = document.querySelectorAll('.review');

            reviews.forEach(function (review) {
                const toggleBtn = review.querySelector('.btn--review');
                const reviewBody = review.querySelector('.review__body');

                const fullText = reviewBody.textContent.trim();
                const limitedText = fullText.substring(0, 100);

                // Text when the user enter
                (limitedText >= fullText) ? reviewBody.textContent = limitedText : reviewBody.textContent = limitedText + '...';

                toggleBtn.addEventListener('click', function () {
                    if (reviewBody.textContent === fullText) {
                        // If currently showing full text, switch to limited text
                        (limitedText >= fullText) ? reviewBody.textContent = limitedText : reviewBody.textContent = limitedText + '...';
                        toggleBtn.textContent = 'Show more';
                    } else {
                        // If currently showing limited text, switch to full text
                        reviewBody.textContent = fullText;
                        toggleBtn.textContent = 'Show less';
                    }
                });
            });
        });
    </script>
@endsection
