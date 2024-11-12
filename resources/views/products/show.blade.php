<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        :root{
            --primary: #4f8b69;
        }

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body{
            background-color: #efefef;
        }

        .container{
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px;
            overflow: hidden;
        }

        .card{
            display: flex;
            justify-content: center;
            align-items: center;
            width: 860px;
        }

        .shoeBackground{
            position: relative;
            width: 50%;
            height: 475px;
            box-shadow: -15px 0 35px rgba(0, 0, 0, 0.1),
            0 -15px 35px rgba(0, 0, 0, 0.1),
            0 15px 35px rgba(0, 0, 0, 0.1);
            transition: .5s;
        }

        .gradients{
            position: absolute;
            width: 100%;
            height: 100%;
            left: 0;
            top: 0;
        }

        .gradient{
            position: absolute;
            width: 100%;
            height: 100%;
            left: 0;
            top: 0;
            z-index: -2;
        }

        .first{
            z-index: 0;
            animation: 1s width ease;
        }

        @keyframes width{
            from{
                width: 0%;
            }
            to{
                width: 100%;
            }
        }

        .second{
            z-index: -1;
        }

        .gradient[color="blue"]{
            background-image: linear-gradient(45deg, #0136af, #22abfa);
        }

        .gradient[color="red"]{
            background-image: linear-gradient(45deg, #d62926, #ee625f);
        }

        .gradient[color="green"]{
            background-image: linear-gradient(45deg, #11998e, #1ce669);
        }

        .gradient[color="orange"]{
            background-image: linear-gradient(45deg, #fc4a1a, #f7b733);
        }

        .gradient[color="black"]{
            background-image: linear-gradient(45deg, #111, #666);
        }

        .share{
            position: absolute;
            top: 15px;
            right: 15px;
            background-color: #fff;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            text-align: center;
            font-size: 1.3rem;
            text-decoration: none;
            color: var(--primary);
            transition: .5s;
        }

        .share:hover{
            transform: scale(1.1);
        }

        .share i{
            line-height: 50px;
        }

        .nike{
            position: absolute;
            top: 85px;
            left: 15px;
            font-size: 11rem;
            text-transform: uppercase;
            line-height: .9;
            color: #fff;
            opacity: .1;
        }

        .shoe{
            position: absolute;
            width: 100%;
            opacity: 0;
            bottom: 0;
            right: 0;
            /* transform: rotate(-20deg); */
            transition: .5s;
        }

        .shoe.show{
            opacity: 1;
        }

        .info{
            width: 50%;
            background-color: #fff;
            z-index: 1;
            padding: 35px 40px;
            box-shadow: 15px 0 35px rgba(0, 0, 0, 0.1),
            0 -15px 35px rgba(0, 0, 0, 0.1),
            0 15px 35px rgba(0, 0, 0, 0.1);
        }

        .shoeName{
            padding: 0 0 10px 0;
        }

        .shoeName div{
            display: flex;
            align-items: center;
        }

        .shoeName div .big{
            margin-right: 10px;
            font-size: 2rem;
            color: #333;
            line-height: 1;
        }

        .shoeName div .new{
            background-color: var(--primary);
            text-transform: uppercase;
            color: #fff;
            padding: 3px 10px;
            border-radius: 5px;
            transition: .5s;
        }

        .shoeName .small{
            font-weight: 500;
            color: #444;
            margin-top: 3px;
            text-transform: capitalize;
        }

        .shoeName, .description, .color-container, .size-container{
            border-bottom: 1px solid #dadada;
        }

        .description{
            padding: 10px 0;
        }

        .title{
            color: #3a3a3a;
            font-weight: 600;
            font-size: 1.2rem;
            text-transform: uppercase;
        }

        .text{
            color: #555;
            font-size: 17px;
        }

        .color-container{
            padding: 10px 0;
        }

        .colors{
            padding: 8px 0;
            display: flex;
            align-items: center;
        }

        .color{
            width: 25px;
            height: 25px;
            border-radius: 50%;
            margin: 0 10px;
            border: 5px solid;
            cursor: pointer;
            transition: .5s;
        }

        .color[color="blue"]{
            background-color: #2175f5;
            border-color: #2175f5;
        }

        .color[color="red"]{
            background-color: #f84848;
            border-color: #f84848;
        }

        .color[color="green"]{
            background-color: #29b864;
            border-color: #29b864;
        }

        .color[color="orange"]{
            background-color: #ff5521;
            border-color: #ff5521;
        }

        .color[color="black"]{
            background-color: #444;
            border-color: #444;
        }

        .color.active{
            border-color: #fff;
            box-shadow: 0 0 10px .5px rgba(0, 0, 0, 0.2);
            transform: scale(1.1);
        }

        .size-container{
            padding: 10px 0;
            margin-bottom: 10px;
        }

        .sizes{
            padding: 8px 0;
            display: flex;
            align-items: center;
        }

        .size{
            width: 40px;
            height: 40px;
            border-radius: 6px;
            background-color: #eee;
            margin: 0 10px;
            text-align: center;
            line-height: 40px;
            font-size: 1.1rem;
            font-weight: 500;
            cursor: pointer;
            transition: .3s;
        }

        .size.active{
            background-color: var(--primary);
            color: #fff;
            transition: .5s;
        }

        .buy-price{
            padding-top: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .price{
            color: #333;
            display: flex;
            align-items: flex-start;
        }

        .price h1{
            font-size: 2.1rem;
            font-weight: 600;
            line-height: 1;
        }

        .price i{
            font-size: 1.4rem;
            margin-right: 1px;
        }

        .buy{
            padding: .7rem 1rem;
            background-color: var(--primary);
            text-decoration: none;
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 500;
            font-size: 1.1rem;
            transition: .5s;
        }

        .buy:hover{
            transform: scale(1.1);
        }

        .buy i{
            margin-right: 2px;
        }
        .sugar-option {
            width: 40px; /* Kích thước cố định của hình tròn */
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center; /* Căn giữa nội dung */
            margin: 0 10px;
            border: 2px solid transparent;
            border-radius: 50%;
            cursor: pointer;
            transition: 0.3s;
        }

        .size-option.selected, .sugar-option.selected {
            background-color: var(--primary);
            color: #fff;
            border: 2px solid var(--primary);
        }
        .size-option {
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 10px;
            border: 2px solid transparent;
            border-radius: 50%;
            cursor: pointer;
            transition: 0.3s;
        }

        .size-option img {
            width: 60%; /* Đặt kích thước ảnh nhỏ hơn để có không gian */
            height: auto;
            object-fit: contain;
            /* padding-bottom: 15px; */
            display: block;
        }
        .gradient[color="#4f8b69"] {
            background-image: linear-gradient(45deg, #4f8b69, #74b28d);
        }
        @media (max-width: 1070px){
            .shoe{
                width: 135%;
            }
        }

        @media (max-width: 1000px){
            .card{
                flex-direction: column;
                width: 100%;
                box-shadow: 0 0 35px 1px rgba(0, 0, 0, 0.2);
            }
            
            .card > div{
                width: 100%;
                box-shadow: none;
            }

            .shoe{
                width: 100%;
                transform: rotate(-5deg) translateY(-50%);
                top: 55%;
                right: 2%;
            }

            .nike{
                top: 20%;
                left: 5%;
            }
        }

        @media (max-width: 600px){
            .share{
                width: 40px;
                height: 40px;
            }

            .share i {
                font-size: 1rem;
                line-height: 40px;
            }

            .logo{
                width: 70px;
            }
        }

        @media (max-width: 490px){
            .nike{
                font-size: 7rem;
            }

            .shoeName div .big{
                font-size: 1.3rem;
            }

            .small{
                font-size: 1rem;
            }

            .new{
                padding: 2px 6px;
                font-size: .9rem;
            }

            .title{
                font-size: .9rem;
            }

            .text{
                font-size: .8rem;
            }

            .buy{
                padding: .5rem .8rem;
                font-size: .8rem;
            }

            .price h1{
                font-size: 1.5rem;
            }

            .price i{
                font-size: .9rem;
            }

            .size{
                width: 30px;
                height: 30px;
                margin: 0 8px;
                font-size: .9rem;
                line-height: 30px;
            }

            .color{
                margin: 0 6px;
                width: 0 20px;
                width: 20px;
                height: 20px;
                border-width: 4px;
            }

            .share{
                width: 35px;
                height: 35px;
                top: 10px;
                right: 10px;
            }

            .share i{
                font-size: .8rem;
                line-height: 35px;
            }

            .info{
                padding: 20px;
            }
        }

        @media (max-width: 400px){
            .buy i{
                display: none;
            }

            .container{
                padding: 20px;
            }
        }
    </style>
</head>

<body>
@include('layouts.header')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <div class="container">
        <div class="card">
            <div class="shoeBackground">
                <div class="gradients">
                    <div class="gradient second" color="#4f8b69"></div>
                </div>
                <h1 class="nike">Starbuck</h1>
                <img src="{{ asset('images/product/' . $product->image) }}" alt="{{ $product->name }}" class="shoe show" color="blue">
            </div>
            <div class="info">
                <div class="shoeName">
                    <div>
                        <h1 class="title_detail">{{ $product->name }}</h1>
                        <span class="new">new</span>
                    </div>
                    <h3 class="colorCat">{{ $product->category }}</h3>
                </div>
                <div class="description">
                    <h3 class="title">Product Info</h3>
                    <p class="text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                </div>
                <div class="size-container">
                    <h3 class="title">Size</h3>
                    <div class="sizes">
                        <span class="size-option" data-size="S"><img src="https://www.starbucks.com/app-assets/0295bad53506b2b3c22b.svg" alt="" width="10"></span>
                        <span class="size-option" data-size="M"><img src="https://www.starbucks.com/app-assets/d57860098a9c7cb67f0d.svg" alt=""></span>
                        <span class="size-option" data-size="L"><img src="https://www.starbucks.com/app-assets/f1c3892d2d28cade899a.svg" alt=""></span>
                        <span class="size-option" data-size="XL"><img src="https://www.starbucks.com/app-assets/8f4f6108fbeefb3455f0.svg" alt=""></span>
                    </div>
                </div>
                <div class="sugar-container">
                    <h3 class="title">Amount of Sugar</h3>
                    <div class="sizes">
                        <span class="sugar-option" data-sugar="30">30%</span>
                        <span class="sugar-option" data-sugar="50">50%</span>
                        <span class="sugar-option" data-sugar="75">75%</span>
                        <span class="sugar-option" data-sugar="100">100%</span>
                    </div>
                </div>
                <div class="quantity-container">
                    <h3 class="title">Quantity</h3>
                    <input type="number" id="quantity" value="1" min="1">
                </div>
                <div class="buy-price">
                    <button type="button" id="add-to-cart-btn">
                        <span>Add to Cart</span>
                    </button>
                    <div class="price">
                        <h1>{{ number_format($product->price, 0, '.', ',') }} VND</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let selectedSize = null;
            let selectedSugar = '50'; // Default sugar value

            // Select size
            document.querySelectorAll('.size-option').forEach(option => {
                option.addEventListener('click', function () {
                    document.querySelectorAll('.size-option').forEach(opt => opt.classList.remove('selected'));
                    option.classList.add('selected');
                    selectedSize = option.dataset.size;
                });
            });

            // Select sugar level
            document.querySelectorAll('.sugar-option').forEach(option => {
                option.addEventListener('click', function () {
                    document.querySelectorAll('.sugar-option').forEach(opt => opt.classList.remove('selected'));
                    option.classList.add('selected');
                    selectedSugar = option.dataset.sugar;
                });
            });

            // Add to cart event
            document.getElementById('add-to-cart-btn').addEventListener('click', function () {
                if (!selectedSize) {
                    alert('Please select a size');
                    return;
                }

                const quantity = document.getElementById('quantity').value || 1;

                addToCart(selectedSize, selectedSugar, quantity);
            });

            function addToCart(size, sugar, quantity) {
                const productId = {{ $product->product_id }};

                fetch(`{{ route('cart.add', ':productId') }}`.replace(':productId', productId), {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ size, sugar, quantity })
                })
                .then(response => response.json())
                .then(data => {
                    alert('Product added to cart');
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            }
        });
    </script>
</body>

</html>