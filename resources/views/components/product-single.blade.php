<div class="product-single">

    <div class="product-single__img-box">
        @php
            // Obtain the product main image, if not found set not found image
            $imagesArray = json_decode($product->images);
            $firstImage = !empty($imagesArray) ? $imagesArray[0] : 'no-image.png';
            $folderName = !empty($imagesArray) ? explode('_', $firstImage)[0] : 'no-image.png';
        @endphp
        @if($imagesArray)

            @foreach($imagesArray as $index => $image)
                {{-- first image set as main image --}}
                @if(!$index)
                    <div class="product-single__main-img-box u-margin-bottom-small">
                        <!-- btn left -->
                        <span class="chev-box chev-box--left" onclick="changeImg(-1)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24"><path
                                    fill="currentColor" d="M15.41 16.58L10.83 12l4.58-4.59L14 6l-6 6l6 6z"/></svg>
                        </span>
                        <div class="product-single__main-img"
                             style="background-image: url({{ !($folderName === 'no-image.png') ? asset('storage/products/' . $folderName . '/' . $firstImage) :  asset('storage/products/' . 'no-image.png') }});"
                             aria-label="{{$product->title}}"></div>
                        <!-- btn right -->
                        <span class="chev-box chev-box--right" onclick="changeImg(1)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24"><path
                                    fill="currentColor" d="M8.59 16.58L13.17 12L8.59 7.41L10 6l6 6l-6 6z"/></svg>
                        </span>
                    </div>
                    {{-- open the carousel tag --}}
                    <div class="product-single__img-carousel">
                        <div class="product-single__sec-img product-single__sec-img--active"
                             style="background-image: url({{ !($folderName === 'no-image.png') ? asset('storage/products/' . $folderName . '/' . $image) :  asset('storage/products/' . 'no-image.png') }});"></div>
                        @else
                            <div class="product-single__sec-img"
                                 style="background-image: url({{ !($folderName === 'no-image.png') ? asset('storage/products/' . $folderName . '/' . $image) :  asset('storage/products/' . 'no-image.png') }});"></div>
                        @endif
                        @endforeach
                        {{-- close the carousel tag --}}
                    </div>

                @else

                    <div class="product-single__main-img-box u-margin-bottom-small">
                        <!-- btn left -->
                        <span class="chev-box chev-box--left">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24"><path
                                    fill="currentColor" d="M15.41 16.58L10.83 12l4.58-4.59L14 6l-6 6l6 6z"/></svg>
                        </span>
                        <div class="product-single__main-img"
                             style="background-image: url({{ !($folderName === 'no-image.png') ? asset('storage/products/' . $folderName . '/' . $firstImage) :  asset('storage/products/' . 'no-image.png') }});"
                             aria-label="{{$product->title}}"></div>
                        <!-- btn right -->
                        <span class="chev-box chev-box--right">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24"><path
                                    fill="currentColor" d="M8.59 16.58L13.17 12L8.59 7.41L10 6l6 6l-6 6z"/></svg>
                        </span>
                    </div>
                    <div class="product-single__img-carousel">
                        <div class="product-single__sec-img"
                             style="background-image: url({{ !($folderName === 'no-image.png') ? asset('storage/products/' . $folderName . '/' . $firstImage) :  asset('storage/products/' . 'no-image.png') }});"></div>
                    </div>

                @endif

    </div>

    <div class="product-single__text-box">
        @if(auth()->check() && auth()->user()->wishlist->contains($product))
            <form class="u-margin-bottom-samll" action="{{route('removeFromWishlist', $product->id)}}" method="post">
                @csrf
                <button type="submit" class="product__wish-icon product__wish-icon--included">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path fill="#ff0000"
                              d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.27 2 8.5 2 5.41 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.08C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.41 22 8.5c0 3.77-3.4 6.86-8.55 11.53L12 21.35z"/>
                    </svg>
                </button>
            </form>
        @else
            <form class="u-margin-bottom-small" action="{{route('addToWishlist', $product->id)}}" method="post">
                @csrf
                <button type="submit" class="product__wish-icon product__wish-icon--excluded">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path fill="#222222"
                              d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.27 2 8.5 2 5.41 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.08C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.41 22 8.5c0 3.77-3.4 6.86-8.55 11.53L12 21.35z"/>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path fill="#ff0000"
                              d="m12.1 18.55l-.1.1l-.11-.1C7.14 14.24 4 11.39 4 8.5C4 6.5 5.5 5 7.5 5c1.54 0 3.04 1 3.57 2.36h1.86C13.46 6 14.96 5 16.5 5c2 0 3.5 1.5 3.5 3.5c0 2.89-3.14 5.74-7.9 10.05M16.5 3c-1.74 0-3.41.81-4.5 2.08C10.91 3.81 9.24 3 7.5 3C4.42 3 2 5.41 2 8.5c0 3.77 3.4 6.86 8.55 11.53L12 21.35l1.45-1.32C18.6 15.36 22 12.27 22 8.5C22 5.41 19.58 3 16.5 3"/>
                    </svg>
                </button>
            </form>
        @endif

        <div class="u-margin-bottom-small">
            <p class="product-single__title">{{ucfirst(strtolower($product->title))}}</p>
        </div>

        <div class="product-single__rating-box u-margin-bottom-small">
            <div class="product-single__rating">
                <svg xmlns="http://www.w3.org/2000/svg" width="1.25em" height="1.5em"
                     viewBox="0 0 24 24">
                    <path fill="currentColor"
                          d="m5.825 21l1.625-7.025L2 9.25l7.2-.625L12 2l2.8 6.625l7.2.625l-5.45 4.725L18.175 21L12 17.275z"/>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="1.25em" height="1.5em"
                     viewBox="0 0 24 24">
                    <path fill="currentColor"
                          d="m5.825 21l1.625-7.025L2 9.25l7.2-.625L12 2l2.8 6.625l7.2.625l-5.45 4.725L18.175 21L12 17.275z"/>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="1.25em" height="1.5em"
                     viewBox="0 0 24 24">
                    <path fill="currentColor"
                          d="m5.825 21l1.625-7.025L2 9.25l7.2-.625L12 2l2.8 6.625l7.2.625l-5.45 4.725L18.175 21L12 17.275z"/>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="1.25em" height="1.5em"
                     viewBox="0 0 24 24">
                    <path fill="currentColor"
                          d="m5.825 21l1.625-7.025L2 9.25l7.2-.625L12 2l2.8 6.625l7.2.625l-5.45 4.725L18.175 21L12 17.275z"/>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="1.25em" height="1.5em"
                     viewBox="0 0 24 24">
                    <path fill="currentColor"
                          d="m5.825 21l1.625-7.025L2 9.25l7.2-.625L12 2l2.8 6.625l7.2.625l-5.45 4.725L18.175 21L12 17.275z"/>
                </svg>
            </div>
            <p class="product-single__reviews">
                (127)
            </p>
        </div>

        <form action="{{route('addToCart',  $product->id)}}" method="post">

            <div class="properties">
                <div class="property">
                    @if($product->category === 'beans')
                        <label for="format">Format:</label>
                        <select name="format" id="quantity">
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    @endif

                </div>
                <div class="product-single__property">

                </div>
            </div>
        </form>

    </div>

