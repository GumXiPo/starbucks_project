@extends('layouts.apps')

@section('contents')

    <h1>Danh sách phản hồi của khách hàng</h1>

    <table class="table table-bordered">
    <thead>
        <tr>
            <th>Tên người dùng</th>
            <th>Thông điệp</th>
            <th>Đánh giá</th>
            <th>Trạng thái</th>
            <th>Ngày tạo</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($feedbacks as $feedback)
            <tr>
                <td>{{ $feedback->user->name }}</td>
                <td>{{ $feedback->message }}</td>
                <td>{{ $feedback->rating }} / 5</td>
                <td>{{ ucfirst($feedback->status) }}</td>
                <td>{{ $feedback->created_at->format('d-m-Y H:i') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
