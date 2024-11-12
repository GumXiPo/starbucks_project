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
            align-items: center;
        }

        h5 {
            text-transform: uppercase;
            margin: 0;
            font-size: 14px;
        }

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
            margin: 40px auto;
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

        .size-options {
            display: flex;
            justify-content: space-around;
            padding: 10px 0;
            gap: 20px;
        }

        .size-option {
            padding: 10px 20px;
            border: 1px solid var(--gray);
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .size-option.selected {
            background-color: var(--pgb);
            color: white;
        }

        .size-option:hover {
            background-color: var(--gray);
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

        .footer button>img {
            width: 31px;
        }

        .footer button>span {
            font-size: 18px;
            text-transform: uppercase;
            font-weight: 700;
            margin-left: 10px;
            color: white;
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

        .sugar-options {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }

        .sugar-option {
            padding: 10px;
            border: 1px solid #ccc;
            cursor: pointer;
            text-align: center;
        }

        .sugar-option.selected {
            background-color: #4CAF50;
            /* Màu nền khi chọn */
            color: white;
            border-color: #4CAF50;
        }
    </style>
</head>

<body>
    <div class="container_detail">
        <div class="product-image">
            <div class="product-pic">
                <img src="{{ asset('images/product/' . $product->image) }}" alt="{{ $product->name }}" width="300">
            </div>
        </div>
        <div class="product-details">
            <div class="product-details-header">
                <h5 class="title_detail">{{ $product->name }}</h5>
                <span class="colorCat">{{ $product->category }}</span>
                <div class="price_detail">
                    <span class="current">{{ number_format($product->price, 0, '.', ',') }} VND</span>
                </div>
            </div>

            <!-- Chọn kích thước -->
            <div class="size-options">
                <div class="size-option" data-size="XS">
                    <p>XS</p>
                </div>
                <div class="size-option" data-size="S">
                    <p>S</p>
                </div>
                <div class="size-option" data-size="XL">
                    <p>XL</p>
                </div>
            </div>

            <!-- Chọn lượng đường -->
            <div class="sugar-options">
                <div class="sugar-option" data-sugar="30">
                    <p>30%</p>
                </div>
                <div class="sugar-option" data-sugar="50">
                    <p>50%</p>
                </div>
                <div class="sugar-option" data-sugar="100">
                    <p>100%</p>
                </div>
            </div>

            <!-- Thêm vào giỏ -->
            <input type="number" name="quantity" id="quantity" value="1" min="1" style="width: 50px; margin-top: 10px;">

            <div class="footer">
                <button type="button" id="add-to-cart-btn">
                    <img src="https://cdn3.iconfinder.com/data/icons/e-commerce-1/100/Cart_Add-512.png" alt="Add to Cart">
                    <span>Thêm vào giỏ</span>
                </button>
            </div>
        </div>
    </div>

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <script>
    document.addEventListener('DOMContentLoaded', function () {
        let selectedSize = null;
        let selectedSugar = '50'; // Đặt giá trị mặc định cho lượng đường

        // Xử lý sự kiện chọn size
        document.querySelectorAll('.size-option').forEach(option => {
            option.addEventListener('click', function () {
                document.querySelectorAll('.size-option').forEach(opt => opt.classList.remove('selected'));
                option.classList.add('selected');
                selectedSize = option.dataset.size; // Lấy kích thước được chọn
            });
        });

        // Xử lý sự kiện chọn lượng đường
        document.querySelectorAll('.sugar-option').forEach(option => {
            option.addEventListener('click', function () {
                document.querySelectorAll('.sugar-option').forEach(opt => opt.classList.remove('selected'));
                option.classList.add('selected');
                selectedSugar = option.dataset.sugar; // Lấy lượng đường được chọn
            });
        });

        // Xử lý sự kiện thêm vào giỏ hàng
        document.getElementById('add-to-cart-btn').addEventListener('click', function () {
            if (!selectedSize) {
                alert('Vui lòng chọn kích thước');
                return;
            }

            const quantity = document.getElementById('quantity').value; // Lấy số lượng từ input

            // Gửi yêu cầu AJAX để thêm sản phẩm vào giỏ hàng
            addToCart(selectedSize, selectedSugar, quantity);
        });

        function addToCart(size, sugar, quantity) {
            // Get the product_id using Blade syntax and PHP's json_encode
            const productId = <?php echo json_encode($product->product_id); ?>;

            // Gửi yêu cầu AJAX đến backend
            fetch('{{ route('cart.add', ':productId') }}'.replace(':productId', productId), {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ product_id: productId, size: size, sugar: sugar, quantity: quantity })
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