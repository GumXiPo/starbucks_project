@extends('layouts.apps')

@section('title', 'Danh sách sản phẩm')

@section('contents')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Danh sách sản phẩm</h6>
    </div>
    <div class="card-body">
        @if (auth()->check() && auth()->user()->level == 'Admin')
            <a href="{{ route('products.add') }}" class="btn btn-primary mb-3">Thêm sản phẩm</a>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Mã sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Danh mục</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tồn hàng</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @php($no = 1)
                    @foreach ($products as $row)
                    <tr>
                        <th>{{ $no++ }}</th>
                        <td>{{ $row->product_id }}</td>
                        <td>
                            @if ($row->image)
                                <img src="{{ asset('images/' . $row->image) }}" alt="{{ $row->name }}" width="50" height="50">
                            @else
                                <span>Không có hình ảnh</span>
                            @endif
                        </td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->category }}</td>
                        <td>{{ number_format($row->price, 2) }} VNĐ</td>
                        <td>{{ $row->stock_quantity }}</td>
                        <td>
                            @if ($row->stock_quantity > 0)
                                Còn hàng
                            @else
                                Hết hàng
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('products.edit', ['id' => $row->product_id]) }}" class="btn btn-warning">Chỉnh sửa</a>
                            <form action="{{ route('products.delete', $row->product_id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?');">Xóa</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @if ($products->isEmpty())
                    <tr>
                        <td colspan="9" class="text-center">Không có sản phẩm nào.</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
