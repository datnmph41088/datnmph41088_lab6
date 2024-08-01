<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    //Register
    public function postRegister(Request $request)
    {
        $data = $request->all();
        User::query()->create($data);
        return redirect()->route('login')->with('message', 'Đăng kí tài khoản thành công');
    }
}
