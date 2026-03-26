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
    return view('admin');
});

Route::get('/products', function () {
    return view('viewProduct');
});