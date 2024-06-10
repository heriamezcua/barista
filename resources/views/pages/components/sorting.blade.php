<div class="sorting">
    <form class="sorting__form" action="{{route('search.popular')}}" method="get">
        <input type="hidden" name="search" value="{{ $searchTerm }}">
        @foreach($products as $product)
            <input type="hidden" name="products[]" value="{{ $product->id }}">
        @endforeach
        <button type="submit" class="btn btn--sort {{ $active === 'popular' ? 'active' : '' }}">
            Most Popular
        </button>
    </form>

    <form class="sorting__form" action="{{route('search.lowest')}}" method="get">
        <input type="hidden" name="search" value="{{ $searchTerm }}">
        @foreach($products as $product)
            <input type="hidden" name="products[]" value="{{ $product->id }}">
        @endforeach
        <button type="submit" class="btn btn--sort {{ $active === 'lowest' ? 'active' : '' }}">
            Lowest Price
        </button>
    </form>

    <form class="sorting__form" action="{{route('search.highest')}}" method="get">
        <input type="hidden" name="search" value="{{ $searchTerm }}">
        @foreach($products as $product)
            <input type="hidden" name="products[]" value="{{ $product->id }}">
        @endforeach
        <button type="submit" class="btn btn--sort {{ $active === 'highest' ? 'active' : '' }}">
            Highest Price
        </button>
    </form>

    <form class="sorting__form" action="{{route('search.bestsellers')}}" method="get">
        <input type="hidden" name="search" value="{{ $searchTerm }}">
        @foreach($products as $product)
            <input type="hidden" name="products[]" value="{{ $product->id }}">
        @endforeach
        <button type="submit" class="btn btn--sort {{ $active === 'bestsellers' ? 'active' : '' }}">
            Bestsellers
        </button>
    </form>

    <form class="sorting__form" action="{{route('search.newest')}}" method="get">
        <input type="hidden" name="search" value="{{ $searchTerm }}">
        @foreach($products as $product)
            <input type="hidden" name="products[]" value="{{ $product->id }}">
        @endforeach
        <button type="submit" class="btn btn--sort {{ $active === 'newest' ? 'active' : '' }}">
            Newest
        </button>
    </form>
</div>
