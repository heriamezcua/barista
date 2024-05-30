@extends('layouts.master')

@section('title', 'Home')

@section('content')
    <div class="accounts-page">
        <div class="container">
            <section class="u-box d-flex justify-content-between py-3">
                <div>
                    <p class="fs-3">
                        {{auth()->user()->name}}
                    </p>
                    <p class="fs-5">
                        {{auth()->user()->email}}
                    </p>
                </div>

                <div class="user-btn">
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <button class="btn btn-primary">logout</button>
                    </form>
                </div>
            </section>

            <section class="py-3">

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
                            <h3>Editing review for product <a href="{{route('product', \App\Models\Product::findOrFail($review->product_id))}}">{{\App\Models\Product::findOrFail($review->product_id)->title}}</a></h3>
                            <p class="text-secondary">Required fields are marked with an <span
                                    class="text-danger">*</span></p>

                            <form action="{{route('reviews.update', $review->id)}}" method="post">
                                @method('PUT')
                                @csrf

                                <!-- rating -->
                                <div class="form-group mb-4">
                                    <label>Rating <span class="text-danger">*</span></label>
                                    <div class="d-flex">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <div style="margin-right: 10px;">
                                                <input type="checkbox" name="rating" value="{{ $i }}"
                                                       id="rating-{{ $i }}" {{($review->rating === $i) ? 'checked' : ''}}>
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
                                           value="{{$review->summary}}">
                                </div>

                                <!-- review -->
                                <div class="form-group mb-4">
                                    <label class="mb-2" for="review">Review</label>
                                    <input type="text" name="review" style="width: 100%" value="{{$review->review}}">
                                </div>

                                <!-- nickname -->
                                <div class="form-group mb-4">
                                    <label class="mb-2" for="nickname">Nickname <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="nickname" style="width: 100%"
                                           value="{{$review->nickname}}">
                                </div>

                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary">Submit review</button>
                                </div>
                            </form>

                        </div>
                    </div>

            </section>

        </div>
    </div>

    <!-- Script to select only 1 checkbox -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkboxEls = document.querySelectorAll('input[type="checkbox"]');

            checkboxEls.forEach(checkboxEl => {
                checkboxEl.addEventListener('change', function() {
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
