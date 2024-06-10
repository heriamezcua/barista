<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::orderBy('created_at', 'desc');
        $searchTerm = '';

        if ($request->search) {
            $searchTerm = $request->input('search');
            $products = $products->where('title', 'like', '%' . $searchTerm . '%');
        }

        // Obtaing the total products and later paginate
        $allProducts = $products->get();
        $numResults = count($allProducts);

        $products = $products->paginate(6)->appends([
            'searchTerm' => $searchTerm,
            'products' => $products
        ]);

        return view('pages.search', ['products' => $products, 'searchTerm' => $searchTerm, 'numResults' => $numResults, 'active' => '']);
    }

    public function popular(Request $request)
    {
        $products = Product::orderBy('created_at', 'desc');
        $searchTerm = '';

        if ($request->search) {
            $searchTerm = $request->input('search');
            $products = $products->where('title', 'like', '%' . $searchTerm . '%');
        }

        // Obtaing the total products and later paginate
        $allProducts = $products->get();
        $numResults = count($allProducts);

        $products = $products->paginate(6)->appends([
            'searchTerm' => $searchTerm,
            'products' => $products
        ]);

        return view('pages.search', ['products' => $products, 'searchTerm' => $searchTerm, 'numResults' => $numResults, 'active' => 'popular']);
    }

    public function lowest(Request $request)
    {
        $products = Product::orderBy('price', 'asc');
        $searchTerm = '';

        if ($request->search) {
            $searchTerm = $request->input('search');
            $products = $products->where('title', 'like', '%' . $searchTerm . '%');
        }

        // Obtaing the total products and later paginate
        $allProducts = $products->get();
        $numResults = count($allProducts);

        $products = $products->paginate(6)->appends([
            'searchTerm' => $searchTerm,
            'products' => $products
        ]);

        return view('pages.search', ['products' => $products, 'searchTerm' => $searchTerm, 'numResults' => $numResults, 'active' => 'lowest']);
    }

    public function highest(Request $request)
    {
        $products = Product::orderBy('price', 'desc');
        $searchTerm = '';

        if ($request->search) {
            $searchTerm = $request->input('search');
            $products = $products->where('title', 'like', '%' . $searchTerm . '%');
        }

        // Obtaing the total products and later paginate
        $allProducts = $products->get();
        $numResults = count($allProducts);

        $products = $products->paginate(6)->appends([
            'searchTerm' => $searchTerm,
            'products' => $products
        ]);

        return view('pages.search', ['products' => $products, 'searchTerm' => $searchTerm, 'numResults' => $numResults, 'active' => 'highest']);
    }

    public function bestsellers(Request $request)
    {
        $products = Product::orderBy('created_at', 'desc');
        $searchTerm = '';

        if ($request->search) {
            $searchTerm = $request->input('search');
            $products = $products->where('title', 'like', '%' . $searchTerm . '%');
        }

        // Obtaing the total products and later paginate
        $allProducts = $products->get();
        $numResults = count($allProducts);

        $products = $products->paginate(6)->appends([
            'searchTerm' => $searchTerm,
            'products' => $products
        ]);

        return view('pages.search', ['products' => $products, 'searchTerm' => $searchTerm, 'numResults' => $numResults, 'active' => 'bestsellers']);
    }


    public function newest(Request $request)
    {
        $products = Product::orderBy('created_at', 'desc');
        $searchTerm = '';

        if ($request->search) {
            $searchTerm = $request->input('search');
            $products = $products->where('title', 'like', '%' . $searchTerm . '%');
        }

        // Obtaing the total products and later paginate
        $allProducts = $products->get();
        $numResults = count($allProducts);

        $products = $products->paginate(6)->appends([
            'searchTerm' => $searchTerm,
            'products' => $products
        ]);

        return view('pages.search', ['products' => $products, 'searchTerm' => $searchTerm, 'numResults' => $numResults, 'active' => 'newest']);
    }

    public function filter(Request $request)
    {
        $query = Product::query();

        if ($request->has('category')) {
            $query->whereIn('category', $request->category);
        }

        if ($request->has('coffee_type')) {
            $query->whereIn('coffee_type', $request->coffee_type);
        }

        if ($request->has('variety')) {
            $query->whereIn('variety', $request->variety);
        }

        if ($request->has('caffeine')) {
            $query->whereIn('caffeine', $request->caffeine);
        }

        $searchTerm = $request->input('searchTerm', '');
        $numResults = $request->input('numResults', 10);
        $active = '';

        $products = $query->paginate($numResults);


        return view('pages.search', compact('products', 'searchTerm', 'numResults', 'active'));
    }


}
