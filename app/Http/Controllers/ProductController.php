<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Hiển thị danh sách sản phẩm với phân trang
    public function menu()
    {
        $products = Product::paginate(12);  // Phân trang 12 sản phẩm mỗi trang
        return view('products.menu', compact('products'));
    }

    // Tìm kiếm sản phẩm với phân trang
    public function search(Request $request)
    {
        $search = $request->input('search');
        
        // Tìm sản phẩm theo tên hoặc mô tả với phân trang
        $products = Product::where('name', 'LIKE', '%' . $search . '%')
                    ->orWhere('description', 'LIKE', '%' . $search . '%')
                    ->paginate(12);

        return view('products.menu', compact('products'));
    }

    // Hiển thị chi tiết sản phẩm
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }
}

