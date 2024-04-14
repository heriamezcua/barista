@extends('layouts.master')

@section('title', 'Home')

@section('content')
    <div>HOME</div>

    // Logout btn
    @auth
        <form action="{{route('logout')}}" method="post">
            @csrf
            <button class="btn btn--logout">Logout</button>
        </form>
    @endauth

@endsection
