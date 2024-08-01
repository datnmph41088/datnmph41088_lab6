<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class PreLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = User::query()
            ->where('email', $request->get('email'))
            ->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Email không hợp lệ');
        }

        if ($user->active == false || $user->active == 0) {
            return redirect()->back()->with('error', 'Tài khoản đẫ bị khóa 1200h');
        }

        if ($user->role === 'admin') {
            $request->merge([
                'admin' => true
            ]);
        }

        if (!Hash::check($request->input('password'), $user->password)) {
            return redirect()->back()->with('error', 'Mật khẩu không hợp lệ');
        }
        return $next($request);
    }
}
