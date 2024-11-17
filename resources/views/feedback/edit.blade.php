@extends('layouts.apps')

@section('contents')
<div class="container my-5">
  <div class="row">
    <div class="col-lg-8 offset-lg-2">
      <h1 class="text-center mb-4">Chỉnh sửa phản hồi</h1>

      <form action="{{ route('feedback.update', $feedback->id) }}" method="POST" class="p-4 shadow-sm border rounded">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
          <label for="username" class="form-label">Tên người dùng:</label>
          <input type="text" name="username" class="form-control" value="{{ $feedback->user ? $feedback->user->username : '' }}" readonly>
        </div>

        <div class="form-group mb-3">
          <label for="message" class="form-label">Đánh giá:</label>
          <textarea name="message" class="form-control" rows="4">{{ $feedback->message }}</textarea>
        </div>

        <div class="form-group mb-3">
          <label for="rating" class="form-label">Đánh giá:</label>
          <input type="number" name="rating" class="form-control" value="{{ $feedback->rating }}" min="1" max="5" step="1">
        </div>

        <!-- Trạng thái (Ẩn/Hiện) -->
        <div class="form-group mb-3">
          <label for="status" class="form-label">Trạng thái:</label>
          <select name="status" class="form-control">
            <option value="hiện" {{ $feedback->status == 'pending' ? 'selected' : '' }}>Hiện</option>
            <option value="ẩn" {{ $feedback->status == 'approved' ? 'selected' : '' }}>Ẩn</option>
          </select>
        </div>

        <div class="d-flex justify-content-between align-items-center">
          <a href="{{ route('admins.dashboard') }}" class="btn btn-secondary">Quay lại</a>
          <button type="submit" class="btn btn-primary">Cập nhật</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
