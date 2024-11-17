<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{


    public function feedbackshow()
{
    // Lọc phản hồi với trạng thái 'pending' (hiện) và paginate 10 phản hồi mỗi trang
    $feedbacks = Feedback::with('user')->where('status', 'pending')->latest()->paginate(10);

    return view('feedback.feedbackshow', compact('feedbacks'));
}


    public function store(Request $request)
    {
        // Validate dữ liệu
        $request->validate([
            'message' => 'required|max:500',
            'rating' => 'required|integer|min:1|max:5', // Đánh giá từ 1-5 sao
        ]);

        // Tạo phản hồi
        Feedback::create([
            'user_id' => auth()->id(), // Lấy ID của người dùng hiện tại
            'message' => $request->message,
            'rating' => $request->rating,
        ]);

        // Trả về thông báo thành công
        return redirect()->back()->with('success', 'Phản hồi của bạn đã được gửi thành công!');
    }
    public function edit($id) {
        $feedback = Feedback::findOrFail($id);
        return view('feedback.edit', compact('feedback'));
    }
    
    public function update(Request $request, $id)
{
    $feedback = Feedback::findOrFail($id);
    $feedback->message = $request->message;
    // Chuyển đổi trạng thái
    if ($request->status == 'hiện') {
        $feedback->status = 'pending';  // Chuyển trạng thái "Hiện" thành "pending"
    } elseif ($request->status == 'ẩn') {
        $feedback->status = 'approved';  // Chuyển trạng thái "Ẩn" thành "approved"
    } else {
        $feedback->status = $request->status;  // Giữ nguyên các giá trị hợp lệ khác
    }

    // Lưu thay đổi
    $feedback->save();

    return redirect()->route('admins.dashboard')->with('success', 'Phản hồi đã được cập nhật!');
}


    
}
