<!doctype html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Auth - Đăng Nhập &amp; Đăng Ký</title>
    <script src="https://cdn.tailwindcss.com/3.4.17"></script>
    <script src="https://cdn.jsdelivr.net/npm/lucide@0.263.0/dist/umd/lucide.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>

<body>
    <div class="gradient-dark w-full h-full flex items-center justify-center p-4">
        <!-- Main Container -->
        <div class="w-full max-w-md animate-fade-in-up">
            <!-- Header -->
            <div class="text-center mb-8">
                <div class="flex items-center justify-center mb-4">
                    <div
                        class="w-12 h-12 rounded-lg bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center shadow-lg">
                        <i data-lucide="lock" class="text-white" style="width: 28px; height: 28px;"></i>
                    </div>
                </div>
                <h1 class="text-3xl font-bold text-white mb-2">Welcome Back</h1>
                <p class="text-slate-400">Đăng nhập hoặc tạo tài khoản mới</p>
                @if(session('success'))
                    <div class="mb-4 p-3 bg-green-600 text-white rounded-lg">{{ session('success') }}</div>
                @endif
                @if(session('error'))
                    <div class="mb-4 p-3 bg-red-600 text-white rounded-lg">{{ session('error') }}</div>
                @endif
            </div><!-- Card Container -->
            <div class="card-glass rounded-2xl p-8 shadow-2xl">
                <!-- Tabs -->
                <div class="flex gap-8 mb-8 border-b border-slate-700"><button id="loginTab"
                        class="pb-3 font-semibold text-sm transition-all tab-active"> Đăng Nhập </button> <button
                        id="registerTab" class="pb-3 font-semibold text-sm transition-all tab-inactive"> Đăng Ký
                    </button>
                </div><!-- Login Form -->
                <form id="loginForm" class="login-form animate-slide-in" method="POST" action="/login">
                    @csrf
                    <!-- Email Input -->
                    <div class="mb-5"><label class="block text-sm font-medium text-slate-300 mb-2">Email</label>
                        <div class="relative"><i data-lucide="mail" class="absolute left-3 top-3 text-slate-500"
                                style="width: 20px; height: 20px;"></i> <input type="email" name="email"
                                placeholder="your@email.com"
                                class="input-dark w-full pl-10 pr-4 py-3 rounded-lg text-white placeholder-slate-500 outline-none"
                                required>
                        </div>
                    </div><!-- Password Input -->
                    <div class="mb-6"><label class="block text-sm font-medium text-slate-300 mb-2">Mật Khẩu</label>
                        <div class="relative"><i data-lucide="lock" class="absolute left-3 top-3 text-slate-500"
                                style="width: 20px; height: 20px;"></i> <input type="password" id="loginPassword"
                                name="password" placeholder="••••••••"
                                class="input-dark w-full pl-10 pr-12 py-3 rounded-lg text-white placeholder-slate-500 outline-none"
                                required> <i data-lucide="eye"
                                class="absolute right-3 top-3 text-slate-500 toggle-visible cursor-pointer"
                                style="width: 20px; height: 20px;" onclick="togglePassword('loginPassword')"></i>
                        </div>
                    </div><!-- Remember & Forgot -->
                    <div class="flex items-center justify-between mb-6"><label
                            class="flex items-center gap-2 cursor-pointer"> <input type="checkbox"
                                class="w-4 h-4 rounded border-slate-600 bg-slate-800 cursor-pointer"> <span
                                class="text-sm text-slate-400">Nhớ mật khẩu</span> </label> <a href="#"
                            class="text-sm text-blue-500 hover:text-blue-400 transition">Quên mật khẩu?</a>
                    </div><!-- Login Button --> <button type="submit"
                        class="btn-primary w-full py-3 rounded-lg font-semibold text-white mb-4 flex items-center justify-center gap-2">
                        <i data-lucide="arrow-right" style="width: 20px; height: 20px;"></i> Đăng Nhập </button>
                    <!-- Divider -->
                    <div class="flex items-center gap-3 mb-4">
                        <div class="flex-1 h-px bg-slate-700"></div><span class="text-xs text-slate-500">HOẶC</span>
                        <div class="flex-1 h-px bg-slate-700"></div>
                    </div><!-- Social Buttons -->
                    <div class="grid grid-cols-2 gap-3"><button type="button"
                            class="btn-secondary py-2 rounded-lg flex items-center justify-center gap-2 text-slate-300 text-sm font-medium">
                            <i data-lucide="github" style="width: 18px; height: 18px;"></i> GitHub </button> <button
                            type="button"
                            class="btn-secondary py-2 rounded-lg flex items-center justify-center gap-2 text-slate-300 text-sm font-medium">
                            <i data-lucide="mail" style="width: 18px; height: 18px;"></i> Google </button>
                    </div>
                </form><!-- Register Form -->
                <form id="registerForm" class="register-form hidden" method="POST" action="/register"
                    style="display: none;">
                    @csrf
                    <!-- Full Name Input -->
                    <div class="mb-5"><label class="block text-sm font-medium text-slate-300 mb-2">Họ và Tên</label>
                        <div class="relative"><i data-lucide="user" class="absolute left-3 top-3 text-slate-500"
                                style="width: 20px; height: 20px;"></i> <input type="text" name="name"
                                placeholder="Họ và Tên"
                                class="input-dark w-full pl-10 pr-4 py-3 rounded-lg text-white placeholder-slate-500 outline-none"
                                required>
                        </div>
                    </div><!-- Email Input -->
                    <div class="mb-5"><label class="block text-sm font-medium text-slate-300 mb-2">Email</label>
                        <div class="relative"><i data-lucide="mail" class="absolute left-3 top-3 text-slate-500"
                                style="width: 20px; height: 20px;"></i> <input type="email" name="email"
                                placeholder="your@email.com"
                                class="input-dark w-full pl-10 pr-4 py-3 rounded-lg text-white placeholder-slate-500 outline-none"
                                required>
                        </div>
                    </div><!-- Password Input -->
                    <div class="mb-5"><label class="block text-sm font-medium text-slate-300 mb-2">Mật Khẩu</label>
                        <div class="relative"><i data-lucide="lock" class="absolute left-3 top-3 text-slate-500"
                                style="width: 20px; height: 20px;"></i> <input type="password" id="registerPassword"
                                placeholder="••••••••"
                                class="input-dark w-full pl-10 pr-12 py-3 rounded-lg text-white placeholder-slate-500 outline-none"
                                required> <i data-lucide="eye"
                                class="absolute right-3 top-3 text-slate-500 toggle-visible cursor-pointer"
                                style="width: 20px; height: 20px;" onclick="togglePassword('registerPassword')"></i>
                        </div>
                    </div><!-- Confirm Password Input -->
                    <div class="mb-6"><label class="block text-sm font-medium text-slate-300 mb-2">Xác Nhận Mật
                            Khẩu</label>
                        <div class="relative"><i data-lucide="lock" class="absolute left-3 top-3 text-slate-500"
                                style="width: 20px; height: 20px;"></i> <input type="password" id="confirmPassword"
                                placeholder="••••••••"
                                class="input-dark w-full pl-10 pr-12 py-3 rounded-lg text-white placeholder-slate-500 outline-none"
                                required> <i data-lucide="eye"
                                class="absolute right-3 top-3 text-slate-500 toggle-visible cursor-pointer"
                                style="width: 20px; height: 20px;" onclick="togglePassword('confirmPassword')"></i>
                        </div>
                    </div><!-- Terms Checkbox --> <label class="flex items-start gap-2 mb-6 cursor-pointer"> <input
                            type="checkbox" class="w-4 h-4 rounded border-slate-600 bg-slate-800 cursor-pointer mt-1"
                            required> <span class="text-sm text-slate-400">Tôi đồng ý với <a href="#"
                                class="text-blue-500 hover:text-blue-400">Điều khoản dịch vụ</a> và <a href="#"
                                class="text-blue-500 hover:text-blue-400">Chính sách bảo mật</a></span> </label>
                    <!-- Register Button --> <button type="submit"
                        class="btn-primary w-full py-3 rounded-lg font-semibold text-white flex items-center justify-center gap-2">
                        <i data-lucide="user-plus" style="width: 20px; height: 20px;"></i> Tạo Tài Khoản </button>
                </form><!-- Footer -->
                <div class="mt-6 text-center text-slate-400 text-sm"><span id="footerText">Chưa có tài khoản? <span
                            id="switchBtn" class="text-blue-500 hover:text-blue-400 cursor-pointer font-medium">Đăng ký
                            ngay</span></span>
                </div>
            </div><!-- Info -->
            <p class="text-center text-slate-500 text-xs mt-6">🔐 Dữ liệu của bạn được mã hóa và bảo vệ an toàn</p>
        </div>
    </div>
    <script src="{{ asset('js/auth.js') }}"></script>
</body>

</html>