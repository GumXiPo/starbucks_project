@extends('layouts.apps')

@section('title', 'Danh sách người dùng')

@section('contents')
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Danh sách người dùng</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tên đăng nhập</th>
                            <th scope="col">Họ và tên</th>
                            <th scope="col">Email</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Địa chỉ</th>
                            <th scope="col">Vai trò</th>
                            <th scope="col">Ngày tạo</th>
                            <th scope="col">Ngày cập nhật</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Hành động</th> <!-- Cột hành động -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->full_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone_number }}</td>
                                <td>{{ $user->address }}</td>
                                <td>{{ $user->role }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>{{ $user->updated_at }}</td>
                                <td>
                                    <span class="badge {{ $user->is_active ? 'bg-success' : 'bg-danger' }}">
                                        {{ $user->is_active ? 'Hoạt động' : 'Không hoạt động' }}
                                    </span>
                                </td>
                                <td>
                                    <!-- Thêm nút chỉnh sửa -->
                                    <a href="{{ route('profile.admin.editadminProfile', $user->id) }}">Chỉnh sửa</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
