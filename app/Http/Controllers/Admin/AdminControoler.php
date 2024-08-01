<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminControoler extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $users = User::where('id', '!=', $user->id)->get();
        return view('admin.dashboard', compact('user', 'users'));
    }

    public function toggleActivation(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->active = !$user->active;
        $user->save();

        return redirect()->route('admin.dashboard')->with('success', 'Tài khoản đã được cập nhật.');
    }
}