</div>


<!-- script for product image carousel -->
<script>
    function changeImg(direction) {
        // Select elements
        const mainImgEl = document.querySelector('.product-single__main-img');
        const secImgEls = document.querySelectorAll('.product-single__sec-img');
        const totalSecImgs = secImgEls.length;

        let activeIndex = -1;

        // Find the active image
        secImgEls.forEach((img, index) => {
            if (img.classList.contains('product-single__sec-img--active')) {
                img.classList.remove('product-single__sec-img--active');
                activeIndex = index;
            }
        });

        // Change the active index
        if (direction === -1) {
            activeIndex = (activeIndex === 0) ? totalSecImgs - 1 : activeIndex - 1;
        } else if (direction === 1) {
            activeIndex = (activeIndex === totalSecImgs - 1) ? 0 : activeIndex + 1;
        }

        // Apply the active class and change the main image
        if (activeIndex === -1) {
            const lastImgIndex = totalSecImgs - 1;
            secImgEls[lastImgIndex].classList.add('product-single__sec-img--active');
            mainImgEl.style.backgroundImage = secImgEls[lastImgIndex].style.backgroundImage;
        } else if (activeIndex >= 0 && activeIndex < totalSecImgs) {
            secImgEls[activeIndex].classList.add('product-single__sec-img--active');
            mainImgEl.style.backgroundImage = secImgEls[activeIndex].style.backgroundImage;
        }
    }
</script>


