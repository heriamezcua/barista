<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{

    public function index(){
        $colors = Color::orderBy('created_at', 'desc')->paginate(5);

        return view('admin.pages.colors.index', ['colors' => $colors]);
    }


    public function create(){
        return view('admin.pages.colors.create');
    }


    public function store(Request $request){

        // Form data validation
        $request->validate([
            'name' => 'required|unique:colors|max:255',
            'code' => 'required|max:255',
        ]);


        // Store
        $color = new Color();
        $color->name = $request->name;
        $color->code = $request->code;
        $color->save();

        // Return response
        return back()->with('success', 'Color added successfully!');
    }

    public function destroy($id){
        Color::findOrFail($id)->delete();
        return back()->with('success', 'Color deleted successfully!');
    }

}
