<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
     body{
            background: #ddd;
            min-height: 100vh;
            vertical-align: middle;
            display: flex;
        }
        .body_cart_detail {
            display: flex;
            flex-direction: column; /* Đảm bảo các phần tử con xếp theo chiều dọc */
            justify-content: space-between;
            min-height: 100vh;
            padding: 1rem;
        }
        .title{
            margin-bottom: 5vh;
        }
        .card{
            margin: auto;
            max-width: 950px;
            width: 90%;
            box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border-radius: 1rem;
            border: transparent;
        }
        @media(max-width:767px){
            .card{
                margin: 3vh auto;
            }
        }
        .cart{
            background-color: #fff;
            padding: 4vh 5vh;
            border-bottom-left-radius: 1rem;
            border-top-left-radius: 1rem;
        }
        @media(max-width:767px){
            .cart{
                padding: 4vh;
                border-bottom-left-radius: unset;
                border-top-right-radius: 1rem;
            }
        }
        .summary{
            background-color: #ddd;
            border-top-right-radius: 1rem;
            border-bottom-right-radius: 1rem;
            padding: 4vh;
            color: rgb(65, 65, 65);
        }
        @media(max-width:767px){
            .summary{
            border-top-right-radius: unset;
            border-bottom-left-radius: 1rem;
            }
        }
        .summary .col-2{
            padding: 0;
        }
        .summary .col-10
        {
            padding: 0;
        }.row{
            margin: 0;
        }
        .title b{
            font-size: 1.5rem;
        }
        .main{
            margin: 0;
            padding: 2vh 0;
            width: 100%;
        }
        .col-2, .col{
            padding: 0 1vh;
        }
        .body_cart_detail a{
            padding: 0 1vh;
        }
        .close{
            margin-left: auto;
            font-size: 0.7rem;
        }
        img{
            width: 3.5rem;
        }
        .back-to-shop {
            margin-top: auto; /* Đảm bảo nút luôn ở dưới cùng */
        }
        h5{
            margin-top: 4vh;
        }
        hr{
            margin-top: 1.25rem;
        }
        form{
            padding: 2vh 0;
        }
        .body_cart_detail select{
            border: 1px solid rgba(0, 0, 0, 0.137);
            padding: 1.5vh 1vh;
            margin-bottom: 4vh;
            outline: none;
            width: 100%;
            background-color: rgb(247, 247, 247);
        }
        .body_cart_detail input{
            border: 1px solid rgba(0, 0, 0, 0.137);
            padding: 1vh;
            margin-bottom: 4vh;
            outline: none;
            width: 100%;
            background-color: rgb(247, 247, 247);
        }
        input:focus::-webkit-input-placeholder
        {
            color:transparent;
        }
        .btn{
            background-color: #000;
            border-color: #000;
            color: white;
            width: 100%;
            font-size: 0.7rem;
            margin-top: 4vh;
            padding: 1vh;
            border-radius: 0;
        }
        .btn:focus{
            box-shadow: none;
            outline: none;
            box-shadow: none;
            color: white;
            -webkit-box-shadow: none;
            -webkit-user-select: none;
            transition: none; 
        }
        .btn:hover{
            color: white;
        }
        a{
            color: black; 
        }
        a:hover{
            color: black;
            text-decoration: none;
        }
        #code{
            background-image: linear-gradient(to left, rgba(255, 255, 255, 0.253) , rgba(255, 255, 255, 0.185)), url("https://img.icons8.com/small/16/000000/long-arrow-right.png");
            background-repeat: no-repeat;
            background-position-x: 95%;
            background-position-y: center;
        }.quantity-control {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .quantity-control button {
            width: 30px;
            height: 30px;
            font-size: 1rem;
            margin: 0 5px;
        }
        .quantity-control span {
            padding: 0 10px;
            font-weight: 200;
        }
        .delete_item {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
        
    </style>
</head>
    <!-- Include header -->
    @include('layouts.header')
    @extends('layouts.app')
    @section('content')

    @if (count($cart) > 0)
        <div class="body_cart_detail">
            <div class="card">
                <div class="row">
                    <div class="col-md-8 cart">
                        <div class="title">
                            <div class="row">
                                <div class="col"><h4><b>Shopping Cart</b></h4></div>
                                <div class="col align-self-center text-right text-muted"> {{ array_sum(array_column($cart, 'quantity')) }} Item</div>
                            </div>
                        </div>
                        @foreach ($cart as $item)
                        <div class="row main align-items-center">
                            <div class="col-2"><img src="{{ asset('images/product/' . ($item['image'] ?? 'default.png')) }}" alt="{{ $item['name'] }}" class="img-fluid"></div>
                            <div class="col">
                                <div class="row text-muted">Size: {{ $item['size'] }}</div>
                                <div class="row">{{ $item['name'] }}</div>
                            </div>
                            <div class="col quantity-control">
                                <button onclick="updateQuantity('{{ $item['product_id'] }}', -1)" class="btn btn-sm btn-light">-</button>
                                <span class="border px-2">{{ $item['quantity'] }}</span>
                                <button onclick="updateQuantity('{{ $item['product_id'] }}', 1)" class="btn btn-sm btn-light">+</button>
                            </div>
                            <div class="col">
                                {{ $item['price'] }} VNĐ
                            </div>
                            <div class="col">
                                <button onclick="removeFromCart('{{ $item['product_id'] }}')"><i class="fa-regular fa-trash-can"></i></button>
                            </div>
                        </div>
                        @endforeach
                        <div class="back-to-shop"><a href="{{ route('products.menu') }}">&leftarrow;<span class="text-muted">Back to shop</span></a></div>
                    </div>
                    <div class="col-md-4 summary">
                        <div><h5><b>Summary</b></h5></div>
                        <hr>
                        <form>
                            <p>SHIPPING</p>
                            <select><option class="text-muted">Standard-Delivery- &euro;5.00</option></select>
                            <p>GIVE CODE</p>
                            <input id="code" placeholder="Enter your code">
                        </form>
                        <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                            <div class="col">TOTAL PRICE</div>
                            <div class="col text-right">{{ array_sum(array_map(function($item) { return $item['price'] * $item['quantity']; }, $cart)) }} VND</div>
                        </div>
                        <button class="btn">CHECKOUT</button>
                    </div>
                </div>
            </div>
        </div>

    @else
        <div class="body_cart_detail">
            <div class="card">
                <div class="row">
                    <div class="col-md-8 cart">
                        <div class="title">
                            <div class="row">
                                <div class="col"><h4><b>Shopping Cart</b></h4></div>
                                <div class="col align-self-center text-right text-muted"> {{ array_sum(array_column($cart, 'quantity')) }} Item</div>
                            </div>
                        </div>
                        <div class="row main align-items-center">
                            <h4 style="margin-left: 40px;">Your cart is empty!</h4>
                        </div>
                        <div class="back-to-shop"><a href="{{ route('products.menu') }}">&leftarrow;<span class="text-muted">Back to shop</span></a></div>
                    </div>
                    <div class="col-md-4 summary">
                        <div><h5><b>Summary</b></h5></div>
                        <hr>
                        <form>
                            <p>SHIPPING</p>
                            <select><option class="text-muted">Standard-Delivery- &euro;5.00</option></select>
                            <p>GIVE CODE</p>
                            <input id="code" placeholder="Enter your code">
                        </form>
                        <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                            <div class="col">TOTAL PRICE</div>
                            <div class="col text-right">{{ array_sum(array_map(function($item) { return $item['price'] * $item['quantity']; }, $cart)) }} VND</div>
                        </div>
                        <button class="btn">CHECKOUT</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script>
        function updateQuantity(productId, change) {
            fetch(`/cart/update/${productId}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ change })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                } else {
                    alert(data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }

        function removeFromCart(productId) {
            fetch(`/cart/remove/${productId}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ _method: 'DELETE' })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                } else {
                    alert(data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    </script>

    @endsection

</body>
</html>