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

        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Thêm logic sắp xếp
        if ($request->has('sort')) {
            switch ($request->sort) {
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
                default:
                    break;
            }
        }

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

    // Hiển thị chi tiết sản phẩm
    public function show($id)
{
    $product = Product::findOrFail($id);
    return view('products.show', compact('product'));
}
}