{{--<div class="container">--}}
{{--            <div class="row d-flex align-items-center">--}}
{{--                <div class="col-md-6">--}}
{{--                    <h4 class="mt-3"--}}
{{--                        style="background-color: #3a1c09; color: #fff; max-width: fit-content; padding: 10px; border-radius: 3px">--}}
{{--                        -{{$product->discount}}%</h4>--}}
{{--                </div>--}}
{{--                <div class="col-md-6">--}}
{{--                    @if(auth()->check() && auth()->user()->wishlist->contains($product))--}}
{{--                        <form action="{{route('removeFromWishlist', $product->id)}}" method="post">--}}
{{--                            @csrf--}}
{{--                            <button type="submit" style="border: none; background: none">--}}
{{--                                <svg xmlns="http://www.w3.org/2000/svg"--}}
{{--                                     width="32px"--}}
{{--                                     viewBox="0 0 24 24">--}}
{{--                                    <path fill="#ff0000"--}}
{{--                                          d="m12 21.35l-1.45-1.32C5.4 15.36 2 12.27 2 8.5C2 5.41 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.08C13.09 3.81 14.76 3 16.5 3C19.58 3 22 5.41 22 8.5c0 3.77-3.4 6.86-8.55 11.53z"/>--}}
{{--                                </svg>--}}
{{--                            </button>--}}
{{--                        </form>--}}
{{--                    @else--}}
{{--                        <form action="{{route('addToWishlist', $product->id)}}" method="post">--}}
{{--                            @csrf--}}
{{--                            <button type="submit" style="border: none; background: none">--}}
{{--                                <svg xmlns="http://www.w3.org/2000/svg"--}}
{{--                                     width="32px" viewBox="0 0 24 24">--}}
{{--                                    <path fill="#ff0000"--}}
{{--                                          d="m12.1 18.55l-.1.1l-.11-.1C7.14 14.24 4 11.39 4 8.5C4 6.5 5.5 5 7.5 5c1.54 0 3.04 1 3.57 2.36h1.86C13.46 6 14.96 5 16.5 5c2 0 3.5 1.5 3.5 3.5c0 2.89-3.14 5.74-7.9 10.05M16.5 3c-1.74 0-3.41.81-4.5 2.08C10.91 3.81 9.24 3 7.5 3C4.42 3 2 5.41 2 8.5c0 3.77 3.4 6.86 8.55 11.53L12 21.35l1.45-1.32C18.6 15.36 22 12.27 22 8.5C22 5.41 19.58 3 16.5 3"/>--}}
{{--                                </svg>--}}
{{--                            </button>--}}

{{--                        </form>--}}
{{--                    @endif--}}
{{--                </div>--}}
{{--            </div>--}}


{{--            <div class="d-flex flex-row user-ratings">--}}
{{--                <div class="ratings">--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">--}}
{{--                        <path fill="currentColor"--}}
{{--                              d="m5.825 21l1.625-7.025L2 9.25l7.2-.625L12 2l2.8 6.625l7.2.625l-5.45 4.725L18.175 21L12 17.275z"/>--}}
{{--                    </svg>--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">--}}
{{--                        <path fill="currentColor"--}}
{{--                              d="m5.825 21l1.625-7.025L2 9.25l7.2-.625L12 2l2.8 6.625l7.2.625l-5.45 4.725L18.175 21L12 17.275z"/>--}}
{{--                    </svg>--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">--}}
{{--                        <path fill="currentColor"--}}
{{--                              d="m5.825 21l1.625-7.025L2 9.25l7.2-.625L12 2l2.8 6.625l7.2.625l-5.45 4.725L18.175 21L12 17.275z"/>--}}
{{--                    </svg>--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">--}}
{{--                        <path fill="currentColor"--}}
{{--                              d="m5.825 21l1.625-7.025L2 9.25l7.2-.625L12 2l2.8 6.625l7.2.625l-5.45 4.725L18.175 21L12 17.275z"/>--}}
{{--                    </svg>--}}
{{--                </div>--}}

{{--                <a href="#" class="text-sencondary px-2">3 reviews</a>--}}
{{--            </div>--}}

{{--            <h2 class="text-secondary mt-3">{{ucwords($product->title)}}</h2>--}}

{{--            <h4 class="text-tertiary mt-3">{{ucwords($product->category)}}</h4>--}}

{{--            <p class="mt-3">{{$product->description}}</p>--}}

{{--            <form action="{{route('addToCart',  $product->id)}}" method="post">--}}
{{--                @csrf--}}

{{--                <div class="row d-flex align-items-center justify-content-between mt-4">--}}
{{--                    <div class="col-md-6">--}}
{{--                        <div class="d-flex align-items-center">--}}
{{--                            <p class="m-0">Quantity:</p>--}}
{{--                            <select style="width: 50px" class="mx-2" name="quantity" id="quantity">--}}
{{--                                <option value="1">1</option>--}}
{{--                                <option value="2">2</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="col-md-6">--}}
{{--                        <h2 class="text-tertiary mt-3">{{$product->price / 100}}€</h2>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="row mt-4">--}}
{{--                    <div class="col-md-6">--}}
{{--                        <button class="btn"--}}
{{--                                style="width: 100%; background-color: #8d4c1e; color: white; font-weight: 500">--}}
{{--                            Add to cart--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-6">--}}
{{--                        <button class="btn" style="width: 100%; border: 2px solid #8d4c1e; font-weight: 500">Buy it--}}
{{--                            now--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </form>--}}

{{--        </div>--}}
{{--    </div>--}}

{{--</div>--}}
