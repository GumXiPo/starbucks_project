@extends('layouts.apps')

@section('contents')
<div class="container">
    <h2>Chỉnh sửa sản phẩm</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route('products.update', ['id' => $product->product_id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Tên sản phẩm</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product->name) }}" required>
        </div>

        <div class="form-group">
            <label for="image">Hình ảnh</label>
            <input type="text" class="form-control" id="image" name="image" value="{{ old('image', $product->image) }}">
        </div>

        <div class="form-group">
            <label for="description">Mô tả</label>
            <textarea class="form-control" id="description" name="description">{{ old('description', $product->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="price">Giá</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $product->price) }}" required step="0.01">
        </div>

        <div class="form-group">
            <label for="category">Danh mục</label>
            <input type="text" class="form-control" id="category" name="category" value="{{ old('category', $product->category) }}" required>
        </div>

        <div class="form-group">
            <label for="is_available">Còn hàng</label>
            <select class="form-control" id="is_available" name="is_available" required>
                <option value="1" {{ $product->is_available ? 'selected' : '' }}>Có</option>
                <option value="0" {{ !$product->is_available ? 'selected' : '' }}>Không</option>
            </select>
        </div>

        <div class="form-group">
            <label for="stock_quantity">Số lượng</label>
            <input type="number" class="form-control" id="stock_quantity" name="stock_quantity" value="{{ old('stock_quantity', $product->stock_quantity) }}" required>
        </div>

        <div class="form-group">
            <label for="supplier">Nhà cung cấp</label>
            <input type="text" class="form-control" id="supplier" name="supplier" value="{{ old('supplier', $product->supplier) }}"/>
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật sản phẩm</button>
    </form>
</div>
@endsection
