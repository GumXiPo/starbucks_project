@extends('layouts.app')

@section('title', 'Danh sách đơn hàng')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Danh sách đơn hàng</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên người đặt hàng</th>
                        <th>Email</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th>Ngày tạo</th>
                        <th>Ghi chú</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->email }}</td>
                        <td>{{ number_format($order->total_amount, 2) }} VNĐ</td>
                        <td>{{ ucfirst($order->status) }}</td>
                        <td>{{ $order->order_date->format('d-m-Y H:i:s') }}</td>
                        <td>{{ $order->note ?? 'Không có ghi chú' }}</td>
                    </tr>
                    @endforeach
                    @if ($orders->isEmpty())
                    <tr>
                        <td colspan="7" class="text-center">Không có đơn hàng nào.</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
