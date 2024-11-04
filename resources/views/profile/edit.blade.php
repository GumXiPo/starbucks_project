@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Chỉnh sửa thông tin profile</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="username">Tên đăng nhập:</label>
                    <input type="text" name="username" id="username" class="form-control" value="{{ $user->username }}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
                </div>
                <div class="form-group">
                    <label for="full_name">Tên đầy đủ:</label>
                    <input type="text" name="full_name" id="full_name" class="form-control" value="{{ $user->full_name }}" required>
                </div>
                <div class="form-group">
                    <label for="role">Vai trò:</label>
                    <input type="text" class="form-control" value="{{ $user->role }}" readonly>
                </div>
                <div class="form-group">
                    <label for="phone_number">Số điện thoại:</label>
                    <input type="text" name="phone_number" id="phone_number" class="form-control" value="{{ $user->phone_number }}" placeholder="Nhập số điện thoại">
                </div>
                <div class="form-group">
                    <label for="address">Địa chỉ:</label>
                    <input type="text" name="address" id="address" class="form-control" value="{{ $user->address }}" placeholder="Nhập địa chỉ">
                </div>
                <div class="form-group">
                    <label for="is_active">Trạng thái:</label>
                    <select name="is_active" id="is_active" class="form-control">
                        <option value="1" {{ $user->is_active ? 'selected' : '' }}>Hoạt động</option>
                        <option value="0" {{ !$user->is_active ? 'selected' : '' }}>Không hoạt động</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
                <a href="{{ route('profile.show') }}" class="btn btn-secondary">Hủy</a>
            </form>
        </div>
    </div>
</div>
@endsection
