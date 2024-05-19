<?php

namespace App\Http\Controllers;

use App\Models\Bean;
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
        // Validation of product fields
        $request->validate([
            'title' => 'required|max:255',
            'category' => 'required|in:beans,pods,machines,accessories',
            'price' => 'required|min:0.5|max:9999',
            'discount' => 'integer|min:0|max:99',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // Validation of subproduct (Bean, Capsule, Machine) fields
        switch ($request->category) {
            case 'beans':
                // Validation of beans fields
                $request->validate([
                    'bean_format' => 'required_if:category,beans|in:250g,1000,3000',
                    'bean_type' => 'required_if:category,beans|in:whole_bean,french_press,aeropress,v60,chemex,moka,espresso'
                ]);
                break;
//            case 'pods':
//                break;
//            case 'machines':
//                break;
        }

        // Store image
        $images = [];

        foreach ($request->images as $image) {
            // First part of the name to create folder
            $first_part = time();

            // Create a random name
            $image_name = $first_part . '_' . rand(0, 9999) . '.' . $image->getClientOriginalExtension();

            // Store the image in my app
            $image->storeAs('public/products/' . $first_part, $image_name);

            // Agregar la ruta de la imagen al array
            $images[] = $image_name;
        }

        // Convert the image names array to JSON
        $images_json = json_encode($images);

        // Store product in DB
        $product = Product::create([
            'title' => $request->title,
            'category' => $request->category,
            'price' => $request->price * 100,
            'discount' => $request->discount,
            'description' => $request->description,
            'images' => $images_json,
        ]);

        // Create the subproduct depending on the category selected
        if ($request->category === 'beans') {
            $bean = new Bean();
            $bean->format = $request->bean_format;
            $bean->type = $request->bean_type;
            // Asocia el producto recién creado con el bean
            $product->bean()->save($bean);
        }

        return back()->with('success', 'Product created successfully');
    }

    public
    function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('admin.pages.products.edit', ['product' => $product]);
    }

    public
    function update(Request $request, $id)
    {
        // Validation
        $request->validate([
            'title' => 'required|max:255',
            'category' => 'required|in:beans,pods,machines,accessories',
            'price' => 'required|min:0.5|max:9999',
            'discount' => 'integer|min:0|max:99',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // Fetching the existing product
        $product = Product::findOrFail($id);

        // Store new image if exists
        $images = json_decode($product->images);

        if ($request->images) {
            $images = [];
            foreach ($request->images as $image) {
                // First part of the name to create folder
                $first_part = time();

                // Create a random name
                $image_name = $first_part . '_' . rand(0, 9999) . '.' . $image->getClientOriginalExtension();

                // Store the image in my app
                $image->storeAs('public/products/' . $first_part, $image_name);

                // Agregar la ruta de la imagen al array
                $images[] = $image_name;
            }
        }

        // Convert the image names array to JSON
        $images_json = json_encode($images);

        // Update product in DB
        $product->update([
            'title' => $request->title,
            'category' => $request->category,
            'price' => $request->price * 100,
            'discount' => $request->discount,
            'description' => $request->description,
            'images' => $images_json,
        ]);

        // Return Response
        return back()->with('success', 'Product updated successfully!!');
    }

    public
    function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return back()->with('success', 'Product deleted successfully');
    }
}
