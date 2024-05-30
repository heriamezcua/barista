@extends('layouts.admin')
@section('title', 'Colors')

@section('content')
    <h1 class="page-title">Colors</h1>

    <div class="container">

        <div class="row">
            <div class="col-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Create Color</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('adminpanel.color.store')}}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name"
                                               class="form-control @error('name') is-invalid @enderror"
                                               value="{{old('name')}}">
                                        @error('name')
                                        <span class="invalid-feedback">
                                                <strong>{{$message}}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label for="code">Code</label>
                                    <input style="height: 50px" type="color" name="code" id="code"
                                           class="form-control @error('code') is-invalid @enderror"
                                           value="{{old('code')}}">
                                    @error('code')
                                    <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div> <!-- row -->
                            <div class="form-group text-end">
                                <button type="submit" class="btn btn-primary mt-4">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-9">
                <div class="card">
                    <div class="card-header">
                        <h5>Products</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-stripped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($colors as $color)
                                <tr>
                                    <td>{{$color->id}}</td>
                                    <td>{{ucwords($color->name)}}</td>
                                    <td class="d-flex align-items-center">
                                        {{strtolower($color->code)}}
                                        <div
                                            style="margin-left: 20px; width: 50px; height: 50px; border-radius: 100%; background-color:{{$color->code}}"></div>
                                    </td>
                                    <td>{{Carbon\Carbon::parse($color->created_at)->format('d/m/Y')}}</td>
                                    <td>
                                        <form action="{{route('adminpanel.color.destroy', $color->id)}}"
                                              method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger text-white">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
@endsection
