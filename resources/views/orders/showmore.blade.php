

@extends('layouts.apps')

@section('contents')
<h1>Chi tiết đơn hàng #{{ $order->id }}</h1>

<h3>Thông tin người đặt hàng</h3>
<p><strong>Tên:</strong> {{ $order->name }}</p>
<p><strong>Email:</strong> {{ $order->email }}</p>
<p><strong>Địa chỉ:</strong> {{ $order->address }}</p>

<h3>Sản phẩm đã mua</h3>
<table class="table">
    <thead>
        <tr>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá</th>
            <th>Tổng</th>
        </tr>
    </thead>
    <tbody>
    @php
    $products = json_decode($order->products, true);
@endphp

@if (is_array($products) || is_object($products))
    @foreach ($products as $product)
        <tr>
            <td>{{ $product['name'] }}</td>
            <td>{{ $product['quantity'] }}</td>
            <td>{{ number_format($product['price'], 2) }}</td>
            <td>{{ number_format($product['quantity'] * $product['price'], 2) }} vn₫</td>

        </tr>
    @endforeach
@else
    <tr>
        <td colspan="4">Không có sản phẩm trong đơn hàng này.</td>
    </tr>
@endif



    </tbody>
</table>

<h3>Tổng tiền: {{ number_format($order->total_amount, 2) }}vnđ</h3>
@endsection