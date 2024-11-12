@extends('layouts.app')

@section('content')
    <h1>Giỏ Hàng</h1>
    
    @if(count($cart) > 0)
        <ul>
            @foreach($cart as $item)
                <li>{{ $item['name'] }} - {{ $item['size'] }} - {{ $item['sugar'] }}% đường - {{ $item['quantity'] }} x {{ number_format($item['price'], 0, '.', ',') }} VND</li>
            @endforeach
        </ul>
    @else
        <p>Giỏ hàng của bạn chưa có sản phẩm nào.</p>
    @endif
@endsection