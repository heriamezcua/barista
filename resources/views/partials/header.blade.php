<header class="header">
    {{-- Barista logo --}}
    <a href="{{route('home')}}" class="header__logo-link">
        @include('pages.components.header-logo')
    </a>

    {{-- Search form --}}
    <form action="{{route('search')}}" method="get" class="header__search">
        <input name="search" type="search" placeholder="Find your ideal coffee..." aria-label="Search"
               value="{{( isset($searchTerm) && $searchTerm !== 'All Products' ) ? $searchTerm : ''}}">
        <button class="btn text-normal text-normal" type="submit">
            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16">
                <path fill="currentColor"
                      d="m15.7 14.3l-4.2-4.2c-.2-.2-.5-.3-.8-.3c.8-1 1.3-2.4 1.3-3.8c0-3.3-2.7-6-6-6S0 2.7 0 6s2.7 6 6 6c1.4 0 2.8-.5 3.8-1.4c0 .3 0 .6.3.8l4.2 4.2c.2.2.5.3.7.3s.5-.1.7-.3c.4-.3.4-.9 0-1.3M6 10.5c-2.5 0-4.5-2-4.5-4.5s2-4.5 4.5-4.5s4.5 2 4.5 4.5s-2 4.5-4.5 4.5"/>
            </svg>
        </button>
    </form>

    {{-- Navigation --}}
    @include('pages.components.header-nav')

    {{-- Mobile --}}
    @include('pages.components.header-mobile')

</header>
