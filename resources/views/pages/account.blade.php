@extends('layouts.master')

@section('title', 'Home')

@section('content')
    <section class="section-wishlist">
        <div class="container">
            <h2>Account</h2>


            {{-- Logout btn --}}
            @auth
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button class="btn btn-danger">Logout</button>
                </form>
            @endauth
        </div>
    </section>
@endsection
