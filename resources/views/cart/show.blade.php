

@extends('layouts.app')
@section('content')
    <h1>Giỏ hàng của bạn</h1>

    @if($items->isEmpty())
        <p>Giỏ hàng của bạn hiện tại chưa có sản phẩm nào.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Kích thước</th>
                    <th>Lượng đường</th>
                    <th>Thông tin bổ sung</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Tổng</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->productDetail->size ?? 'Không có kích thước' }}</td>
                        <td>{{ $item->productDetail->sugar_content ?? 'Không có thông tin' }}</td>
                        <td>{{ $item->productDetail->additional_info ?? 'Không có thông tin bổ sung' }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ number_format($item->product->price, 2) }}</td>
                        <td>{{ number_format($item->quantity * $item->product->price, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <p><strong>Tổng tiền: {{ number_format($items->sum(function($item) {
            return $item->quantity * $item->product->price;
        }), 2) }}</strong></p>
    @endif
@endsection
