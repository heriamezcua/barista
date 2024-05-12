@extends('layouts.admin')
@section('title', 'Products')

@section('content')
    <h1 class="page-title">Products</h1>

    <div class="container">

        <div class="text-end mb-3">
            <a href="{{route('adminpanel.products.create')}}" class="btn btn-primary">+ &nbsp; Create Product</a>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Products</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-stripped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Discount</th>
                                <th>Published</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->title}}</td>
                                    <td>
                                        @switch($product->category_id)
                                            @case(1)
                                                <p>Beans</p>
                                                @break
                                            @case(2)
                                                <p>Capsules</p>
                                                @break
                                            @case(3)
                                                <p>Machines</p>
                                                @break
                                            @case(4)
                                                <p>Accessories</p>
                                                @break
                                           @endswitch
                                    </td>
                                    <td>{{$product->price / 100}}€</td>
                                    <td>
                                        <img src="{{asset('storage/products/'. $product->image)}}" alt=""
                                             style="height: 40px">
                                    </td>
                                    <td>{{$product->discount}}%</td>
                                    <td>{{Carbon\Carbon::parse($product->created_at)->format('d/m/Y')}}</td>
                                    <td>
                                        <div class="d-flex" style="gap: 5px">
                                            <a href="{{route('adminpanel.products.edit', $product->id)}}"
                                               class="btn btn-secondary">Edit</a>
                                            <form action="{{route('adminpanel.products.destroy', $product->id)}}"
                                                  method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger text-white">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
