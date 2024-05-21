@extends('layouts.admin')
@section('title', 'Create Color')

@section('content')
    <h1 class="page-title">Create Color</h1>
    <div class="container">
        <div class="row mb-5">
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
        </div>
@endsection
