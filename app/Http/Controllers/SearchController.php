<?php

namespace App\Http\Controllers;

use App\Models\Bean;
use App\Models\Item;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

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
        // Subquery para calcular la media de ratings aprobados por producto
        $products = Product::leftJoin('reviews', function ($join) {
            $join->on('products.id', '=', 'reviews.product_id')
                ->where('reviews.status', 'approved');
        })
            ->select(
                'products.id',
                'products.title',
                'products.description',
                'products.price',
                'products.images',
                'products.discount',
                'products.created_at',
                'products.updated_at',
                DB::raw('AVG(reviews.rating) as average_rating')
            )
            ->groupBy(
                'products.id',
                'products.title',
                'products.description',
                'products.price',
                'products.images',
                'products.discount',
                'products.created_at',
                'products.updated_at'
            )
            ->orderBy('average_rating', 'desc');

        $searchTerm = '';

        if ($request->search) {
            $searchTerm = $request->input('search');
            $products = $products->where('products.title', 'like', '%' . $searchTerm . '%');
        }

        // Obtener todos los productos y luego paginar
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
        $searchTerm = $request->input('search', '');

        // Get the best selling products in descending order
        $bestItems = Item::select('product_id', DB::raw('SUM(quantity) as total_quantity_sold'))
            ->groupBy('product_id')
            ->orderByDesc('total_quantity_sold')
            ->limit(10)
            ->get();

        $bestItemsIds = $bestItems->pluck('product_id')->toArray();

        // Build the query to get the products in the order specified by $bestItemsIds
        $bestSellersQuery = Product::whereIn('id', $bestItemsIds)
            ->orderByRaw("FIELD(id, " . implode(',', $bestItemsIds) . ")");

        // Apply search filter if $searchTerm is given
        if (!empty($searchTerm)) {
            $bestSellersQuery->where('title', 'like', '%' . $searchTerm . '%');
        }

        // Get the best selling products
        $bestSellers = $bestSellersQuery->get();

        $bestProductsIds = $bestSellers->pluck('id')->toArray();

        // Get the never selling products query
        $notSelledQuery = Product::whereNotIn('id', $bestProductsIds);

        if (!empty($searchTerm)) {
            $notSelledQuery->where('title', 'like', '%' . $searchTerm . '%');
        }

        // Get the never selling products
        $notSelled = $notSelledQuery->get();

        $allProducts = $bestSellers->merge($notSelled);

        $numResults = count($allProducts);

        // Paginate the joined collection
        $page = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 6;
        $offset = ($page * $perPage) - $perPage;
        $paginatedProducts = new LengthAwarePaginator(
            $allProducts->slice($offset, $perPage),
            $allProducts->count(),
            $perPage,
            $page,
            ['path' => LengthAwarePaginator::resolveCurrentPath()]
        );

        // Add search parameters to pagination
        $paginatedProducts->appends(['search' => $searchTerm]);

        return view('pages.search', [
            'products' => $paginatedProducts,
            'searchTerm' => $searchTerm,
            'numResults' => $numResults,
            'active' => 'bestsellers'
        ]);
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
            $coffeeTypes = $request->input('coffee_type', []);
            $queryTypes = $query->join('beans', 'products.id', '=', 'beans.product_id')
                ->whereIn('beans.type', $coffeeTypes)
                ->pluck('product_id')
                ->toArray();

            $query = Product::whereIn('id', $queryTypes);
        }

        if ($request->has('variety')) {
            $varieties = $request->input('variety', []);
            $queryVarieties = $query->join('pods', 'products.id', '=', 'pods.product_id')
                ->whereIn('pods.variety', $varieties)
                ->pluck('product_id')
                ->toArray();

            $query = Product::whereIn('id', $queryVarieties);
        }

        if ($request->has('caffeine')) {
            $caffeineOptions = $request->input('caffeine', []);

            // Searching in beans table
            $queryBeans = DB::table('products')
                ->join('beans', 'products.id', '=', 'beans.product_id')
                ->where(function ($q) use ($caffeineOptions) {
                    $q->whereIn('beans.is_decaff', $caffeineOptions);
                })
                ->select('products.id as product_id')
                ->distinct()
                ->pluck('product_id')
                ->toArray();

            // Searching in pods table
            $queryPods = DB::table('products')
                ->join('pods', 'products.id', '=', 'pods.product_id')
                ->where(function ($q) use ($caffeineOptions) {
                    $q->whereIn('pods.is_decaff', $caffeineOptions);
                })
                ->select('products.id as product_id')
                ->distinct()
                ->pluck('product_id')
                ->toArray();

            // Combinar los resultados de ambas consultas
            $productIds = array_merge($queryBeans, $queryPods);

            // Delete duplocates if exists
            $productIds = array_unique($productIds);

            // Finally obtaing the products query
            $query = Product::whereIn('id', $productIds);
        }


        $searchTerm = $request->input('searchTerm', '');
        $numResults = $request->input('numResults', 10);
        $active = '';

        $products = $query->paginate($numResults);

        return view('pages.search', compact('products', 'searchTerm', 'numResults', 'active'));
    }


}
