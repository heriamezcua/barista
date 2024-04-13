@extends('layouts.master')
@section('title', 'Register')
@section('content')
    <section class="section-login">
        <div class="login">
            <h2>REGISTER</h2>
                @include('pages.components.authForm')
        </div>
    </section>
@endsection
