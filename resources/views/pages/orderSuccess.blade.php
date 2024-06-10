@extends('layouts.master')
@section('title', 'Success')
@section('content')

    <div class="section-success">

        <div class="success">

            <div class="u-margin-bottom-medium">
                <h2 class="heading-secondary">Your Order Has Successfully Been Placed</h2>
            </div>

            <div class="success__text-box u-margin-bottom-medium">
                <p class="success__text">Your order ID is: <span class="success__id">{{$order->id}}</span></p>
            </div>

            <a href="{{route('home')}}" class="btn btn--primary">Continue shopping</a>

        </div>

    </div>
@endsection
