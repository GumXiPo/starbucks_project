<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Cookie\Middleware\EncryptCookies::class,
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \Illuminate\Routing\Middleware\SubstituteBindings::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            \App\Http\Middleware\Authenticate::class, // Xác thực người dùng
        ],

        'api' => [
            'throttle:60,1', // Throttling các request API
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
        'admin' => \App\Http\Middleware\EnsureUserIsAdmin::class, // Đảm bảo middleware admin có ở đây
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class, // Redirect nếu đã đăng nhập
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class, // Yêu cầu xác nhận mật khẩu
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class, // Kiểm tra chữ ký trong URL
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class, // Kiểm soát tần suất yêu cầu
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class, // Kiểm tra email đã xác thực
    ];
}
