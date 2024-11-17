<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Mail\OrderConfirmationMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Notification;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function checkout()
    {
        // Lấy sản phẩm trong giỏ hàng (Giả sử đã có giỏ hàng trong session)
        $cart = session('cart', []);

        // Kiểm tra nếu giỏ hàng không rỗng
        if (empty($cart)) {
            // Nếu giỏ hàng trống, có thể đưa ra thông báo hoặc xử lý khác
            return redirect()->route('cart.show')->with('error', 'Giỏ hàng của bạn trống!');
        }

        // Tính tổng số tiền
        $totalAmount = $this->calculateTotalAmount();  // Tính tổng số tiền

        return view('checkout', compact('cart', 'totalAmount'));  // Truyền totalAmount sang view
    }
    public function placeOrder(Request $request)
    {
        // Validate dữ liệu đầu vào
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
        ]);

        // Kiểm tra giỏ hàng
        $cart = session('cart', []);
        if (!is_array($cart) || empty($cart)) {
            return redirect()->route('cart.show')->with('error', 'Giỏ hàng của bạn đang trống.');
        }

        // Tính tổng số tiền trong giỏ hàng
        $totalAmount = $this->calculateTotalAmount($cart);

        // Tạo đơn hàng
        $order = Order::create([
            'user_id' => auth()->id(),
            'total_amount' => $totalAmount,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'name' => $request->name,
            'email' => $request->email,  // Lưu email vào cơ sở dữ liệu
            'note' => $request->note,    // Lưu ghi chú vào cơ sở dữ liệu
            'products' => json_encode($cart),  // Lưu giỏ hàng dưới dạng JSON
        ]);

        // Xóa giỏ hàng sau khi đặt hàng
        session()->forget('cart');

        // Gửi email xác nhận đơn hàng
        Mail::to(auth()->user()->email)->send(new OrderConfirmationMail($order));

        // Tạo thông báo mới
        Notification::create([
            'message' => 'Đơn hàng mới đã được đặt bởi khách hàng ID: ' . $request->user()->id,
        ]);
        // Chuyển hướng đến trang thành công
        return redirect()->route('order.success')->with('success', 'Đặt hàng thành công');
    }

    public function showmore($orderId)
    {
        // Lấy thông tin đơn hàng và kiểm tra lại products
        $order = Order::with('user', 'products')->findOrFail($orderId);
        // Giải mã JSON nếu cần thiết
        $products = json_decode($order->products, true); // true để nhận kết quả là mảng
        return view('orders.showmore', compact('order'));
    }
public function showNotifications()
{
    $notifications = Notification::orderBy('created_at', 'desc')->get();
    return view('admins.dashboard', compact('notifications'));
}





    public function show()
    {

        $orders = Order::all(); // Lấy tất cả đơn hàng

        return view('orders.index', compact('orders')); // Trả về view kèm theo danh sách đơn hàng
    }

    public function index()
    {
        // Lấy tất cả đơn hàng
        $orders = Order::with('user')->get();  // Sử dụng Eloquent để lấy dữ liệu cùng với thông tin người dùng

        return view('order.index', compact('orders'));
    }




    public function orderSuccess()
    {
        return view('order.success');
    }
    // Cập nhật trạng thái đơn hàng
    public function updateStatus(Request $request, $orderId)
    {
        $order = Order::findOrFail($orderId);

        // Kiểm tra và cập nhật trạng thái
        $order->status = $request->status;
        $order->save();

        return redirect()->route('orders.index')->with('success', 'Cập nhật trạng thái thành công!');
    }
    // Giữ phương thức này không tĩnh
    private function calculateTotalAmount()
    {
        $cart = session('cart', []);  // Lấy giỏ hàng từ session, mặc định là mảng rỗng nếu không có
        $total = 0;

        // Kiểm tra nếu giỏ hàng không rỗng
        if (!empty($cart) && is_array($cart)) {
            foreach ($cart as $productId => $details) {
                $product = Product::find($productId);
                if ($product) {
                    $total += $product->price * $details['quantity'];  // Tính tổng số tiền
                }
            }
        }

        return $total;
    }
    public function revenueChart()
{
    // Lấy doanh thu từng tháng từ bảng orders
    $revenueData = Order::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(total_amount) as total')
        ->groupBy('year', 'month')
        ->orderBy('year', 'desc')
        ->orderBy('month', 'desc')
        ->get();

    // Kiểm tra dữ liệu
    $months = [];
    $totals = [];
    foreach ($revenueData as $data) {
        $months[] = $data->year . '-' . str_pad($data->month, 2, '0', STR_PAD_LEFT);
        $totals[] = $data->total;
    }

    // Truyền dữ liệu vào view
    return view('orders.revenue_chart', compact('months', 'totals'));
    
}

    
}
