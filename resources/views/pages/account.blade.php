@extends('layouts.master')

@section('title', 'Home')

@section('content')
    <h2>ACCOUNT</h2>


    {{-- Logout btn --}}
    @auth
        <form action="{{route('logout')}}" method="post">
            @csrf
            <button class="btn btn-danger">Logout</button>
        </form>
    @endauth
@endsection
