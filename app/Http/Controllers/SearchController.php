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

        $products = $products->paginate(2)->appends([
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

        $products = $products->paginate(2)->appends([
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

        $products = $products->paginate(2)->appends([
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

        $products = $products->paginate(2)->appends([
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

        $products = $products->paginate(2)->appends([
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

        $products = $products->paginate(2)->appends([
            'searchTerm' => $searchTerm,
            'products' => $products
        ]);

        return view('pages.search', ['products' => $products, 'searchTerm' => $searchTerm, 'numResults' => $numResults, 'active' => 'newest']);
    }


}
