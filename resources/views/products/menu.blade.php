<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Menu Sản Phẩm</title>
</head>
<body>
    @include('layouts.header')
    <h1 style="padding-top:100px; display:flex; justify-content:center; align-items: center;">Menu Sản Phẩm</h1>

    <!-- Form tìm kiếm -->
    <div class="search-form">
        <form action="{{ route('product.search') }}" method="GET">
            <input type="text" name="search" placeholder="Tìm kiếm sản phẩm..." value="{{ request('search') }}">
            <button type="submit">Tìm kiếm</button>
        </form>
    </div>

    <div class="product-menu">
        @if($products->isEmpty())
            <p>Không có sản phẩm nào phù hợp với tìm kiếm của bạn.</p>
        @else
            @foreach($products as $product)
            <div class="product-item">
                <img src="{{ asset('images/product/' . $product->image) }}" alt="{{ $product->name }}">
                <div class="product-info-menu">
                    <h2>{{ $product->name }}</h2>
                    <p>{{ $product->description }}</p>
                    <p class="price">Giá: {{ number_format($product->price, 0, ',', '.') }} VNĐ</p>
                    <p>Danh mục: {{ $product->category }}</p>
                    <p class="availability">Còn hàng: {{ $product->is_available ? 'Còn Hàng' : 'Hết Hàng' }}</p>
                    <p>Số lượng tồn: {{ $product->stock_quantity }}</p>
                    <p>Nhà cung cấp: {{ $product->supplier }}</p>
                    <a href="" class="add-to-cart-btn">Thêm vào giỏ</a>
                </div>
            </div>
            @endforeach
        @endif
    </div>
</body>
</html>
