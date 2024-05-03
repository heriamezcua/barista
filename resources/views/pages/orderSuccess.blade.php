@extends('layouts.master')
@section('title', 'Success')
@section('content')
    <header class="page-header text-center">
        <h1>Order Successfully Placed</h1>
    </header>

    <section class="page-success mt-3">
        <div class="container text-center">
            <h1 class="fs-3">Your Order Has Successfully Been Placed</h1>
            <h2 class="fs-2" style="color: #3a1c09">Your order ID is: {{$order->id}}</h2>
        </div>
    </section>

@endsection
