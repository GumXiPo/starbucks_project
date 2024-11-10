@extends('layouts.apps')

@section('contents')
<div class="container">
    <h1>Chỉnh sửa thông tin người dùng</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('profile.updateadminProfile', $user->id) }}" method="POST">
    @csrf

        <div class="form-group">
            <label for="username">Tên đăng nhập</label>
            <input type="text" id="username" name="username" class="form-control" value="{{ old('username', $user->username) }}" required>
            @error('username')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="full_name">Họ và tên</label>
            <input type="text" id="full_name" name="full_name" class="form-control" value="{{ old('full_name', $user->full_name) }}">
        </div>

        <div class="form-group">
            <label for="phone_number">Số điện thoại</label>
            <input type="text" id="phone_number" name="phone_number" class="form-control" value="{{ old('phone_number', $user->phone_number) }}">
        </div>

        <div class="form-group">
            <label for="address">Địa chỉ</label>
            <input type="text" id="address" name="address" class="form-control" value="{{ old('address', $user->address) }}">
        </div>

        <div class="form-group">
            <label for="role">Vai trò</label>
            <input type="text" id="role" name="role" class="form-control" value="{{ old('role', $user->role) }}">
        </div>

        <!-- Thêm trường Trạng thái -->
        <div class="form-group">
            <label for="is_active">Trạng thái</label>
            <select id="is_active" name="is_active" class="form-control">
                <option value="1" {{ old('is_active', $user->is_active) == 1 ? 'selected' : '' }}>Hoạt động</option>
                <option value="0" {{ old('is_active', $user->is_active) == 0 ? 'selected' : '' }}>Không hoạt động</option>
            </select>
            @error('is_active')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>
@endsection
