@extends('layouts.apps')

@section('contents')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Profile của {{ $user->full_name }}</h2>
        </div>
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item"><strong>Tên đăng nhập:</strong> {{ $user->username }}</li>
                <li class="list-group-item"><strong>Email:</strong> {{ $user->email }}</li>
                <li class="list-group-item"><strong>Tên đầy đủ:</strong> {{ $user->full_name }}</li>
                <li class="list-group-item"><strong>Vai trò:</strong> {{ $user->role }}</li>
                <li class="list-group-item"><strong>Số điện thoại:</strong> {{ $user->phone_number }}</li>
                <li class="list-group-item"><strong>Địa chỉ:</strong> {{ $user->address }}</li>
                <li class="list-group-item"><strong>Ngày tham gia:</strong> {{ $user->created_at->format('d/m/Y') }}</li>
                <li class="list-group-item"><strong>Ngày cập nhật:</strong> {{ $user->updated_at->format('d/m/Y') }}</li>
                <li class="list-group-item"><strong>Trạng thái:</strong> {{ $user->is_active ? 'Hoạt động' : 'Không hoạt động' }}</li>
            </ul>
        </div>
        <div class="card-footer text-right">
            <a href="{{ route('profile.edit') }}" class="btn btn-primary">Chỉnh sửa thông tin</a>
        </div>
    </div>
</div>
@endsection
