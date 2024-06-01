<nav class="header__nav">
    <ul class="header__list">
        <li class="header__item">
            <a class="header__link" href="{{route('wishlist')}}">
                @auth
                    <span class="header__icon"
                          style="font-size: 14px; width: 20px; text-align: center; padding: 0.05rem .15rem; position: absolute; right: -0.5rem; top: -0.5rem; border-radius: 4px; background-color: white; color: black;">{{count(auth()->user()->wishlist)}}</span>
                @endauth
                <svg class="header__icon" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                     viewBox="0 0 24 24">
                    <path fill="currentColor"
                          d="m12 21.35l-1.45-1.32C5.4 15.36 2 12.27 2 8.5C2 5.41 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.08C13.09 3.81 14.76 3 16.5 3C19.58 3 22 5.41 22 8.5c0 3.77-3.4 6.86-8.55 11.53z"/>
                </svg>
            </a>
        </li>
        <li class="header__item">
            <a class="header__link" href="{{route('cart')}}" style="position: relative;">
                @if(session()->has('cart') && count(session('cart')) !== 0)
                    <span class="header__icon-number">
                                {{session()->has('cart') ? count(session('cart')) : 0}}
                        </span>
                @endif

                <svg class="header__icon" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                     viewBox="0 0 24 24">
                    <path fill="currentColor"
                          d="M17 18c-1.11 0-2 .89-2 2a2 2 0 0 0 2 2a2 2 0 0 0 2-2a2 2 0 0 0-2-2M1 2v2h2l3.6 7.59l-1.36 2.45c-.15.28-.24.61-.24.96a2 2 0 0 0 2 2h12v-2H7.42a.25.25 0 0 1-.25-.25q0-.075.03-.12L8.1 13h7.45c.75 0 1.41-.42 1.75-1.03l3.58-6.47c.07-.16.12-.33.12-.5a1 1 0 0 0-1-1H5.21l-.94-2M7 18c-1.11 0-2 .89-2 2a2 2 0 0 0 2 2a2 2 0 0 0 2-2a2 2 0 0 0-2-2"/>
                </svg>
            </a>
        </li>
        <li class="header__item">
            <a class="header__link" href="{{route('account')}}">
                <svg class="header__icon" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                     viewBox="0 0 24 24">
                    <path fill="currentColor"
                          d="M12 4a4 4 0 0 1 4 4a4 4 0 0 1-4 4a4 4 0 0 1-4-4a4 4 0 0 1 4-4m0 10c4.42 0 8 1.79 8 4v2H4v-2c0-2.21 3.58-4 8-4"/>
                </svg>
            </a>
        </li>
    </ul>
</nav>
