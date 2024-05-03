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
                <p class="fs-3">Orders</p>

                <table class="table">
                    <thead>
                    <tr class="table-secondary">
                        <th>ID</th>
                        <th>Items</th>
                        <th>Total</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>

                    @if(auth()->user()->orders && auth()->user()->orders->count())
                        @foreach(auth()->user()->orders as $order)
                            <tr>
                                <td>{{$order->id}}</td>
                                <td>{{$order->items->count()}}</td>
                                <td>${{$order->total / 100}}</td>
                                <td>{{\Carbon\Carbon::parse($order->created_at)->format('d/m/Y')}}</td>
                                <td>{{$order->status}}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" style="text-align: center">No orders</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </section>


        </div>
    </div>
@endsection
