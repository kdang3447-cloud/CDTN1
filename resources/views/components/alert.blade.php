{{-- Alert Component: hiển thị thông báo session --}}
@if(session('success'))
    <div class="alert alert-success" role="alert">
        <span class="alert-icon">✅</span>
        <span>{{ session('success') }}</span>
        <button class="alert-close" aria-label="Đóng">✕</button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger" role="alert">
        <span class="alert-icon">❌</span>
        <span>{{ session('error') }}</span>
        <button class="alert-close" aria-label="Đóng">✕</button>
    </div>
@endif
