@extends('layouts.auth')

@section('title', 'Đăng Ký')

@section('content')
<div class="card">
    <div class="card-header">
        <h1 class="card-title">Tạo Tài Khoản</h1>
        <p class="card-subtitle">Tham gia ShopAdmin để bắt đầu quản lý sản phẩm.</p>
    </div>

    <form method="POST" action="{{ route('register.post') }}">
        @csrf

        <div class="form-group">
            <label for="name" class="form-label">Họ và Tên</label>
            <input type="text" 
                   id="name" 
                   name="name" 
                   class="form-control @error('name') is-invalid @enderror" 
                   value="{{ old('name') }}" 
                   placeholder="Nhập tên của bạn..."
                   required autofocus>
            @error('name')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="email" class="form-label">Địa chỉ Email</label>
            <input type="email" 
                   id="email" 
                   name="email" 
                   class="form-control @error('email') is-invalid @enderror" 
                   value="{{ old('email') }}" 
                   placeholder="Nhập email của bạn..."
                   required>
            @error('email')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password" class="form-label">Mật khẩu</label>
            <input type="password" 
                   id="password" 
                   name="password" 
                   class="form-control @error('password') is-invalid @enderror" 
                   placeholder="Ít nhất 8 ký tự"
                   required>
            @error('password')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password_confirmation" class="form-label">Xác nhận mật khẩu</label>
            <input type="password" 
                   id="password_confirmation" 
                   name="password_confirmation" 
                   class="form-control" 
                   placeholder="Nhập lại mật khẩu..."
                   required>
        </div>

        <button type="submit" class="btn btn-primary">
            Đăng Ký Tài Khoản
        </button>
    </form>
    
    <div class="auth-footer">
        Đã có tài khoản? <a href="{{ route('login') }}">Đăng nhập</a>
    </div>
</div>
@endsection
