<h2>Giỏ Hàng</h2>
@if(session()->has('cart'))
    <table>
        <thead>
            <tr>
                <th>Sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            @foreach(session('cart') as $item)
                <tr>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['price'] }} VND</td>
                    <td>{{ $item['quantity'] }}</td>
                    <td>{{ $item['price'] * $item['quantity'] }} VND</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div>
        <h3>Tổng: {{ $total }} VND</h3>
        <a href="{{ route('checkout') }}">Thanh toán</a>
    </div>
@else
    <p>Giỏ hàng của bạn hiện đang trống.</p>
@endif
