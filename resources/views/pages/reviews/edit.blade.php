@extends('layouts.master')

@section('title', 'Home')

@section('content')

    <section class="section-edit">

        <div class="edit">
            <div class="edit__form-box">

                @if(session('success'))
                    <div class="alert alert--success u-margin-bottom-small">
                        {{session('success')}}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert--error u-margin-bottom-small">
                        {{session('error')}}
                    </div>
                @endif

                <div class="heading-box u-margin-bottom-big">
                    <div class="u-margin-bottom-small">
                        <h2 class="heading-secondary">Editing review for product <a
                                href="{{route('product', \App\Models\Product::findOrFail($review->product_id))}}">{{\App\Models\Product::findOrFail($review->product_id)->title}}</a>
                        </h2>
                    </div>

                    <p class="text text--small">Required fields are marked with an <span
                            class="text text--small text--red">*</span></p>

                </div>

                <form class="form-review" action="{{route('reviews.update', $review->id)}}" method="post">
                    @method('PUT')
                    @csrf

                    <!-- rating -->
                    <div class="form-review__group u-display-flex u-align-center u-margin-bottom-medium">
                        <label>Rating <span class="text--red">*</span></label>

                        <div class="form-review__rating-box">
                            @for ($i = 1; $i <= 5; $i++)
                                <div class="form-review__star-box">
                                    <label class="form-review__star-label" for="rating-{{ $i }}">
                                        <input type="checkbox" name="rating" value="{{ $i }}"
                                               id="rating-{{ $i }} {{($review->rating >= $i) ? 'checked' : ''}}">

                                        <svg class="star {{($review->rating >= $i) ? 'star-active' : ''}}"
                                             xmlns="http://www.w3.org/2000/svg" width="32px" height="32px"
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
                               value="{{$review->summary}}">
                    </div>

                    <!-- review -->
                    <div class="form-review__group u-margin-bottom-medium">
                        <label for="review">Review</label>
                        <textarea id="review" type="text" name="review"
                        >{{$review->review}}</textarea>
                    </div>

                    <!-- nickname -->
                    <div class="form-review__group u-margin-bottom-medium">
                        <label for="nickname">Nickname <span
                                class="text--red">*</span></label>
                        <input id="nickname" type="text" name="nickname" style="width: 100%"
                               value="{{$review->nickname}}">
                    </div>

                    <div class="form-review__group u-text-center u-margin-top-big">
                        <button type="submit" class="btn btn--primary">Edit review</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

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
                        const labelElement = checkbox.closest('label');
                        if (labelElement) {
                            const starElement = labelElement.querySelector('.star');
                            if (starElement) {
                                starElement.classList.remove('star-active');
                            }
                            checkbox.checked = false;
                        }
                    });

                    // Check all stars up to the clicked one
                    for (let i = 0; i <= index; i++) {
                        ratingCheckboxes[i].checked = true;
                        const labelElement = ratingCheckboxes[i].closest('label');
                        if (labelElement) {
                            const starElement = labelElement.querySelector('.star');
                            if (starElement) {
                                starElement.classList.add('star-active');
                            }
                        }
                    }
                });
            });
        });
    </script>
@endsection
