@extends('layouts.apps')

@section('contents')
<div style="text-align: right;">
<a href="{{ route('admins.dashboard') }}"  class="btn btn-primary">
    Trang đánh giá cửa hàng
    
</a>
</div>
<div class="container">
    <h1>Tất cả đánh giá sản phẩm</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Người dùng</th>
                <th>Sản phẩm</th>
                <th>Đánh giá</th>
                <th>Nhận xét</th>
                <th>Thời gian</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reviews as $review)
                <tr>
                    <td>{{ $review->user->username }}</td> <!-- Hiển thị tên người dùng -->
                    <td>{{ $review->product->name }}</td> <!-- Hiển thị tên sản phẩm -->
                    <td>{{ $review->rating }}</td> <!-- Hiển thị điểm đánh giá -->
                    <td>{{ $review->comment }}</td> <!-- Hiển thị nhận xét -->
                    <td>{{ $review->created_at->format('d/m/Y H:i') }}</td> <!-- Hiển thị thời gian -->
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
