<!-- resources/views/orders/index.blade.php -->

@extends('layouts.apps')

@section('contents')
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<h1>Danh sách đơn hàng</h1>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên người đặt</th>
            <th>Email</th>
            <th>Tổng tiền</th>
            <th>Trạng thái</th>
            <th>Ngày đặt</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->name }}</td>
            <td>{{ $order->email }}</td>
            <td>{{ $order->total_amount }}</td>
            <td>
                <form action="{{ route('orders.updateStatus', $order->id) }}" method="POST">

                    @csrf
                    <select name="status" class="form-control" onchange="this.form.submit()">
                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Đang chờ</option>
                        <option value="shipping" {{ $order->status == 'shipping' ? 'selected' : '' }}>Đang giao hàng</option>
                        <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Đã giao hàng</option>
                        <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Đã hủy</option>
                    </select>
                </form>
            </td>
            <td>{{ $order->order_date }}</td>
            <td>
            <a href="{{ route('orders.showmore', ['orderId' => $order->id]) }}" class="btn btn-info">Chi tiết</a>

            </td>
            @endforeach
    </tbody>
</table>
@endsection