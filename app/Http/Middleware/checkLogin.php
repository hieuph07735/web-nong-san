<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class checkLogin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role == 1 && $user->status == 1) {
                return $next($request);
            } else {
                Auth::logout();
                // xem cách người ta dùng with và session để trả thông báo
                return redirect()->route('get.login')->with([
                    'error' => 'Lỗi! bạn không được phép đăng nhập'
                ]);
            }
        } else {
            return redirect()->route('get.login');
        }
    }
}
