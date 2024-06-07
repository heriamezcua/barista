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

                        <!-- discount -->
                        @if($product->discount)
                            <div class="product-single__discount-box">
                                <p class="product-single__discount">-{{$product->discount}}%</p>
                            </div>
                        @endif

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
            <form class="u-margin-bottom-small" action="{{route('removeFromWishlist', $product->id)}}" method="post">
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

        <div class="product-single__rating-box u-margin-bottom-big">
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
            @csrf
            <div class="properties u-margin-bottom-medium">
                <div class="property">
                    @if($product->category === 'beans')
                        <div class="u-margin-bottom-small">
                            <label for="format">Format:</label>
                            <span>{{$product->bean->format != 250  ? $product->bean->format/1000 . 'kg' : $product->bean->format .'g'}}</span>
                        </div>
                    @endif
                </div>
                <div class="property">
                    @if($product->category === 'beans')
                        <div class="u-margin-bottom-small">
                            @if($product->bean->type === 'specialty')
                                <div class="property__bean-icon-box">
                                    <p>Specialty</p>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="36px" height="36px"
                                         viewBox="0 0 32 32">
                                        <g fill="currentColor">
                                            <path
                                                d="M13.768 20.51a.459.459 0 0 0-.327.563a2.128 2.128 0 0 1-.973 2.402a.44.44 0 0 0-.19.221a.463.463 0 0 0 .663.57a3.05 3.05 0 0 0 1.272-1.48a3.038 3.038 0 0 0 .118-1.95a.459.459 0 0 0-.214-.278a.447.447 0 0 0-.35-.048"/>
                                            <path
                                                d="M10.498 30.427a5.156 5.156 0 0 0 2.742.532a6.7 6.7 0 0 0 5.7-4.176l1.86-4.589a6.687 6.687 0 0 0-1.176-6.958a5.158 5.158 0 0 0-4.712-1.7a5.09 5.09 0 0 0-3.9 3.011l-.053.117a5.425 5.425 0 0 0-.217 3.472a.993.993 0 0 1-.452 1.118a5.372 5.372 0 0 0-2.254 2.62L7.984 24a5.089 5.089 0 0 0 .69 4.894a5.155 5.155 0 0 0 1.824 1.533m2.056-8.908a3.015 3.015 0 0 0 .12-1.905l-.013.003a3.443 3.443 0 0 1 .12-2.165l.048-.1a3.06 3.06 0 0 1 2.38-1.844a3.166 3.166 0 0 1 2.9 1.043a4.7 4.7 0 0 1 .826 4.891l-1.86 4.588a4.708 4.708 0 0 1-4 2.935a3.17 3.17 0 0 1-2.8-1.27a3.038 3.038 0 0 1-.449-2.917l.055-.132c.28-.701.784-1.29 1.434-1.675c.56-.337.994-.846 1.24-1.452m12.3-13.379a.453.453 0 0 0-.324-.256a.468.468 0 0 0-.345.067a.458.458 0 0 0-.199.291c-.14.663-.06 1.332.224 1.94a3.032 3.032 0 0 0 1.352 1.41a.46.46 0 0 0 .429-.814a2.136 2.136 0 0 1-1.101-2.347a.478.478 0 0 0-.036-.291"/>
                                            <path
                                                d="M25.687 18.337h.127a5.162 5.162 0 0 0 4.314-2.315a5.093 5.093 0 0 0 .42-4.922L30.5 11a5.394 5.394 0 0 0-2.4-2.512a1 1 0 0 1-.515-1.095a5.427 5.427 0 0 0-.407-3.454l-.05-.1a5.091 5.091 0 0 0-4.065-2.811a5.16 5.16 0 0 0-4.61 1.953A6.7 6.7 0 0 0 17.658 10l2.111 4.48a6.692 6.692 0 0 0 5.917 3.857M21.135 3.319A3.17 3.17 0 0 1 22.525 3a3.143 3.143 0 0 1 2.834 1.768l.011.024a3.44 3.44 0 0 1 .26 2.188a2.98 2.98 0 0 0 1.542 3.276a3.481 3.481 0 0 1 1.552 1.658a3.064 3.064 0 0 1-.258 3a3.2 3.2 0 0 1-2.73 1.422a4.7 4.7 0 0 1-4.158-2.709l-2.11-4.479a4.706 4.706 0 0 1 .557-4.932c.297-.38.676-.686 1.11-.897M9.182 7.016a.468.468 0 0 1 .39-.131c.122.016.231.08.298.182a.458.458 0 0 1 .09.34a3.046 3.046 0 0 1-.868 1.748a3.047 3.047 0 0 1-1.748.868a.461.461 0 1 1-.125-.913a2.13 2.13 0 0 0 1.832-1.832a.468.468 0 0 1 .131-.262"/>
                                            <path
                                                d="M4.553 16.613a6.676 6.676 0 0 0 6.875-1.631l3.5-3.5a6.689 6.689 0 0 0 1.63-6.874a5.172 5.172 0 0 0-3.686-3.4a5.11 5.11 0 0 0-4.789 1.283l-.09.093a5.438 5.438 0 0 0-1.525 3.085a1 1 0 0 1-.853.855A5.385 5.385 0 0 0 2.51 8.068l-.086.089a5.092 5.092 0 0 0-1.27 4.776a5.16 5.16 0 0 0 3.4 3.68M8.448 5.948c.104-.749.45-1.442.985-1.976l.05-.053a3.066 3.066 0 0 1 2.91-.769a3.182 3.182 0 0 1 2.262 2.093a4.7 4.7 0 0 1-1.145 4.828l-3.5 3.5a4.695 4.695 0 0 1-4.827 1.144a3.172 3.172 0 0 1-2.089-2.262a3.1 3.1 0 0 1 .824-2.965a3.408 3.408 0 0 1 1.973-.983a2.979 2.979 0 0 0 2.557-2.557"/>
                                        </g>
                                    </svg>
                                </div>

                            @else

                                <div class="property__bean-icon-box">
                                    <p>Blend</p>

                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <g fill="none" stroke="currentColor" stroke-linecap="round"
                                           stroke-linejoin="round" stroke-width="1.5" color="currentColor">
                                            <path
                                                d="M4.963 12h14.074c.977 0 1.466 0 1.768.375c.302.376.209.787.023 1.609a9.02 9.02 0 0 1-4.075 5.676c-.392.24-.559.738-.347 1.144A.82.82 0 0 1 15.674 22H8.326a.82.82 0 0 1-.732-1.196c.212-.406.045-.903-.347-1.144a9.02 9.02 0 0 1-4.075-5.676c-.186-.822-.279-1.233.023-1.609S3.985 12 4.963 12"/>
                                            <path
                                                d="m17.459 12l1.55-3.719c.175-.419.606-.629 1.038-.701c.374-.062.672-.239.831-.527c.397-.718-.21-1.859-1.355-2.55s-2.397-.668-2.793.05c-.16.289-.157.646-.022 1.015c.156.427.197.92-.063 1.288L13 12M6.502 5.502L10 9M8.6 3.403c1.546 1.546 1.16 3.039 0 4.198c-1.158 1.159-2.651 1.545-4.197 0c-1.546-1.546-1.4-5.597-1.4-5.597s4.052-.147 5.598 1.399"/>
                                        </g>
                                    </svg>
                                </div>

                            @endif

                        </div>
                    @endif
                </div>
            </div>

            <div class="product-single__description u-margin-bottom-medium">
                {{ucwords($product->description)}}
            </div>

            <div class="product-single__price-box u-margin-bottom-big">
                @if($product->discount !== 0)
                    <div class="product-single__price">
                        <del>
                            <span class="amount">{{intdiv($product->price, 100)}},<sup>{{str_pad($product->price%100, 2, '0', STR_PAD_LEFT)}}€</sup></span>
                        </del>
                        <ins>
                            <span class="amount">{{intdiv(($product->price - ($product->price * ($product->discount/100))), 100)}},<sup>{{str_pad(($product->price - ($product->price * ($product->discount/100)))%100, 2, '0', STR_PAD_LEFT)}}€</sup></span>
                        </ins>
                    </div>
                @else
                    <div class="product-single__price">
                        <p>{{intdiv($product->price, 100)}},{{str_pad($product->price%100, 2, '0', STR_PAD_LEFT)}}€</p>
                    </div>
                @endif

            </div>

            <div class="product-single__actions">
                <div class="product-single__action">
                    <div class="u-margin-bottom-small"><p>Quantity:</p></div>
                    <div class="product-single__input-quantity-box">
                        <button class="product-single__quantity-arrow product-single__quantity-arrow--minus">
                            <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 0 24 24">
                                <path fill="#ffffff" d="M19 12.998H5v-2h14z"/>
                            </svg>
                        </button>
                        <input name="quantity" type="number" min="1" step="1" max="10" value="1"/>
                        <button class="product-single__quantity-arrow product-single__quantity-arrow--plus">
                            <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 0 24 24">
                                <path fill="#ffffff" d="M19 12.998h-6v6h-2v-6H5v-2h6v-6h2v6h6z"/>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="product-single__action">
                    <button class="btn btn--primary">
                        Add to cart
                    </button>
                </div>
            </div>

        </form>

    </div>

</div>
