@extends('layouts.admin')
@section('title', 'Create Product')

@section('content')
    <h1 class="page-title">Create Product</h1>
    <div class="container">
        <div class="row mb-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Create Product</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('adminpanel.products.store')}}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" id="title"
                                               class="form-control @error('title') is-invalid @enderror"
                                               value="{{old('title')}}">
                                        @error('title')
                                        <span class="invalid-feedback">
                                                <strong>{{$message}}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                </div>

                                <div class="col-md-4">

                                    <div class="form-group mb-3">
                                        <label for="category">Category</label>

                                        <select name="category" id="category"
                                                class="form-control @error('category') is-invalid @enderror">
                                            <option value="">-- Select Category --</option>
                                            <option value="beans">
                                                Beans
                                            </option>
                                            <option value="capsules">
                                                Capsules
                                            </option>
                                            <option value="machines">
                                                Machines
                                            </option>
                                            <option
                                                value="accessories">
                                                Accessories
                                            </option>
                                        </select>
                                        @error('category')
                                        <span class="invalid-feedback">
                                                <strong>{{$message}}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-md-4">

                                    <div class="form-group mb-3">
                                        <label for="price">Price</label>
                                        <input type="number" name="price" id="price"
                                               class="form-control @error('price') is-invalid @enderror"
                                               value="{{old('price')}}">
                                        @error('price')
                                        <span class="invalid-feedback">
                                                <strong>{{$message}}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            </div> <!-- row -->

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="image">Image</label>
                                        <input type="file" name="image" id="image"
                                               class="form-control @error('image') is-invalid @enderror"
                                               value="{{old('image')}}">
                                        @error('image')
                                        <span class="invalid-feedback">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="description">Discount</label>
                                        <input type="number" name="discount" id="discount" min="0" max="99" step="1" value="0"
                                               class="form-control @error('discount') is-invalid @enderror"
                                               value="{{old('discount')}}">
                                        @error('discount')
                                        <span class="invalid-feedback">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div><!-- row -->

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">Description</label> &nbsp; &nbsp;
                                        <textarea name="description" id="description" cols="30" rows="10"
                                                  class="form-control @error('description') is-invalid @enderror"
                                                  placeholder="Describe your product..."></textarea>
                                        @error('description')
                                        <span class="invalid-feedback">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div><!-- row -->


                            <div class="form-group text-end">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
