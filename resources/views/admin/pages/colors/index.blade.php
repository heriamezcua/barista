@extends('layouts.admin')
@section('title', 'Colors')

@section('content')
    <h1 class="page-title">Colors</h1>

    <div class="container">

        <div class="text-end mb-3">
            <a href="{{route('adminpanel.colors.create')}}" class="btn btn-primary">+ &nbsp; Create Color</a>
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

    </div>
@endsection
