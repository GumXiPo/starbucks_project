<!-- resources/views/cart/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div id="cart-items">
        @if(count($cart) > 0)
            <h3>Giỏ Hàng Của Bạn</h3>
            <ul>
                @foreach($cart as $item)
                    <li>
                        <strong>{{ $item['name'] }}</strong><br>
                        Size: {{ $item['size'] }}<br>
                        Đường: {{ $item['sugar'] }}%<br>
                        Số lượng: {{ $item['quantity'] }} x {{ number_format($item['price'], 0, '.', ',') }} VND
                    </li>
                @endforeach
            </ul>

            <!-- Tổng giá trị giỏ hàng -->
            <div>
                <strong>Tổng cộng: </strong>
                {{ number_format(array_sum(array_map(function($item) {
                    return $item['price'] * $item['quantity'];
                }, $cart)), 0, '.', ',') }} VND
            </div>

            <button onclick="window.location.href='/checkout'">Thanh toán</button>
        @else
            <p>Giỏ hàng của bạn chưa có sản phẩm nào.</p>
        @endif
    </div>
@endsection
