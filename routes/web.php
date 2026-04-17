<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/auth', [AuthController::class, 'showForm']);
Route::get('/forgot-password', [AuthController::class, 'forgotPasswordForm']);
Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::post('/delete-account', [AuthController::class, 'deleteAccount']);

Route::get('/admin', function () {
    if (!session('user')) {
        return redirect('/auth');
    }
    $user = \App\Models\User::find(session('user_id'));
    if (!$user || $user->role !== 'admin') {
        return redirect('/')->with('error', 'Bạn không có quyền truy cập trang quản lý.');
    }
    return view('admin');
});

Route::get('/products', function () {
    return view('viewProduct');
});

Route::post('/api/books', [ProductController::class, 'api']);
Route::get('/api/books-debug', function () {
    return response()->json(\App\Models\Book::all());
});