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


    public function search(Request $request)
    {
        $searchTerm = $request->input('search');

        // Truy vấn tìm kiếm
        $products = Product::when($searchTerm, function ($query, $searchTerm) {
            return $query->where('name', 'like', '%' . $searchTerm . '%');
        })->get();

        return view('products.menu', compact('products'));
    }

}