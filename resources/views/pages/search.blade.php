@extends('layouts.master')

@section('title', 'Search | Barista.com')

@section('content')

    <div class="container">
        <div class="row mt-3">
            @if($searchTerm == '')
                <h2>All Products</h2>
            @elseif(!$numResults)
                <h2>No results found for "{{$searchTerm}}"</h2>
            @elseif($numResults===1)
                <h2>1 result for "{{$searchTerm}}"</h2>
            @else
                <h2>{{$numResults}} results for "{{$searchTerm}}"</h2>
            @endif
        </div>

        <div class="row mt-3">
            <div class="col-md-2" style="border: 1px solid blue;">
                @include('pages.components.sidebarFilters')
            </div>

            <div class="col-md-10" style="border: 1px solid red;">
                <div class="row">
                    @include('pages.components.sorting')
                </div>
                <div class="featured d-flex mt-4">

                    @foreach($products as $product)

                        <x-product-card :product="$product"/>

                    @endforeach

                </div>
                <div class="mt-3">
                    {{ $products->withQueryString()->links() }}
                </div>
            </div>
        </div>


    </div>

@endsection
