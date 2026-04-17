<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Hiển thị trang login
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Xử lý đăng nhập
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Xác thực
        $request->authenticate();

        // Tạo session mới
        $request->session()->regenerate();

        // 🔥 QUAN TRỌNG: redirect về trang chủ (shop)
        return redirect()->intended('/');
    }

    /**
     * Đăng xuất
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}