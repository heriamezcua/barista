@extends('layouts.master')

@section('title', $product->title)

@section('content')
    <section class="section-home">
        <div class="container">
            <h2>Single Product</h2>

            <div class="section-single">

                <x-product-single :product="$product" />

            </div>

        </div>
    </section>
@endsection
