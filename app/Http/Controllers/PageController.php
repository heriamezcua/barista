<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function home(Request $request)
    {

        // Select the first 7 products from DB based on category filter
        $filterCategory = $request->query('category', 'beans');

        // Start eloquent query
        $topProducts = Product::query();

        // Finally select the products
        $topProducts = $topProducts->orderBy('created_at', 'desc')
            ->whereIn('category', (array)$filterCategory)
            ->limit(7)
            ->get();

        // Bestsellers products
        $bestItems = Item::select('product_id', DB::raw('SUM(quantity) as total_quantity_sold'))
            ->groupBy('product_id')
            ->orderByDesc('total_quantity_sold')
            ->limit(10)
            ->get();

        // Select all products from DB
        $bestsellers = [];
        foreach ($bestItems as $item) {
            try {
                $product = Product::findOrFail($item->product_id);
                $bestsellers[] = $product;
            } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                // Handle the case where product is not found
            }
        }

        return view('pages.home', [
            'topProducts' => $topProducts,
            'bestsellers' => $bestsellers,
            'filterCategory' => $filterCategory,
        ]);
    }

    public function cart()
    {
        return view('pages.cart');
    }

    public function wishlist()
    {
        $products = Auth::user()->wishlist;
        return view('pages.wishlist', ['products' => $products]);
    }

    public function account()
    {
        return view('pages.account');
    }

    public function product($id)
    {
        $product = Product::findOrFail($id);

        // Obtaining random products with the same category
        $relatedProducts = Product::where('category', $product->category)->where('id', '<>', $product->id)->inRandomOrder()->limit(3)->get();

        // Calc the avg rating based in the reviews of the product
        $approvedReviews = $product->reviews->where('status', 'approved');

        $totalReviews = $approvedReviews->count();
        $rating = $totalReviews ? round($approvedReviews->avg('rating'), 2) : 0;

        // Group by rating number
        $numRatings = $approvedReviews->groupBy('rating')->map->count();

        $numRatingOne = $numRatings->get(1, 0);
        $numRatingTwo = $numRatings->get(2, 0);
        $numRatingThree = $numRatings->get(3, 0);
        $numRatingFour = $numRatings->get(4, 0);
        $numRatingFive = $numRatings->get(5, 0);

        // Star fill info
        $fullStars = floor($rating);
        $partialStar = $rating - $fullStars;

        $partialFill = 0;
        if ($partialStar > 0 && $partialStar <= 0.25) {
            $partialFill = 0.25;
        } elseif ($partialStar > 0.25 && $partialStar <= 0.75) {
            $partialFill = 0.5;
        } elseif ($partialStar > 0.75) {
            $partialFill = 0.75;
        }

        return view('pages.product',
            [
                'product' => $product,
                'relatedProducts' => $relatedProducts,
                'ratingInfo' => [
                    'totalReviews' => $totalReviews,
                    'rating' => $rating,
                    'numRatingOne' => $numRatingOne,
                    'numRatingTwo' => $numRatingTwo,
                    'numRatingThree' => $numRatingThree,
                    'numRatingFour' => $numRatingFour,
                    'numRatingFive' => $numRatingFive,
                    'fullStars' => $fullStars,
                    'partialFill' => $partialFill,
                ]
            ]);
    }

    public function checkout()
    {
        return view('pages.checkout');
    }

    public function success()
    {
        return 'The purchase has been made successfully';
    }
}
