<!DOCTYPE html>
<html>
<head>
    <title>Xác nhận đơn hàng</title>
</head>
<body>
    <h1>Cảm ơn bạn đã đặt hàng!</h1>
    <p>Mã đơn hàng: {{ $order->id }}</p>
    <p>Tổng tiền: {{ number_format($order->total_amount, 2) }} VNĐ</p>
    <p>Địa chỉ: {{ $order->address }}</p>
    <p>Trạng thái: {{ $order->status }}</p>
    <p>Chúng tôi sẽ liên hệ với bạn sớm nhất có thể để xác nhận.</p>
</body>
</html>
