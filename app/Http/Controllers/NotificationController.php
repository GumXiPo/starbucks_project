<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function showNotifications()
    {
        $notifications = Notification::orderBy('created_at', 'desc')->get();
        return view('admin.dashboard', compact('notifications'));
    }
}
