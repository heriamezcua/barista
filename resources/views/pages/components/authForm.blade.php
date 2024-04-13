<form class="form" action="{{route('register')}}" method="post">
    @csrf
    <div class="form__group">
        <label class="form__label" for="name">Name</label>
        <input type="text" id="name" name="name" class="@error('name') has-error @enderror"
               placeholder="John Doe">
        @error('name')
        <span class="form__error">{{$message}}</span>
        @enderror
    </div>

    <div class="form__group">
        <label class="form__label" for="email">Email</label>
        <input type="text" id="email" name="email" class="@error('email') has-error @enderror"
               placeholder="John@gmail.com">
        @error('email')
        <span class="form__error">{{$message}}</span>
        @enderror
    </div>

    <div class="form__group">
        <label class="form__label" for="password">Password</label>
        <input type="password" id="password" name="password"
               class="@error('password') has-error @enderror" placeholder="***********">
        @error('password')
        <span class="form__error">{{$message}}</span>
        @enderror
    </div>

    <div class="form__group">
        <label class="form__label" for="password_confirmation">Confirm Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation"
               class="@error('password_confirmation') has-error @enderror"
               placeholder="***********">
        @error('password_confirmation')
        <span class="form__error">{{$message}}</span>
        @enderror
    </div>

    <div class="form__group">
        <button type="submit" class="btn btn--form">Register</button>
    </div>

</form>
