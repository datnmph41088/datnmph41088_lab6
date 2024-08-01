<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('welcome', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $user->fullname = $request->input('fullname');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->update();

        return redirect()->route('welcome')->with('success', 'Thông tin đã được cập nhật thành công');
    }

    public function changePasswordForm()
    {
        return view('changePassword');
    }

    public function changePassword(Request $request)
    {
        // Validate yêu cầu
        $user = Auth::user();
        // Cập nhật mật khẩu mới
        if ($request->input('password') ==  $request->input('confirmPassword')) {
            $user->password = Hash::make($request->input('password'));
            $user->update();
            return redirect()->route('welcome')->with('success', 'Mật khẩu đã được thay đổi thành công.');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Đăng xuất người dùng
        $request->session()->invalidate(); // Xóa phiên làm việc
        $request->session()->regenerateToken(); // Tạo lại token CSRF

        return redirect('/login'); // Chuyển hướng người dùng đến trang đăng nhập
    }
}
