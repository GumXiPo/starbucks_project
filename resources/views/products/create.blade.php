<!-- form.blade.php -->
<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="name">Tên sản phẩm:</label>
        <input type="text" name="name" id="name" required>
    </div>

    <div>
        <label for="price">Giá sản phẩm:</label>
        <input type="number" name="price" id="price" required>
    </div>

    <div>
        <label for="category">Danh mục sản phẩm:</label>
        <input type="text" name="category" id="category" required>
    </div>

    <div>
        <label for="image">Hình ảnh sản phẩm:</label>
        <input type="file" name="image" id="image" required>
    </div>

    <div>
        <label for="description">Mô tả sản phẩm:</label>
        <textarea name="description" id="description" required></textarea>
    </div>

    <div>
        <label for="stock_quantity">Số lượng tồn kho:</label>
        <input type="number" name="stock_quantity" id="stock_quantity" required>
    </div>

    <div>
        <label for="is_available">Còn hàng:</label>
        <input type="checkbox" name="is_available" id="is_available" value="1" checked>
    </div>

    <button type="submit">Thêm sản phẩm</button>
</form>
