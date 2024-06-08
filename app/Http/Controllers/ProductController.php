<?php

namespace App\Http\Controllers;

use App\Models\Bean;
use App\Models\Color;
use App\Models\Machine;
use App\Models\Pod;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->get();

        return view('admin.pages.products.index', ['products' => $products]);
    }

    public function create()
    {
        $colors = Color::all();
        return view('admin.pages.products.create', ['colors' => $colors]);
    }

    public function store(Request $request)
    {
        try {
            // Validation of product fields
            $request->validate([
                'title' => 'required|max:255',
                'category' => 'required|in:beans,pods,machines,accessories',
                'price' => 'required|min:0.5|max:9999',
                'discount' => 'integer|min:0|max:99',
                'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'
            ]);

            // Validation of subproduct (Bean, Capsule, Machine) fields
            switch ($request->category) {
                case 'beans':
                    // Validation of beans fields
                    $request->validate([
                        'bean_format' => 'required_if:category,beans|in:250,500,1000',
                        'bean_type' => 'required_if:category,beans|in:specialty,blend'
                    ]);
                    break;
                case 'pods':
                    // Validation of pods fields
                    $request->validate([
                        'pod_quantity' => 'required_if:category,pods|in:8,16,24',
                        'pod_size' => 'required_if:category,pods|in:small,medium,large',
                        'pod_variety' => 'required_if:category,pods|in:espresso,long_black,white,decaf',
                    ]);
                    break;
                case 'machines':
                    // Validation of machines fields
                    $request->validate([
                        'machine_capacity' => 'required_if:category,machines|min:0|max:9999',
                        // specs validation
                        'specifications' => 'required|array',
                        'specifications.*.name' => 'required|string|max:255',
                        'specifications.*.value' => 'required|string|max:255',
                        'colors.*' => 'integer|exists:colors,id',
                    ]);
                    break;
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

            // Transaction to ensure consistency in DB
            DB::beginTransaction();

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
                $bean->is_decaff = (isset($request->isDecaf) ? 1 : 0);
                // Asocia el producto recién creado con el bean
                $product->bean()->save($bean);
            } elseif ($request->category === 'pods') {
                $pod = new Pod();
                $pod->quantity = $request->pod_quantity;
                $pod->size = $request->pod_size;
                $pod->variety = $request->pod_variety;
                // Asocia el producto recién creado con el bean
                $product->pod()->save($pod);
            } elseif ($request->category === 'machines') {
                $machine = new Machine();

                $machine->isAuto = (isset($request->machine_is_auto) ? 1 : 0);
                $machine->capacity = $request->machine_capacity;
                $machine->specs = json_encode($request->specifications);

                $product->machine()->save($machine);

                $machine->colors()->attach($request->colors);
            }

            // Confirm transaction
            DB::commit();

            return back()->with('success', 'Product CREATED successfully!!');
        } catch (Exception $e) {

            // Rollback transaction
            DB::rollBack();
            return back()->with('error', 'Something went wrong!!' . $e->getMessage());
        }
    }

    public
    function edit($id)
    {
        $product = Product::findOrFail($id);
        $colors = Color::all();

        return view('admin.pages.products.edit', ['product' => $product, 'colors' => $colors]);
    }

    public
    function update(Request $request, $id)
    {
        try {
            // Validation of product fields
            $request->validate([
                'title' => 'required|max:255',
                'category' => 'required|in:beans,pods,machines,accessories',
                'price' => 'required|min:0.5|max:9999',
                'discount' => 'integer|min:0|max:99',
                'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
                'description' => 'required|string|max:1000'
            ]);

            // Validation of subproduct (Bean, Capsule, Machine) fields
            switch ($request->category) {
                case 'beans':
                    // Validation of beans fields
                    $request->validate([
                        'bean_format' => 'required_if:category,beans|in:250,500,1000',
                        'bean_type' => 'required_if:category,beans|in:specialty,blend'
                    ]);
                    break;
                case 'pods':
                    // Validation of beans fields
                    $request->validate([
                        'pod_quantity' => 'required_if:category,pods|in:8,16,24',
                        'pod_size' => 'required_if:category,pods|in:small,medium,large',
                        'pod_variety' => 'required_if:category,pods|in:espresso,long_black,white,decaf',
                    ]);
                    break;
                case 'machines':
                    // Validation of beans fields
                    $request->validate([
                        'machine_capacity' => 'required_if:category,machines|min:0|max:9999',
                        // specs validation
                        'specifications' => 'required|array',
                        'specifications.*.name' => 'required|string|max:255',
                        'specifications.*.value' => 'required|string|max:255',
                        'colors.*' => 'integer|exists:colors,id',
                    ]);
                    break;
            }

            // Transaction to ensure consistency in DB
            DB::beginTransaction();

            // Fetching the existing product
            $product = Product::findOrFail($id);

            // set new images if exists
            $images = json_decode($product->images);

            if ($request->hasFile('images')) {
                $images = [];
                foreach ($request->file('images') as $image) {
                    $first_part = time();
                    $image_name = $first_part . '_' . rand(0, 9999) . '.' . $image->getClientOriginalExtension();
                    $image->storeAs('public/products/' . $first_part, $image_name);
                    $images[] = $image_name;
                }
            }

            $images_json = json_encode($images);

            // Store the old category to delete old subproduct if nec
            $oldCategory = $product->category;

            // Update product in DB
            $product->update([
                'title' => $request->title,
                'category' => $request->category,
                'price' => $request->price * 100,
                'discount' => $request->discount,
                'description' => $request->description,
                'images' => $images_json,
            ]);

            if ($oldCategory === $product->category) {
                // Create or update subproduct based on the category
                if ($request->category === 'beans') {
                    $bean = Bean::where('product_id', $product->id)->firstOrFail();
                    $bean->format = $request->bean_format;
                    $bean->type = $request->bean_type;
                    $bean->is_decaff = (isset($request->isDecaf) ? 1 : 0);
                    $bean->save();
                } elseif ($request->category === 'pods') {
                    $pod = Pod::where('product_id', $product->id)->firstOrFail();
                    $pod->quantity = $request->pod_quantity;
                    $pod->size = $request->pod_size;
                    $pod->variety = $request->pod_variety;
                    $product->pod()->save($pod);
                } elseif ($request->category === 'machines') {
                    $machine = Machine::where('product_id', $product->id)->firstOrFail();

                    $machine->isAuto = (isset($request->machine_is_auto) ? 1 : 0);
                    $machine->capacity = $request->machine_capacity;
                    $machine->specs = json_encode($request->specifications);

                    $product->machine()->save($machine);

                    $machine->colors()->sync($request->colors);
                }
            } else {
                // Delete old subproduct
                switch ($oldCategory) {
                    case 'beans':
                        $bean = Bean::where('product_id', $product->id);
                        $bean->delete();
                        break;
                    case 'pods':
                        $pod = Pod::where('product_id', $product->id);
                        $pod->delete();
                        break;
                    case 'machines':
                        $machine = Machine::where('product_id', $product->id);
                        $machine->delete();
                        break;
                }

                // Create the new one
                if ($request->category === 'beans') {
                    $bean = new Bean();
                    $bean->format = json_encode($request->bean_format);
                    $bean->type = $request->bean_type;
                    $bean->is_decaff = $request->isDecaf;

                    // Asocia el producto recién creado con el bean
                    $product->bean()->save($bean);
                } elseif ($request->category === 'pods') {
                    $pod = new Pod();
                    $pod->quantity = $request->pod_quantity;
                    $pod->size = $request->pod_size;
                    // Asocia el producto recién creado con el bean
                    $product->pod()->save($pod);
                } elseif ($request->category === 'machines') {
                    $machine = new Machine();

                    $machine->isAuto = (isset($request->machine_is_auto) ? 1 : 0);
                    $machine->capacity = $request->machine_capacity;
                    $machine->specs = json_encode($request->specifications);

                    $product->machine()->save($machine);

                    $machine->colors()->attach($request->colors);
                }
            }


            // Confirm transaction
            DB::commit();

            return back()->with('success', 'Product UPDATED successfully!!');
        } catch (Exception $e) {

            // Rollback transaction
            DB::rollBack();
            return back()->with('error', 'Something went wrong!!' . $e->getMessage());
        }
    }

    public
    function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return back()->with('success', 'Product deleted successfully');
    }
}
