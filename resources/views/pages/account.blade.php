@extends('layouts.master')

@section('title', 'Home')

@section('content')

    <section class="section-account">

        <div class="account">

            <div class="account__user-box u-margin-bottom-big">

                <div>
                    <div class="u-margin-bottom-small">
                        <p class="heading-secondary">Welcome, {{auth()->user()->name}}</p>
                    </div>
                    <p class="text">{{auth()->user()->email}}</p>
                </div>

                <div>
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <button class="btn btn--primary">logout</button>
                    </form>
                </div>
            </div>

            <div class="account__orders u-margin-bottom-big">
                <div class="u-margin-bottom-small">
                    <h3 class="heading-tertiary">My orders</h3>
                </div>

                <table class="table u-margin-bottom-medium">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Items</th>
                        <th>Total</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>

                    @if(auth()->user()->orders && auth()->user()->orders->count())
                        @php
                            $orders = auth()->user()->orders()->paginate(10);
                        @endphp
                        @foreach($orders as $order)
                            <tr>
                                <td>{{$order->id}}</td>
                                <td>{{$order->items->count()}}</td>
                                <td>${{$order->total / 100}}</td>
                                <td>{{\Carbon\Carbon::parse($order->created_at)->format('d/m/Y H:i')}}</td>
                                <td>
                                    <span
                                        class="status status--{{$order->status}}">{{$order->status}}</span>
                                </td>
                            </tr>
                        @endforeach

                    @else
                        <tr>
                            <td colspan="5">No orders</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
                <div>
                    {{ $orders->links() }}
                </div>

            </div>

            <div class="account__reviews">


                <div class="u-margin-bottom-small">
                    <h3 class="heading-tertiary">My reviews</h3>
                </div>

                <table class="table">
                    <thead>
                    <tr>
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
                                <td><a href="{{route('product', $review->product_id)}}">{{$review->product_id}}</a></td>
                                <td>{{$review->summary}}</td>
                                <td>{{ Str::limit($review->review, 60) }}</td>
                                <td>{{$review->rating}}</td>
                                <td>{{\Carbon\Carbon::parse($review->created_at)->format('d/m/Y H:i')}}</td>
                                <td>
                                    <span
                                        class="status status--{{$review->status}}">{{($review->status == 'under_review') ? 'Under review': $review->status}}</span>
                                </td>
                                <td>
                                    <div class="actions-box">
                                        <a href="{{route('reviews.edit', $review->id)}}"
                                           class="btn btn--edit">Edit</a>
                                        <form action="{{route('reviews.destroy', $review->id)}}"
                                              method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn--delete">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">No reviews</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
