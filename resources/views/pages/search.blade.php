@extends('layouts.master')

@section('title', 'Search | Barista.com')

@section('content')

    <section class="section-search">
        <div class="search">
            <div class="search__term-box u-margin-bottom-medium">
                @if($searchTerm == '')
                    <h2 class="heading-secondary">All Products</h2>
                @elseif(!$numResults)
                    <h2 class="heading-secondary">No results found for "<span
                            class="search__searchTerm">{{$searchTerm}}</span>"
                    </h2>
                @elseif($numResults===1)
                    <h2 class="heading-secondary">1 result for "<span class="search__searchTerm">{{$searchTerm}}</span>"
                    </h2>
                @else
                    <h2 class="heading-secondary">{{$numResults}} results for "<span
                            class="search__searchTerm">{{$searchTerm}}</span>"</h2>
                @endif
            </div>

            <div class="search__content-box">

                <div class="search__filter-box">
                    @include('pages.components.sidebarFilters')
                </div>


                <div class="search__product-box">

                    <div class="search__sorting-box">
                        @include('pages.components.sorting')
                    </div>

                    <div class="search__products">

                        @foreach($products as $product)

                            <x-product-card :product="$product"/>

                        @endforeach

                    </div>

                    <div class="search__pagination">
                        {{ $products->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Script to handle menu collapsable -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const category = document.getElementById('category');
            const checkboxesCategory = document.getElementById('checkboxes-category');

            const coffee_type = document.getElementById('coffee_type');
            const checkboxesCoffeeType = document.getElementById('checkboxes-coffee-type');

            const variety = document.getElementById('variety');
            const checkboxesVariety = document.getElementById('checkboxes-variety');

            const caffeine = document.getElementById('caffeine');
            const checkboxesCaffeine = document.getElementById('checkboxes-caffeine');

            category.addEventListener('click', function () {
                if (checkboxesCategory.style.display === 'none' || checkboxesCategory.style.display === '') {
                    checkboxesCategory.style.display = 'block';
                } else {
                    checkboxesCategory.style.display = 'none';
                }
            });

            coffee_type.addEventListener('click', function () {
                if (checkboxesCoffeeType.style.display === 'none' || checkboxesCoffeeType.style.display === '') {
                    checkboxesCoffeeType.style.display = 'block';
                } else {
                    checkboxesCoffeeType.style.display = 'none';
                }
            });


            variety.addEventListener('click', function () {
                if (checkboxesVariety.style.display === 'none' || checkboxesVariety.style.display === '') {
                    checkboxesVariety.style.display = 'block';
                } else {
                    checkboxesVariety.style.display = 'none';
                }
            });

            caffeine.addEventListener('click', function () {
                if (checkboxesCaffeine.style.display === 'none' || checkboxesCaffeine.style.display === '') {
                    checkboxesCaffeine.style.display = 'block';
                } else {
                    checkboxesCaffeine.style.display = 'none';
                }
            });
        });
    </script>

@endsection
