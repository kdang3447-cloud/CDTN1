<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showForm()
    {
        return view('auth');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ], [
            'email.required' => 'Vui lòng nhập email.',
            'email.email' => 'Email không đúng định dạng.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.min' => 'Mật khẩu phải ít nhất 6 ký tự.',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Đảm bảo role được set mặc định nếu chưa có
            if (!$user->role) {
                $user->role = 'user';
                $user->save();
            }
            session(['user' => $user->name, 'user_id' => $user->id, 'role' => $user->role]);
            if ($user->role === 'admin') {
                return redirect('/admin');
            } else {
                return redirect('/');
            }
        }

        return back()->with('error', 'Sai email hoặc mật khẩu');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ], [
            'name.required' => 'Vui lòng nhập họ tên.',
            'email.required' => 'Vui lòng nhập email.',
            'email.email' => 'Email không đúng định dạng.',
            'email.unique' => 'Email đã tồn tại.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.min' => 'Mật khẩu phải ít nhất 6 ký tự.',
            'password.confirmed' => 'Mật khẩu xác nhận không khớp.',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user'
        ]);

        // Tự động đăng nhập sau khi đăng ký và chuyển đến trang chủ
        session(['user' => $user->name, 'user_id' => $user->id, 'role' => $user->role]);
        return redirect('/')->with('success', 'Đăng ký thành công! Đã chuyển đến trang chủ.');
    }

    public function logout(Request $request)
    {
        session()->forget(['user', 'user_id']);
        return redirect('/');
    }

    public function deleteAccount(Request $request)
    {
        $userId = session('user_id');
        if ($userId) {
            $user = User::find($userId);
            if ($user) {
                $user->delete();
            }
        }

        session()->forget(['user', 'user_id']);
        return redirect('/')->with('success', 'Tài khoản đã được xóa thành công.');
    }
}