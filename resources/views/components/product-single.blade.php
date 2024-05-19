<div class="container">

    <div class="row">
        <div class="col-md-6">
            @php
                // Obtain the product main image, if not found set not found image
                $imagesArray = json_decode($product->images);
                $firstImage = !empty($imagesArray) ? $imagesArray[0] : 'no-image.png';
                $folderName = !empty($imagesArray) ? explode('_', $firstImage)[0] : 'no-image.png';
            @endphp

            @foreach($imagesArray as $index => $image)
                @if(!$index)
                    <img
                        src="{{ !($folderName === 'no-image.png') ? asset('storage/products/' . $folderName . '/' . $firstImage) :  asset('storage/products/' . 'no-image.png') }}"
                        alt="" width="450px">
                @else
                    <div class="row">
                        <img
                            src="{{ !($folderName === 'no-image.png') ? asset('storage/products/' . $folderName . '/' . $image) :  asset('storage/products/' . 'no-image.png') }}"
                            alt="" style="width: 200px !important; height: 150px !important;" >
                    </div>
                @endif
            @endforeach
        </div>
        <div class="col-md-6 d-flex flex-column justify-content-between">

            <div class="row d-flex align-items-center">
                <div class="col-md-6">
                    <h4 class="mt-3"
                        style="background-color: #3a1c09; color: #fff; max-width: fit-content; padding: 10px; border-radius: 3px">
                        -{{$product->discount}}%</h4>
                </div>
                <div class="col-md-6">
                    @if(auth()->check() && auth()->user()->wishlist->contains($product))
                        <form action="{{route('removeFromWishlist', $product->id)}}" method="post">
                            @csrf
                            <button type="submit" style="border: none; background: none">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     width="32px"
                                     viewBox="0 0 24 24">
                                    <path fill="#ff0000"
                                          d="m12 21.35l-1.45-1.32C5.4 15.36 2 12.27 2 8.5C2 5.41 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.08C13.09 3.81 14.76 3 16.5 3C19.58 3 22 5.41 22 8.5c0 3.77-3.4 6.86-8.55 11.53z"/>
                                </svg>
                            </button>
                        </form>
                    @else
                        <form action="{{route('addToWishlist', $product->id)}}" method="post">
                            @csrf
                            <button type="submit" style="border: none; background: none">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     width="32px" viewBox="0 0 24 24">
                                    <path fill="#ff0000"
                                          d="m12.1 18.55l-.1.1l-.11-.1C7.14 14.24 4 11.39 4 8.5C4 6.5 5.5 5 7.5 5c1.54 0 3.04 1 3.57 2.36h1.86C13.46 6 14.96 5 16.5 5c2 0 3.5 1.5 3.5 3.5c0 2.89-3.14 5.74-7.9 10.05M16.5 3c-1.74 0-3.41.81-4.5 2.08C10.91 3.81 9.24 3 7.5 3C4.42 3 2 5.41 2 8.5c0 3.77 3.4 6.86 8.55 11.53L12 21.35l1.45-1.32C18.6 15.36 22 12.27 22 8.5C22 5.41 19.58 3 16.5 3"/>
                                </svg>
                            </button>

                        </form>
                    @endif
                </div>
            </div>


            <div class="d-flex flex-row user-ratings">
                <div class="ratings">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                        <path fill="currentColor"
                              d="m5.825 21l1.625-7.025L2 9.25l7.2-.625L12 2l2.8 6.625l7.2.625l-5.45 4.725L18.175 21L12 17.275z"/>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                        <path fill="currentColor"
                              d="m5.825 21l1.625-7.025L2 9.25l7.2-.625L12 2l2.8 6.625l7.2.625l-5.45 4.725L18.175 21L12 17.275z"/>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                        <path fill="currentColor"
                              d="m5.825 21l1.625-7.025L2 9.25l7.2-.625L12 2l2.8 6.625l7.2.625l-5.45 4.725L18.175 21L12 17.275z"/>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                        <path fill="currentColor"
                              d="m5.825 21l1.625-7.025L2 9.25l7.2-.625L12 2l2.8 6.625l7.2.625l-5.45 4.725L18.175 21L12 17.275z"/>
                    </svg>
                </div>

                <a href="#" class="text-sencondary px-2">3 reviews</a>
            </div>

            <h2 class="text-secondary mt-3">{{$product->title}}</h2>

            <h4 class="text-tertiary mt-3">Category</h4>

            <p class="mt-3">{{$product->description}}</p>

            <form action="{{route('addToCart',  $product->id)}}" method="post">
                @csrf

                <div class="row d-flex align-items-center justify-content-between mt-4">
                    <div class="col-md-6">
                        <div class="d-flex align-items-center">
                            <p class="m-0">Quantity:</p>
                            <select style="width: 50px" class="mx-2" name="quantity" id="quantity">
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <h2 class="text-tertiary mt-3">{{$product->price / 100}}€</h2>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-6">
                        <button class="btn"
                                style="width: 100%; background-color: #8d4c1e; color: white; font-weight: 500">
                            Add to cart
                        </button>
                    </div>
                    <div class="col-md-6">
                        <button class="btn" style="width: 100%; border: 2px solid #8d4c1e; font-weight: 500">Buy it
                            now
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>

</div>
