<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('admin.pages.products.index', ['products' => $products]);
    }

    public function create()
    {
        return view('admin.pages.products.create');
    }

    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'title' => 'required|max:255',
            'price' => 'required|min:0.5|max:9999',
            'discount' => 'integer|min:0|max:99',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Store image
        $image_name = time() . rand(0, 9999) . '.' . $request->image->getClientOriginalExtension();
        $request->image->storeAs('public/products', $image_name);

        // Store product in DB
        $product = Product::create([
            'title' => $request->title,
            'price' => $request->price * 100,
            'discount' => $request->discount,
            'description' => $request->description,
            'image' => $image_name,
        ]);

        return back()->with('success', 'Product created successfully');
    }

    public function edit($id)
    {
        $product= Product::findOrFail($id);

        return view('admin.pages.products.edit', ['product' => $product]);
    }

    public function update(Request $request, $id)
    {
        // Validation
        $request->validate([
            'title' => 'required|max:255',
            'price' => 'required|min:0.5|max:9999',
            'discount' => 'integer|min:0|max:99',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Fetching the existing product
        $product = Product::findOrFail($id);

        // Store new image if exists
        $image_name = $product->image;
        if ($request->image) {
            $image_name = time() . rand(0, 9999) . '.' . $request->image->getClientOriginalExtension();
            $request->image->storeAs('public/products/', $image_name);
        }

        // Update product in DB
        $product->update([
            'title' => $request->title,
            'price' => $request->price * 100,
            'discount' => $request->discount,
            'description' => $request->description,
            'image' => $image_name,
        ]);

        // Return Response
        return back()->with('success', 'Product updated successfully!!');
    }

    public function destroy($id)
    {
        $product= Product::findOrFail($id);
        $product->delete();

        return back()->with('success', 'Product deleted successfully');
    }
}
