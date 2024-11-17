@extends('layouts.apps')

@section('contents')
<div style="text-align: right;">
    <a href="{{ route('reviews.index') }}" class="btn btn-primary">
        Trang đánh giá sản phẩm
    </a>
</div>

<div class="row">
  <h1>Danh sách phản hồi của khách hàng</h1>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Tên người dùng</th>
        <th>Phản hồi</th>
        <th>Đánh giá</th>
        <th>Trạng thái</th>
        <th>Ngày tạo</th>
        <th>Hành động</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($feedbacks as $feedback)
      <tr>
        <td>{{ $feedback->user ? $feedback->user->username : 'N/A' }}</td>
        <td>{{ $feedback->message }}</td>
        <td>{{ $feedback->rating }} / 5</td>
        <td>
          @if($feedback->status == 'pending')
          <span class="badge bg-success">Hiện</span> <!-- Xanh cho "Hiện" -->
          @elseif($feedback->status == 'approved')
          <span class="badge bg-warning">Ẩn</span> <!-- Vàng cho "Ẩn" -->
          @elseif($feedback->status == 'rejected')
          <span class="badge bg-danger">Đã bị từ chối</span> <!-- Đỏ cho "Từ chối" -->
          @else
          <span class="badge bg-secondary">Không xác định</span>
          @endif
        </td>
        <td>{{ $feedback->created_at->format('d-m-Y H:i') }}</td>
        <td>
          <a href="{{ route('feedback.edit', $feedback->id) }}" class="btn btn-primary">Chỉnh sửa</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection