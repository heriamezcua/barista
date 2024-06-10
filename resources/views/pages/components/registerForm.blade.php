@extends('layouts.master')
@section('title', 'Register')
@section('content')
    <section class="login-page">
        <div class="login-form-box">
            <div class="login-title">Register</div>
            <div class="login-form">
                <form action="{{route('register')}}" method="post">
                    @csrf
                    <div class="field">
                        <div class="u-margin-bottom-small">
                            <label for="name">Name</label>
                        </div>
                        <input type="text" id="name" name="name" class="@error('name') has-error @enderror"
                               placeholder="John Doe">
                        @error('name')
                        <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="field">
                        <div class="u-margin-bottom-small">
                            <label for="email">Email</label>
                        </div>
                        <input type="text" id="email" name="email" class="@error('email') has-error @enderror"
                               placeholder="John@gmail.com">
                        @error('email')
                        <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="field">
                        <div class="u-margin-bottom-small">
                            <label for="password">Password</label>
                        </div>
                        <input type="password" id="password" name="password"
                               class="@error('password') has-error @enderror" placeholder="***********">
                        @error('password')
                        <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="field">
                        <div class="u-margin-bottom-small">
                            <label for="password_confirmation">Confirm Password</label>
                        </div>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                               class="@error('password_confirmation') has-error @enderror"
                               placeholder="***********">
                        @error('password_confirmation')
                        <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="field">
                        <button type="submit" class="btn btn--primary">Register</button>
                    </div>

                    <p class="form__text">
                        Already have an account?
                        <a class="btn" href="{{route('login')}}"> Login!</a>
                    </p>

                </form>
            </div>
        </div>
    </section>
@endsection
