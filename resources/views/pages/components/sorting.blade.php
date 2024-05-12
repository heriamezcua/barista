<div role="group" aria-label="Opciones de ordenamiento" class="d-flex justify-content-center">
    <form action="{{route('search.popular')}}" method="get">
        <input type="hidden" name="search" value="{{ $searchTerm }}">
        @foreach($products as $product)
            <input type="hidden" name="products[]" value="{{ $product->id }}">
        @endforeach
        <button type="submit" class="btn btn-primary mx-2 {{ $active === 'popular' ? 'active' : '' }}">
            Most Popular
        </button>
    </form>

    <form action="{{route('search.lowest')}}" method="get">
        <input type="hidden" name="search" value="{{ $searchTerm }}">
        @foreach($products as $product)
            <input type="hidden" name="products[]" value="{{ $product->id }}">
        @endforeach
        <button type="submit" class="btn btn-primary mx-2 {{ $active === 'lowest' ? 'active' : '' }}">
            Lowest Price
        </button>
    </form>

    <form action="{{route('search.highest')}}" method="get">
        <input type="hidden" name="search" value="{{ $searchTerm }}">
        @foreach($products as $product)
            <input type="hidden" name="products[]" value="{{ $product->id }}">
        @endforeach
        <button type="submit" class="btn btn-primary mx-2 {{ $active === 'highest' ? 'active' : '' }}">
            Highest Price
        </button>
    </form>

    <form action="{{route('search.bestsellers')}}" method="get">
        <input type="hidden" name="search" value="{{ $searchTerm }}">
        @foreach($products as $product)
            <input type="hidden" name="products[]" value="{{ $product->id }}">
        @endforeach
        <button type="submit" class="btn btn-primary mx-2 {{ $active === 'bestsellers' ? 'active' : '' }}">
            Bestsellers
        </button>
    </form>

    <form action="{{route('search.newest')}}" method="get">
        <input type="hidden" name="search" value="{{ $searchTerm }}">
        @foreach($products as $product)
            <input type="hidden" name="products[]" value="{{ $product->id }}">
        @endforeach
        <button type="submit" class="btn btn-primary mx-2 {{ $active === 'newest' ? 'active' : '' }}">
            Newest
        </button>
    </form>
</div>
