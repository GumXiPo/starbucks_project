<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Sản Phẩm</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .product-menu {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px; /* Khoảng cách giữa các sản phẩm */
        }
        .product-item {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden; /* Giới hạn hình ảnh và nội dung bên trong card */
            transition: transform 0.2s; /* Hiệu ứng khi hover */
            width: 250px; /* Chiều rộng cố định cho các card */
        }
        .product-item:hover {
            transform: scale(1.05); /* Phóng to card khi hover */
        }
        .product-item img {
            max-width: 100%;
            height: auto;
        }
        .product-info {
            padding: 15px;
        }
        .product-info h2 {
            font-size: 1.2em;
            margin: 10px 0;
            color: #333;
        }
        .product-info p {
            margin: 5px 0;
            color: #666;
        }
        .price {
            font-size: 1.1em;
            color: #d9534f; /* Màu cho giá */
            font-weight: bold;
        }
        .availability {
            font-size: 0.9em;
            font-weight: bold;
            color: #28a745; /* Màu cho còn hàng */
        }
        /* Style cho nút Add to Cart */
        .add-to-cart-btn {
            display: block;
            text-align: center;
            margin: 15px 0 0 0;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            font-size: 1em;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.2s;
        }
        .add-to-cart-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Menu Sản Phẩm</h1>
    <div class="product-menu">
        @foreach($products as $product)
        <div class="product-item">
            <img src="{{ asset('images/product/' . $product->image) }}" alt="{{ $product->name }}">
            <div class="product-info">
                <h2>{{ $product->name }}</h2>
                <p>{{ $product->description }}</p>
                <p class="price">Giá: {{ number_format($product->price, 0, ',', '.') }} VNĐ</p>
                <p>Danh mục: {{ $product->category }}</p>
                <p class="availability">Còn hàng: {{ $product->is_available ? 'Còn Hàng' : 'Hết Hàng' }}</p>
                <p>Số lượng tồn: {{ $product->stock_quantity }}</p>
                <p>Nhà cung cấp: {{ $product->supplier }}</p>
                <!-- Nút Add to Cart -->
                <a href="" class="add-to-cart-btn">Thêm vào giỏ</a>
            </div>
        </div>
        @endforeach
    </div>
</body>
</html>
