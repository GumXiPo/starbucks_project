<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
       /* Định nghĩa các biến màu sắc và giá trị */
        :root {
            --textColor: #444444;
            --gray: #bbb;
            --bg: #fff;
            --pgb: #42c8cb;
            --pgt: #6bffc8;
            --bgb: #ff4164;
            --bgt: #ff886b;
            --bdot1: #59e8c8;
            --bdot2: #ffee71;
            --bdot3: #6654af;
            --bdot4: #343434;
            --bdot5: #dfdfdf;
            --star: #fe6067;
            --discount: #fe6168;
        }

        * {
            font-family: 'Oswald', sans-serif;
        }

        body {
            background-color: var(--bg);
            height: 100vh;
            margin: auto;
            display: flex;
            justify-content: center;

            color: var(--textColor);
        }

        .container_detail {
            margin: 30px;
            width: 100%;
            max-width: 900px;
            justify-content: center;
            display: flex;
            /* flex-direction: column; */
            align-items: center;
        }

        h5 {
            text-transform: uppercase;
            margin: 0;
            font-size: 14px;
        }

        ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        a {
            text-decoration: none;
            color: var(--gray);
        }

        /* Định dạng sản phẩm */
        .product-image {
            display: flex;
            flex-direction: column;
            align-items: center;
            background: linear-gradient(to bottom, var(--pgt) 0%, var(--pgb) 100%);
            border-radius: 20px 20px 0 0;
            padding: 55px 0;
            width: 100%;
            margin: auto;
        }

        .product-pic {
            max-width: 300px;
            position: relative;
            left: 0;
            margin: 40px auto;  /* Căn giữa hình ảnh */
            filter: drop-shadow(-6px 40px 23px rgba(0, 0, 0, 0.5));
        }

        .product-details {
            padding: 40px;
            background-color: white;
            border-radius: 0 0 20px 20px;
        }

        .product-details .title_detail {
            text-transform: uppercase;
            margin: 0;
        }

        .product-details .colorCat {
            text-transform: uppercase;
            font-style: italic;
            color: var(--gray);
            font-weight: 700;
            font-size: 14px;
        }

        .product-details .price_detail {
            font-weight: 700;
            margin-top: 5px;
            font-size: 18px;
        }

        .product-details .price_detail .current {
            color: var(--discount);
            margin-left: 6px;
        }

        .product-details .before {
            text-decoration: line-through;
        }

        .product-details .product-details-header {
            margin-bottom: 50px;
            position: relative;
        }

        .product-details article > h5 {
            margin: 0;
        }

        .product-details article > p {
            color: var(--gray);
            margin: .5em 0;
            font-size: 14px;
            line-height: 1.6;
        }

        .product-details .controls_detail {
            margin: 3em 0;
            display: flex;
        }

        .product-details .controls_detail .option {
            margin-top: 12px;
            display: inline-block;
            position: relative;
        }

        .product-details .controls_detail .option:hover {
            color: var(--textColor);
        }

        .product-details .controls_detail ul {
            display: flex;
            margin: 15px 5px;
        }

        .product-details .color li + li {
            margin-left: 15px;
        }

        .product-details .colors {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            display: block;
        }

        .product-details .rate a {
            font-size: 18px;
            color: var(--gray);
        }

        .product-details .rate a.active,
        .product-details .rate a:hover {
            color: var(--star);
        }

        .dots {
            display: flex;
            margin-top: 40px;
        }

        .dots > a {
            background-color: var(--dot);
            width: 10px;
            height: 10px;
            margin: 0 4px;
            border-radius: 50%;
        }

        .dots > a:hover,
        .dots > a.active {
            background-color: white;
        }

        .size-option {
            text-align: center;
            cursor: pointer;
            position: relative;
            padding-bottom: 10px; /* Giảm khoảng cách dưới văn bản */
        }

        .size-options {
            display: flex;
            justify-content: space-around;
            align-items: center;
            padding: 20px;
            width: 100%; /* Đảm bảo phần tử chiếm toàn bộ chiều rộng */
            gap: 10px; /* Khoảng cách giữa các tùy chọn */
        }

        .size-option p {
            margin: 0;
            z-index: 1; /* Đặt văn bản lên trên */
        }

        .size-option.selected {
            color: #7ED4AD; /* Thêm màu sắc cho tùy chọn đã chọn */
        }

        .size-option .size-image {
            display: none; /* Ẩn tất cả các hình ảnh */
        }

        .size-option.selected .size-image {
            display: block; /* Hiển thị hình ảnh đã chọn */
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        .size-image {
            display: none;
            opacity: 0;
            animation: fadeIn 0.5s forwards;
        }

        .size-image.selected {
            display: block;
        }

        .footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .footer button {
            display: flex;
            border: 0;
            padding: 15px 25px;
            align-items: center;
            border-radius: 7px;
            cursor: pointer;
            background: linear-gradient(to bottom, var(--bgt) 0%, var(--bgb) 100%);
            box-shadow: 0 10px 30px 0 rgba(255, 88, 107, 0.7);
            transition: 200ms;
        }

        .footer button:hover {
            background: linear-gradient(to bottom, var(--bgb) 0%, var(--bgt) 100%);
        }

        .footer button > img {
            width: 31px;
        }

        .footer button > span {
            font-size: 18px;
            text-transform: uppercase;
            font-weight: 700;
            margin-left: 10px;
            color: white;
        }

        .footer a img {
            width: 24px;
            opacity: .8;
        }

        .footer a:hover img {
            opacity: 1;
        }

        @keyframes moveCircle {
            0% {
                transform: translate(-50%, -50%) translateX(0);
            }
            100% {
                transform: translate(-50%, -50%) translateX(20px); /* Di chuyển qua lại 20px */
            }
        }

        .size-option.selected .circle {
            background-color: #42c8cb; /* Màu nền khi được chọn */
        }

        @media (max-width: 600px) {
            .product-details .rate {
                position: absolute;
                top: 12px;
                right: 10px;
                margin-top: 0;
            }
        }

        @media (max-width: 900px) {
            .container_detail {
                display: flex;
                flex-direction: row;
                align-items: normal;
                margin: auto;
            }

            .product-image {
                border-radius: 20px 0 0 20px;
                max-width: 330px;
            }

            .product-pic {
                left: -40px;
                max-width: 330px;
            }

            .product-details {
                padding: 35px;
                border-radius: 0 20px 20px 0;
                max-width: 500px;
            }
        }
    </style>
</head>
<body>
    <div class="container_detail">
        <div class="product-image">
            <div class="product-pic">
                <img src="{{ asset('storage/products/' . $product->image) }}" alt="{{ $product->product_name }}" width="300">
            </div>
        </div>
        <div class="product-details">
            <div class="product-details-header">
                <h5 class="title_detail">{{ $product->product_name }}</h5>
                <span class="colorCat">{{ $product->category->name }}</span>
                <div class="price_detail">
                    <span class="current">{{ number_format($product->price, 0, '.', ',') }} VND</span>
                </div>
            </div>
            <div class="size-options">
                @foreach($product->sizes as $size)
                    <div class="size-option" data-size="{{ $size->id }}">
                        <p>{{ $size->name }}</p>
                        <img class="size-image" src="{{ asset('storage/sizes/' . $size->image) }}" alt="size" />
                    </div>
                @endforeach
            </div>
            <div class="footer">
                <button id="add-to-cart-btn">
                    <img src="https://cdn3.iconfinder.com/data/icons/e-commerce-1/100/Cart_Add-512.png" alt="Add to Cart">
                    <span>Thêm vào giỏ</span>
                </button>
            </div>
        </div>
    </div>

    <script>
       document.addEventListener('DOMContentLoaded', function () {
    let selectedSize = null;

    // Xử lý sự kiện chọn size
    document.querySelectorAll('.size-option').forEach(option => {
        option.addEventListener('click', function () {
            document.querySelectorAll('.size-option').forEach(opt => opt.classList.remove('selected'));
            option.classList.add('selected');
            selectedSize = option.dataset.size;
        });
    });

    // Xử lý sự kiện thêm vào giỏ hàng
    document.getElementById('add-to-cart-btn').addEventListener('click', function () {
        if (!selectedSize) {
            alert('Vui lòng chọn kích thước');
            return;
        }
        // Lưu trữ vào giỏ hàng
        addToCart(selectedSize);
    });

    function addToCart(sizeId) {
        // Get the product_id using Blade syntax and PHP's json_encode
        const productId = <?php echo json_encode($product->product_id); ?>;

        // Gửi yêu cầu AJAX để thêm sản phẩm vào giỏ hàng
        fetch('/add-to-cart', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ product_id: productId, size_id: sizeId })
        })
        .then(response => response.json())
        .then(data => {
            alert('Sản phẩm đã được thêm vào giỏ hàng');
        })
        .catch(error => {
            console.error('Lỗi:', error);
        });
    }
});

    </script>
</body>
</html>
