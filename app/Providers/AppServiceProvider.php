<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Notification;
use Illuminate\Support\Facades\View;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Chia sẻ biến $notifications cho tất cả các view
        View::composer('*', function ($view) {
            $notifications = Notification::where('status', false)->get();
            $view->with('notifications', $notifications);
        });
    }
}
