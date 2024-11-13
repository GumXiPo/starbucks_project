<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
            /* font-size: 2.1rem; */
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
        /* From Uiverse.io by vinodjangid07 */ 
        .cartBtn {
        width: 155px;
        height: 50px;
        border: none;
        border-radius: 0px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        color: white;
        font-weight: 500;
        position: relative;
        background-color: rgb(29, 29, 29);
        box-shadow: 0 20px 30px -7px rgba(27, 27, 27, 0.219);
        transition: all 0.3s ease-in-out;
        cursor: pointer;
        overflow: hidden;
        }

        .cart {
        z-index: 2;
        }

        .cartBtn:active {
        transform: scale(0.96);
        }

        .product {
        position: absolute;
        width: 12px;
        border-radius: 3px;
        content: "";
        left: 23px;
        bottom: 23px;
        opacity: 0;
        z-index: 1;
        fill: rgb(211, 211, 211);
        }

        .cartBtn:hover .product {
        animation: slide-in-top 1.2s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        }
        @import url("https://fonts.googleapis.com/css2?family=Inter&display=swap");
        .quantity-control {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: fit-content;
        margin: 0 auto;
        background: #eaeaea;
        border-radius: 10px;
        padding: 1rem 0.4rem;
        }

        .quantity-btn {
        background: transparent;
        border: none;
        outline: none;
        margin: 0;
        padding: 0px 8px;
        cursor: pointer;
        }
        .quantity-btn svg {
        width: 15px;
        height: 15px;
        }
        .quantity-input {
        outline: none;
        user-select: none;
        text-align: center;
        width: 47px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: transparent;
        border: none;
        }
        .quantity-input::-webkit-inner-spin-button,
        .quantity-input::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }

        @keyframes slide-in-top {
        0% {
            transform: translateY(-30px);
            opacity: 1;
        }

        100% {
            transform: translateY(0) rotate(-90deg);
            opacity: 1;
        }
        }

        .cartBtn:hover .cart {
        animation: slide-in-left 1s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        }

        @keyframes slide-in-left {
        0% {
            transform: translateX(-10px);
            opacity: 0;
        }

        100% {
            transform: translateX(0);
            opacity: 1;
        }
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
        
        .star-rating {
            display: flex;
            color: #ffc107;
            gap: 5px;
        }

        .star-rating input {
            display: none;
        }

        .star-rating label {
            font-size: 1.5em;
            color: #ddd;
            cursor: pointer;
        }

        .star-rating input:checked~label,
        .star-rating label:hover,
        .star-rating label:hover~label {
            color: #f39c12;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .btn-primary {
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    
    </style>
</head>

<body>
@include('layouts.header')

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
                    <p class="text">{{ $product->description }}</p>
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
                    <div class="quantity-control" data-quantity="">
                        <button class="quantity-btn" data-quantity-minus=""><svg viewBox="0 0 409.6 409.6">
                            <g>
                                <path d="M392.533,187.733H17.067C7.641,187.733,0,195.374,0,204.8s7.641,17.067,17.067,17.067h375.467 c9.426,0,17.067-7.641,17.067-17.067S401.959,187.733,392.533,187.733z"/>
                            </g>
                        </svg></button>
                        <input type="number" class="quantity-input" id="quantity" value="1" step="1" min="1" name="quantity">
                        <button class="quantity-btn" data-quantity-plus=""><svg viewBox="0 0 426.66667 426.66667">
                            <path d="m405.332031 192h-170.664062v-170.667969c0-11.773437-9.558594-21.332031-21.335938-21.332031-11.773437 0-21.332031 9.558594-21.332031 21.332031v170.667969h-170.667969c-11.773437 0-21.332031 9.558594-21.332031 21.332031 0 11.777344 9.558594 21.335938 21.332031 21.335938h170.667969v170.664062c0 11.777344 9.558594 21.335938 21.332031 21.335938 11.777344 0 21.335938-9.558594 21.335938-21.335938v-170.664062h170.664062c11.777344 0 21.335938-9.558594 21.335938-21.335938 0-11.773437-9.558594-21.332031-21.335938-21.332031zm0 0"/>
                        </svg></button>
                    </div>
                </div>
                <div class="buy-price">

                    <button class="cartBtn" type="button" id="add-to-cart-btn">
                        <svg class="cart" fill="white" viewBox="0 0 576 512" height="1em" xmlns="http://www.w3.org/2000/svg"><path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"></path></svg>
                        ADD TO CART
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512" class="product"><path d="M211.8 0c7.8 0 14.3 5.7 16.7 13.2C240.8 51.9 277.1 80 320 80s79.2-28.1 91.5-66.8C413.9 5.7 420.4 0 428.2 0h12.6c22.5 0 44.2 7.9 61.5 22.3L628.5 127.4c6.6 5.5 10.7 13.5 11.4 22.1s-2.1 17.1-7.8 23.6l-56 64c-11.4 13.1-31.2 14.6-44.6 3.5L480 197.7V448c0 35.3-28.7 64-64 64H224c-35.3 0-64-28.7-64-64V197.7l-51.5 42.9c-13.3 11.1-33.1 9.6-44.6-3.5l-56-64c-5.7-6.5-8.5-15-7.8-23.6s4.8-16.6 11.4-22.1L137.7 22.3C155 7.9 176.7 0 199.2 0h12.6z"></path></svg>
                    </button>
                    <div class="price">
                        <h1>{{ number_format($product->price, 0, '.', ',') }} VND</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
    <h1>{{ $product->name }}</h1>
    <p>{{ $product->description }}</p>
    <p>Giá: {{ number_format($product->price, 0, ',', '.') }} VND</p>

    <hr>

    <h3>Phản hồi của khách hàng</h3>

    <!-- Hiển thị thông báo nếu phản hồi thành công -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form gửi phản hồi -->
    @auth
    <div class="card mb-4">
        <div class="card-header">
            Gửi phản hồi
        </div>
        <div class="card-body">
            <form action="{{ route('reviews.store', $product->product_id) }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <!-- Star Rating -->
                    <div class="star-rating">
                        <input type="radio" id="star5" name="rating" value="5" />
                        <label for="star5" title="5 sao"><i class="fa-solid fa-star text-warning"></i></label>

                        <input type="radio" id="star4" name="rating" value="4" />
                        <label for="star4" title="4 sao"><i class="fa-solid fa-star text-warning"></i></label>

                        <input type="radio" id="star3" name="rating" value="3" />
                        <label for="star3" title="3 sao"><i class="fa-solid fa-star text-warning"></i></label>

                        <input type="radio" id="star2" name="rating" value="2" />
                        <label for="star2" title="2 sao"><i class="fa-solid fa-star text-warning"></i></label>

                        <input type="radio" id="star1" name="rating" value="1" />
                        <label for="star1" title="1 sao"><i class="fa-solid fa-star text-warning"></i></label>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="comment">Phản hồi</label>
                    <textarea name="comment" id="comment" class="form-control" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Gửi phản hồi</button>
            </form>
        </div>
    </div>
    @else
    <p><a href="{{ route('login') }}">Đăng nhập</a> để gửi phản hồi.</p>
    @endauth

    <hr>

    <!-- Hiển thị các phản hồi -->
    @if($product->reviews->count() > 0)
        <div class="row">
            @foreach($product->reviews as $review)
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $review->user->username }}</h5>

                        <!-- Hiển thị sao đánh giá -->
                        <div class="star-rating">
                            @for ($i = 1; $i <= 5; $i++)
                                @if($i <= $review->rating)
                                    <i class="fa-solid fa-star text-warning"></i> <!-- Sao đầy màu vàng -->
                                @else
                                    <i class="fa-regular fa-star text-warning"></i> <!-- Sao rỗng màu vàng -->
                                @endif
                            @endfor
                        </div>

                        <p class="card-text">{{ $review->comment }}</p>
                    </div>
                    <div class="card-footer text-muted">
                        {{ $review->created_at->format('d/m/Y') }}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @else
        <p>Chưa có phản hồi nào cho sản phẩm này.</p>
    @endif
</div>



    <meta name="csrf-token" content="{{ csrf_token() }}">
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

            // Quantity control logic
            const quantityInput = document.getElementById('quantity');
            let quantity = parseInt(quantityInput.value);

            document.querySelector('[data-quantity-minus]').addEventListener('click', function () {
                if (quantity > 1) {
                    quantity--;
                    quantityInput.value = quantity;
                }
            });

            document.querySelector('[data-quantity-plus]').addEventListener('click', function () {
                quantity++;
                quantityInput.value = quantity;
            });

            // Add to cart event
            document.getElementById('add-to-cart-btn').addEventListener('click', function () {
                if (!selectedSize) {
                    alert('Please select a size');
                    return;
                }

                const quantity = quantityInput.value || 1;

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