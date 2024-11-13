@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Đặt hàng thành công!</h1>
    <p>Cảm ơn bạn đã mua hàng. Đơn hàng của bạn đã được xử lý.</p>
    <a href="{{ url('/') }}" class="btn btn-primary">Về trang chủ</a>
</div>
@endsection
