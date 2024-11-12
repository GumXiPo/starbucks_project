<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    

    public function feedbackshow()
    {
        $feedbacks = Feedback::with('user')->latest()->paginate(10);
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
}
