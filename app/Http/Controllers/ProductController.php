<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Brand;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('admin.products.list', compact('products'));
    }

    public function create()
    {
        $brands = Brand::all(); 
        return view('admin.products.create', compact('brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|max:255|unique:products',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'brand_id' => 'required|exists:brands,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $product = new Product();
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->brand_id = $request->brand_id;
    
        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/products'), $imageName);
            $product->image = 'uploads/products/' . $imageName;
        }
    
        $product->save();
    
        return redirect()->route('product.index')->with('success', 'Product added successfully.');
    }
    
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $brands = Brand::all();
        return view('admin.products.edit', compact('product', 'brands'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'brand_id' => 'required|exists:brands,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->brand_id = $request->brand_id;
    
        if ($request->hasFile('image')) {
            if ($product->image && file_exists(public_path($product->image))) {
                unlink(public_path($product->image));
            }
    
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/products'), $imageName);
            $product->image = 'uploads/products/' . $imageName;
        }
    
        $product->save();
    
        return redirect()->route('product.index')->with('success', 'Product updated successfully.');
    }
    

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if ($product->image && file_exists(public_path($product->image))) {
            unlink(public_path($product->image));
        }
    
        $product->delete();
    
        return redirect()->route('product.index')->with('success', 'Product deleted successfully.');
    }
    
}
