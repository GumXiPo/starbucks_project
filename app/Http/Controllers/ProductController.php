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
        $query = Product::query();
    
        // Lọc theo từ khóa tìm kiếm
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->input('search') . '%');
        }
    
        // Lọc theo khoảng giá
        if ($request->has('price_range') && $request->input('price_range') != '') {
            $maxPrice = $request->input('price_range');
            $query->where('price', '<=', $maxPrice);
        }
    
        // Lọc theo sắp xếp
        if ($request->has('sort')) {
            $sort = $request->input('sort');
            switch ($sort) {
                case 'name_asc':
                    $query->orderBy('name', 'asc');
                    break;
                case 'name_desc':
                    $query->orderBy('name', 'desc');
                    break;
                case 'price_asc':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price_desc':
                    $query->orderBy('price', 'desc');
                    break;
            }
        }
    
        // Lấy danh sách sản phẩm
        $products = $query->paginate(12);
    
        return view('products.menu', compact('products'));
    }
    
    public function index()
    {
        // Lấy tất cả sản phẩm từ database
        $products = Product::all();
        // Truyền biến $products vào view 'admin.index'
        return view('products.adminproduct', compact('products'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        // Tìm sản phẩm theo id
        $product = Product::findOrFail($id);

        // Validate dữ liệu
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category' => 'required|string|max:255',
            'is_available' => 'required|boolean',
            'stock_quantity' => 'required|integer',
        ]);

        // Kiểm tra và cập nhật số lượng tồn kho nếu cần
        if ($request->is_available == 0) {
            // Nếu không có hàng, số lượng tồn kho là 0
            $request->merge(['stock_quantity' => 0]);
        }

        // Cập nhật thông tin sản phẩm
        $product->update($validated);

        // Cập nhật trạng thái 'is_available' dựa vào stock_quantity
        $product->is_available = $product->stock_quantity > 0;

        // Lưu lại thông tin
        $product->save();

        // Quay lại trang danh sách sản phẩm với thông báo thành công
        return redirect()->route('products.adminproduct')->with('success', 'Cập nhật sản phẩm thành công!');
    }
    public function store(Request $request)
    {
        // Validate dữ liệu
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category' => 'required|string|max:255',
            'is_available' => 'required|boolean',
            'stock_quantity' => 'required|integer',
            'image' => 'nullable|image|max:1024', // Validate ảnh
        ]);

        // Xử lý hình ảnh
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        // Tạo sản phẩm mới
        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'category' => $request->category,
            'is_available' => $request->has('is_available') ? true : false,
            'stock_quantity' => $request->stock_quantity,
            'image' => isset($imagePath) ? $imagePath : null,
            'description' => $request->description,
        ]);

        return redirect()->route('products.adminproduct')->with('success', 'Sản phẩm đã được thêm!');
    }
    // Hiển thị chi tiết sản phẩm
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }
    public function create()
    {
        return view('products.create'); // View form thêm sản phẩm
    }
}
