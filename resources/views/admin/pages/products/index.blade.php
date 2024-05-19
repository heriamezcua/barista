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
                                <th>Main Image</th>
                                <th>Discount</th>
                                <th>Published</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{{ucwords($product->title)}}</td>
                                    <td>
                                        {{ucwords($product->category)}}
                                    </td>
                                    <td>{{$product->price / 100}}€</td>
                                    <td>
                                        @php
                                            // Obtain the product main image, if not found set not found image
                                            $imagesArray = json_decode($product->images);
                                            $firstImage = !empty($imagesArray) ? $imagesArray[0] : 'no-image.png';
                                            $folderName = !empty($imagesArray) ? explode('_', $firstImage)[0] : 'no-image.png';
                                        @endphp
                                        <img
                                            src="{{ !($folderName === 'no-image.png') ? asset('storage/products/' . $folderName . '/' . $firstImage) :  asset('storage/products/' . 'no-image.png') }}"
                                            alt="" style="height: 40px">
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
