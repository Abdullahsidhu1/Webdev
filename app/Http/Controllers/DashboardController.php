<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        $totalBrands = Brand::count();
        $totalProducts = Product::count();
        return view('admin.dashboard', compact('totalBrands', 'totalProducts'));
    }
}
