<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function menu()
    {
        $products = Product::all();
        return view('products.menu', compact('products'));
    }

}
