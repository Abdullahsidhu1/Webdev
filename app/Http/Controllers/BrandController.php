<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class BrandController extends Controller
{

    
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brands.list', compact('brands'));
    }

    public function create()
    {
        return view('admin.brands.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $brand = new Brand();
        $brand->name = $request->name;

        $brand->save();

        return redirect()->route('brand.index')->with('success', 'Brand added successfully.');
    }

    public function edit($id)
{
    $brand = Brand::findOrFail($id); 
    return view('admin.brands.edit', compact('brand')); 
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    $brand = Brand::findOrFail($id); 
    $brand->name = $request->name;
    $brand->save();

    return redirect()->route('brand.index')->with('success', 'Brand updated successfully!');
}


    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();
        return redirect()->route('brand.index')->with('success', 'Brand deleted successfully.');
    }

    
}
