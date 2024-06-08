<!-- PRODUCT -->
<div class="product">
    <div class="product__img-box">
        <a href="{{route('product', $product->id)}}">
            @if(auth()->check() && auth()->user()->wishlist->contains($product))
                <form action="{{route('removeFromWishlist', $product->id)}}" method="post">
                    @csrf
                    <button type="submit" class="product__wish-icon product__wish-icon--included">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path fill="#ff0000"
                                  d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.27 2 8.5 2 5.41 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.08C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.41 22 8.5c0 3.77-3.4 6.86-8.55 11.53L12 21.35z"/>
                        </svg>
                    </button>
                </form>
            @else
                <form action="{{route('addToWishlist', $product->id)}}" method="post">
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
            @php
                // Obtain the product main image, if not found set not found image
                $imagesArray = json_decode($product->images);
                $firstImage = !empty($imagesArray) ? $imagesArray[0] : 'no-image.png';
                $folderName = !empty($imagesArray) ? explode('_', $firstImage)[0] : 'no-image.png';
            @endphp
            <div class="product__img"
                 style="background-image: url({{ !($folderName === 'no-image.png') ? asset('storage/products/' . $folderName . '/' . $firstImage) :  asset('storage/products/' . 'no-image.png') }})">
            </div>
                <!-- discount -->
                @if($product->discount)
                    <div class="product-single__discount-box">
                        <p class="product-single__discount">-{{$product->discount}}%</p>
                    </div>
                @endif
        </a>
    </div>
    <div class="product__content">
        <div class="product__content--1">
            <p class="product__title u-margin-bottom-small">{{ucfirst(strtolower($product->title))}}</p>
            <div class="product__rating-box u-margin-bottom-small">
                <div class="product__rating u-display-flex u-align-center">
                    @php
                        // Calc the avg rating based in the reviews of the product
                        $approvedReviews = $product->reviews->where('status', 'approved');
                        $totalReviews = $approvedReviews->count();
                        $rating = $totalReviews ? round($approvedReviews->avg('rating'), 2) : 0;
                    @endphp

                    @for ($i = 0; $i < round($rating); $i++)
                        <div class="main-star full">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path fill="currentcolor"
                                      d="m5.825 21l1.625-7.025L2 9.25l7.2-.625L12 2l2.8 6.625l7.2.625l-5.45 4.725L18.175 21L12 17.275z"/>
                            </svg>
                        </div>
                    @endfor
                    @for ($i = round($rating) + 1; $i <= 5; $i++)
                        <div class="main-star">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                      d="m12 15.39l-3.76 2.27l.99-4.28l-3.32-2.88l4.38-.37L12 6.09l1.71 4.04l4.38.37l-3.32 2.88l.99 4.28M22 9.24l-7.19-.61L12 2L9.19 8.63L2 9.24l5.45 4.73L5.82 21L12 17.27L18.18 21l-1.64-7.03z"/>
                            </svg>
                        </div>
                    @endfor
                </div>
                <p class="product__reviews">
                    ({{$totalReviews}})
                </p>
            </div>
            <p class="product__category u-margin-bottom-small">{{ ucwords($product->category) }}</p>
        </div>
        <div class="product__content--2">
{{--            <p class="product__price">{{$product->price / 100}} €</p>--}}

            @if($product->discount !== 0)
                <div class="product__price">
                    <del>
                        <span class="amount">{{intdiv($product->price, 100)}},<sup>{{str_pad($product->price%100, 2, '0', STR_PAD_LEFT)}}€</sup></span>
                    </del>
                    <ins>
                        <span class="amount">{{intdiv(($product->price - ($product->price * ($product->discount/100))), 100)}},<sup>{{str_pad(($product->price - ($product->price * ($product->discount/100)))%100, 2, '0', STR_PAD_LEFT)}}€</sup></span>
                    </ins>
                </div>
            @else
                <div class="product__price">
                    <p>{{intdiv($product->price, 100)}},{{str_pad($product->price%100, 2, '0', STR_PAD_LEFT)}}€</p>
                </div>
            @endif
        </div>
    </div>
</div>
