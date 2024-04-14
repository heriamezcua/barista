<form class="form" action="{{route('login')}}" method="post">
    @csrf
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
        <button type="submit" class="btn btn--form">Login</button>
    </div>
</form>
