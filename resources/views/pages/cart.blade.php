@extends('layouts.master')

@section('title', 'Home')

@section('content')
    <header class="page-header text-center">
        <h1 class="p-2 mt-1">Cart</h1>
        <h3 class="cart-amount my-3"><span>Total: </span>${{App\Models\Cart::totalAmount()}}</h3>
    </header>

    @if (session()->has ('success'))
        <section class="pop-up">
            <div class="pop-up-box">
                <div class="pop-up-title">
                    {{session()->get('success')}}
                </div>
                <div class="pop-up-actions">
                    <a href="{{route('home')}}" class="btn btn-outlined">Continue Shopping</a>
                    <a href="{{route('checkout')}}" class="btn btn-primary">Checkout!</a>
                </div>
            </div>
        </section>
    @endif

    <main class="cart-page">
        <div class="container">
            <div class="cart-table">
                <table class="table">
                    <thead class="fs-5">
                    <tr class="table-dark">
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody class="fs-5">
                    @if(session()->has('cart') && count(session()->get('cart')) > 0)
                        @foreach(session()->get('cart') as $key => $item)
                            <tr>
                                <td>
                                    <a href="{{route('product', $item['product']['id'])}}" class="link-dark">
                                        <img src="{{asset('storage/products/' . $item['product']['image'])}}" alt=""
                                             height="100px">
                                        <p>{{$item['product']['title']}}</p>
                                    </a>
                                </td>
                                <td>${{$item['product']['price'] / 100}}</td>
                                <td>{{$item['quantity']}}</td>
                                <td>${{App\Models\Cart::unitPrice($item)}}</td>
                                <td>
                                    <form action="{{route('removeFromCart', $key)}}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">X</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        <tr class="cart-total">
                            <td colspan="4" style="text-align: right">Total</td>
                            <td>${{App\Models\Cart::totalAmount()}}</td>
                        </tr>
                    @else
                        <tr>
                            <td colspan="6" class="empty-cart">Your Cart Is Empty</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>

            <div class="cart-actions">
                <a href="{{route('checkout')}}" class="btn btn-primary">Go To Checkout</a>
            </div>

        </div>
    </main>
@endsection
