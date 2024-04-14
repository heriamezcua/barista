@extends('layouts.master')

@section('title', 'Login')

@section('content')
    <section class="section-login">
        <div class="login">
            <h2>LOGIN</h2>
            @include('pages.components.loginForm')
        </div>
    </section>
@endsection
