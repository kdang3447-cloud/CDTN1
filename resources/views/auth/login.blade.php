@extends('layouts.auth')

@section('title', 'Đăng Nhập')

@section('content')
<div class="card">
    <div class="card-header">
        <h1 class="card-title">Đăng Nhập</h1>
        <p class="card-subtitle">Chào mừng trở lại! Vui lòng đăng nhập vào tài khoản của bạn.</p>
    </div>

    @if($errors->has('email') && !old('name'))
        <div class="alert-danger">
            {{ $errors->first('email') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login.post') }}">
        @csrf

        <div class="form-group">
            <label for="email" class="form-label">Địa chỉ Email</label>
            <input type="email" 
                   id="email" 
                   name="email" 
                   class="form-control @error('email') is-invalid @enderror" 
                   value="{{ old('email') }}" 
                   placeholder="Nhập email của bạn..."
                   required autofocus>
            @error('email')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
                <label for="password" class="form-label" style="margin-bottom: 0;">Mật khẩu</label>
            </div>
            <input type="password" 
                   id="password" 
                   name="password" 
                   class="form-control @error('password') is-invalid @enderror" 
                   placeholder="••••••••"
                   required>
            @error('password')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            Đăng Nhập ➔
        </button>
    </form>
    
    <div class="auth-footer">
        Chưa có tài khoản? <a href="{{ route('register') }}">Đăng ký ngay</a>
    </div>
</div>
@endsection
