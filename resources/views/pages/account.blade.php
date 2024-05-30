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
                <p class="fs-3">Recent Orders</p>

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

            <section class="py-3">
                <h2>Recent reviews</h2>

                <table class="table">
                    <thead>
                    <tr class="table-secondary">
                        <th>Product</th>
                        <th>Summary</th>
                        <th>Review</th>
                        <th>Rating</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    @if(auth()->user()->reviews && auth()->user()->reviews->count())
                        @foreach(auth()->user()->reviews as $review)
                            <tr>
                                <td>{{$review->product_id}}</td>
                                <td>{{$review->summary}}</td>
                                <td>{{ Str::limit($review->review, 60) }}</td>
                                <td>{{$review->rating}}</td>
                                <td>{{\Carbon\Carbon::parse($review->created_at)->format('d/m/Y')}}</td>
                                <td>
                                    <span>{{($review->status == 'under_review') ? 'Under review': $review->status}}</span>
                                </td>
                                <td>
                                    <div class="d-flex" style="gap: 5px">
                                        <a href="{{route('reviews.edit', $review->id)}}"
                                           class="btn btn-secondary">Edit</a>
                                        <form action="{{route('reviews.destroy', $review->id)}}"
                                              method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger text-white">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" style="text-align: center">No reviews</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </section>

        </div>
    </div>
@endsection
