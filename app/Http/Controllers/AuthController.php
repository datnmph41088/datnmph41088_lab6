<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $input = $request->only('email', 'password');

        if ($request['admin']) {
            if (Auth::attempt($input)) {
                return redirect()->intended('dashboard'); // Hoặc 'dashboard' nếu bạn đã định nghĩa route này
            }
        }

        if (Auth::attempt($input)) {
            return redirect()->intended('welcome'); // Hoặc 'dashboard' nếu bạn đã định nghĩa route này
        }
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
    
        // Tạo đối tượng người dùng
        $user = User::create([
            'fullname' => $request->fullname,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);
    
        // Kiểm tra nếu có tệp avatar được tải lên và cập nhật bản ghi người dùng
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $avatarPath;
            $user->save();
        }
    
        return redirect('login')->with('success', 'Đăng ký thành công');
    }

    private function checkPassword($password, $hashedPassword): bool
    {
        return Hash::check($password, $hashedPassword);
    }
}
