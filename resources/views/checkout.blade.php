@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Thanh toán sản phẩm</h1>
    <form action="{{ route('order.place') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Họ và tên</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="note">Ghi chú</label>
            <textarea name="note" id="note" class="form-control" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="address">Địa chỉ nhận hàng</label>
            <input type="text" name="address" id="address" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="phone_number">Số điện thoại</label>
            <input type="text" name="phone_number" id="phone_number" class="form-control" required>
        </div>
        <h3>Giỏ hàng</h3>
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
                @if(!empty($cart))
                @foreach($cart as $productId => $details)
                @php
                $product = App\Models\Product::find($productId);
                @endphp
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $details['quantity'] }}</td>
                    <td>{{ number_format($product->price, 2) }} VNĐ</td>
                    <td>{{ number_format($product->price * $details['quantity'], 2) }} VNĐ</td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="4">Giỏ hàng trống</td>
                </tr>
                @endif
            </tbody>
        </table>
        <h3>Tổng cộng: {{ number_format($totalAmount, 2) }} VNĐ</h3>
        <button type="submit" class="btn btn-primary">Đặt hàng</button>
    </form>
</div>
@endsection