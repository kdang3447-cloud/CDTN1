<!doctype html>
<html lang="vi" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book</title>
    <script src="https://cdn.tailwindcss.com/3.4.17"></script>
    <script src="https://cdn.jsdelivr.net/npm/lucide@0.263.0/dist/umd/lucide.min.js"></script>
</head>

<body class="h-full bg-slate-100 text-slate-900">
    <div class="min-h-full">
        <header class="bg-sky-600 shadow-md">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col lg:flex-row items-center justify-between gap-4 py-4">
                    <div class="flex flex-col sm:flex-row sm:items-center gap-4 w-full lg:w-auto">
                        <div class="flex items-center gap-3">
                            <div class="w-11 h-11 rounded-full bg-white/90 flex items-center justify-center shadow-sm">
                                <i data-lucide="book" class="h-5 w-5 text-sky-600"></i>
                            </div>
                            <div>
                                <h1 class="text-white text-xl font-bold tracking-tight">Book</h1>
                            </div>
                        </div>
                        <div class="flex items-center w-full lg:w-auto rounded-full bg-white px-3 py-2 shadow-sm border border-white/70">
                            <i data-lucide="search" class="h-5 w-5 text-slate-400"></i>
                            <input type="text" placeholder="Tìm kiếm" class="w-full lg:w-72 ml-3 bg-transparent outline-none text-slate-900 placeholder:text-slate-400" />
                        </div>
                    </div>

                    <div class="flex items-center gap-3">
                        <button class="inline-flex items-center gap-2 rounded-full bg-white px-5 py-2 text-sky-600 font-semibold shadow-sm hover:bg-slate-100 transition"><i data-lucide="search" class="h-4 w-4"></i>Tìm kiếm</button>
                        @if(session('user'))
                            <div class="flex items-center gap-2">
                                <span class="rounded-full bg-white/90 px-4 py-2 text-slate-800 font-medium">Chào, {{ session('user') }}</span>
                                <form method="POST" action="/logout" class="inline">
                                    @csrf
                                    <button type="submit" class="rounded-full bg-red-500 px-4 py-2 text-white font-medium hover:bg-red-600 transition">Đăng xuất</button>
                                </form>
                            </div>
                        @else
                            <a href="/auth" class="rounded-full bg-white px-5 py-2 text-sky-600 font-semibold hover:bg-slate-100 transition">Đăng nhập</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="border-t border-white/20">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
                    <div class="flex flex-wrap gap-3 justify-center lg:justify-start">
                        <a href="#" class="inline-flex items-center gap-2 rounded-full border border-white/50 bg-white/10 px-4 py-2 text-sm text-white hover:bg-white/20 transition">Danh mục</a>
                        <a href="#" class="inline-flex items-center gap-2 rounded-full border border-white/50 bg-white/10 px-4 py-2 text-sm text-white hover:bg-white/20 transition">Giới thiệu</a>
                        <a href="#" class="inline-flex items-center gap-2 rounded-full border border-white/50 bg-white/10 px-4 py-2 text-sm text-white hover:bg-white/20 transition">Tin tức</a>
                        <a href="#" class="inline-flex items-center gap-2 rounded-full border border-white/50 bg-white/10 px-4 py-2 text-sm text-white hover:bg-white/20 transition">Review sách</a>
                        <a href="#" class="inline-flex items-center gap-2 rounded-full border border-white/50 bg-white/10 px-4 py-2 text-sm text-white hover:bg-white/20 transition">Tra cứu đơn</a>
                        <a href="#" class="inline-flex items-center gap-2 rounded-full bg-white text-slate-800 px-4 py-2 text-sm font-medium hover:bg-slate-100 transition"><i data-lucide="shopping-cart" class="h-4 w-4"></i>Giỏ hàng</a>
                        <a href="#" class="inline-flex items-center gap-2 rounded-full bg-white text-slate-800 px-4 py-2 text-sm font-medium hover:bg-slate-100 transition"><i data-lucide="credit-card" class="h-4 w-4"></i>Thanh toán</a>
                        <a href="#" class="inline-flex items-center gap-2 rounded-full bg-white text-slate-800 px-4 py-2 text-sm font-medium hover:bg-slate-100 transition"><i data-lucide="phone-call" class="h-4 w-4"></i>Liên hệ</a>
                    </div>
                </div>
            </div>
        </header>

        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
            <div class="rounded-[2rem] overflow-hidden bg-slate-950 text-white shadow-2xl">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-0 relative">
                    <div class="p-8 lg:p-12 flex flex-col justify-center">
                        <span class="inline-flex items-center gap-2 rounded-full bg-white/10 px-4 py-2 text-xs uppercase tracking-[0.3em] font-semibold text-slate-100">ƯU ĐÃI ĐẶC BIỆT</span>
                        <h1 class="mt-6 text-4xl sm:text-5xl font-black leading-tight">SÁCH PHÁT TRIỂN<br> BẢN THÂN BÁN<br> CHẠY NHẤT</h1>
                        <p class="mt-6 max-w-xl text-slate-300">Tuyển chọn những tựa sách kỹ năng sống, kỹ năng lãnh đạo và phát triển bản thân giúp bạn vượt qua giới hạn và đạt được mục tiêu.</p>
                        <div class="mt-8 flex flex-wrap gap-4">
                            <a href="#" class="inline-flex items-center justify-center rounded-full bg-white px-8 py-3 text-sm font-semibold text-slate-950 hover:bg-slate-200 transition">MUA NGAY</a>
                        </div>
                    </div>
                    <div class="relative p-6 lg:p-10 overflow-hidden">
                        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,_rgba(56,189,248,0.35),_transparent_40%)]"></div>
                        <div class="relative grid grid-cols-2 gap-4">
                            <div class="space-y-4">
                                <div class="rounded-3xl overflow-hidden bg-white shadow-2xl border border-white/20">
                                    <div class="h-72 bg-[url('https://images.unsplash.com/photo-1512820790803-83ca734da794?auto=format&fit=crop&w=700&q=80')] bg-cover bg-center"></div>
                                    <div class="p-4 bg-slate-900/90 text-white">
                                        <p class="text-xs uppercase tracking-[0.2em] text-slate-300">Napoleon Hill</p>
                                        <h2 class="mt-2 text-lg font-bold">Think & Grow Rich</h2>
                                    </div>
                                </div>
                                <div class="rounded-3xl overflow-hidden bg-white shadow-2xl border border-white/20">
                                    <div class="h-52 bg-[url('https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?auto=format&fit=crop&w=700&q=80')] bg-cover bg-center"></div>
                                    <div class="p-4 bg-slate-900/90 text-white">
                                        <p class="text-xs uppercase tracking-[0.2em] text-slate-300">Dale Carnegie</p>
                                        <h2 class="mt-2 text-lg font-bold">Đắc Nhân Tâm</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="space-y-4">
                                <div class="rounded-3xl overflow-hidden bg-white shadow-2xl border border-white/20">
                                    <div class="h-72 bg-[url('https://images.unsplash.com/photo-1496104679561-38e84becd7a6?auto=format&fit=crop&w=700&q=80')] bg-cover bg-center"></div>
                                    <div class="p-4 bg-slate-900/90 text-white">
                                        <p class="text-xs uppercase tracking-[0.2em] text-slate-300">Vuong</p>
                                        <h2 class="mt-2 text-lg font-bold">Tư Duy Ngược</h2>
                                    </div>
                                </div>
                                <div class="rounded-3xl overflow-hidden bg-white shadow-2xl border border-white/20">
                                    <div class="h-52 bg-[url('https://images.unsplash.com/photo-1519682337058-a94d519337bc?auto=format&fit=crop&w=700&q=80')] bg-cover bg-center"></div>
                                    <div class="p-4 bg-slate-900/90 text-white">
                                        <p class="text-xs uppercase tracking-[0.2em] text-slate-300">Sách Bán Chạy</p>
                                        <h2 class="mt-2 text-lg font-bold">Sách hay mỗi ngày</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <section class="mt-10">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold">TOP SÁCH BÁN CHẠY</h2>
                </div>
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-4">
                    <a href="#" class="group block rounded-3xl bg-white p-4 shadow-sm border border-slate-200 hover:shadow-lg transition">
                        <div class="h-52 rounded-3xl bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?auto=format&fit=crop&w=700&q=80')"></div>
                        <h3 class="mt-4 font-semibold text-sm text-slate-900">Sherlock Holmes</h3>
                        <p class="mt-1 text-xs text-slate-500">Văn học kinh điển</p>
                        <p class="mt-2 font-semibold text-slate-900">112.100 ₫</p>
                    </a>
                    <a href="#" class="group block rounded-3xl bg-white p-4 shadow-sm border border-slate-200 hover:shadow-lg transition">
                        <div class="h-52 rounded-3xl bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1496104679561-38e84becd7a6?auto=format&fit=crop&w=700&q=80')"></div>
                        <h3 class="mt-4 font-semibold text-sm text-slate-900">Công bằng trên đời...</h3>
                        <p class="mt-1 text-xs text-slate-500">TimeBooks</p>
                        <p class="mt-2 font-semibold text-slate-900">99.000 ₫</p>
                    </a>
                    <a href="#" class="group block rounded-3xl bg-white p-4 shadow-sm border border-slate-200 hover:shadow-lg transition">
                        <div class="h-52 rounded-3xl bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1512820790803-83ca734da794?auto=format&fit=crop&w=700&q=80')"></div>
                        <h3 class="mt-4 font-semibold text-sm text-slate-900">Tuổi trẻ đáng giá bao nhiêu?</h3>
                        <p class="mt-1 text-xs text-slate-500">First News</p>
                        <p class="mt-2 font-semibold text-slate-900">90.000 ₫</p>
                    </a>
                    <a href="#" class="group block rounded-3xl bg-white p-4 shadow-sm border border-slate-200 hover:shadow-lg transition">
                        <div class="h-52 rounded-3xl bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1528223897350-9ed4f8aa0c11?auto=format&fit=crop&w=700&q=80')"></div>
                        <h3 class="mt-4 font-semibold text-sm text-slate-900">Thảo túng tâm lý</h3>
                        <p class="mt-1 text-xs text-slate-500">Tâm lý học</p>
                        <p class="mt-2 font-semibold text-slate-900">126.130 ₫</p>
                    </a>
                    <a href="#" class="group block rounded-3xl bg-white p-4 shadow-sm border border-slate-200 hover:shadow-lg transition">
                        <div class="h-52 rounded-3xl bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1496317899792-9d7dbcd928a1?auto=format&fit=crop&w=700&q=80')"></div>
                        <h3 class="mt-4 font-semibold text-sm text-slate-900">Thỏ Bảy Màu...</h3>
                        <p class="mt-1 text-xs text-slate-500">Truyện tranh</p>
                        <p class="mt-2 font-semibold text-slate-900">81.180 ₫</p>
                    </a>
                </div>
            </section>

            <section class="mt-10 bg-slate-50 rounded-[2rem] p-6">
                <h2 class="text-2xl font-bold mb-6">SÁCH VĂN HỌC KINH ĐIỂN</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    <a href="#" class="group block rounded-3xl bg-white p-4 shadow-sm border border-slate-200 hover:shadow-lg transition">
                        <div class="h-72 rounded-3xl bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1519682337058-a94d519337bc?auto=format&fit=crop&w=700&q=80')"></div>
                        <h3 class="mt-4 font-semibold text-sm text-slate-900">Sherlock Holmes</h3>
                        <p class="mt-1 text-xs text-slate-500">Văn học kinh điển</p>
                        <p class="mt-2 font-semibold text-slate-900">112.100 ₫</p>
                    </a>
                </div>
            </section>

            <section class="mt-10 bg-slate-50 rounded-[2rem] p-6">
                <h2 class="text-2xl font-bold mb-6">SÁCH HƯỚNG NGHIỆP & PHÁT TRIỂN BẢN THÂN</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    <a href="#" class="group block rounded-3xl bg-white p-4 shadow-sm border border-slate-200 hover:shadow-lg transition">
                        <div class="h-64 rounded-3xl bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=700&q=80')"></div>
                        <h3 class="mt-4 font-semibold text-sm text-slate-900">Công bằng trên đời...</h3>
                        <p class="mt-1 text-xs text-slate-500">TimeBooks</p>
                        <p class="mt-2 font-semibold text-slate-900">99.000 ₫</p>
                    </a>
                    <a href="#" class="group block rounded-3xl bg-white p-4 shadow-sm border border-slate-200 hover:shadow-lg transition">
                        <div class="h-64 rounded-3xl bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1492724441997-5dc865305da7?auto=format&fit=crop&w=700&q=80')"></div>
                        <h3 class="mt-4 font-semibold text-sm text-slate-900">Mối Làm Vậy Nghĩ Là...</h3>
                        <p class="mt-1 text-xs text-slate-500">Nhà Xuất Bản</p>
                        <p class="mt-2 font-semibold text-slate-900">120.000 ₫</p>
                    </a>
                    <a href="#" class="group block rounded-3xl bg-white p-4 shadow-sm border border-slate-200 hover:shadow-lg transition">
                        <div class="h-64 rounded-3xl bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1507842217343-583bb7270b66?auto=format&fit=crop&w=700&q=80')"></div>
                        <h3 class="mt-4 font-semibold text-sm text-slate-900">Tuổi trẻ đáng giá bao nhiêu?</h3>
                        <p class="mt-1 text-xs text-slate-500">First News</p>
                        <p class="mt-2 font-semibold text-slate-900">90.000 ₫</p>
                    </a>
                </div>
            </section>

            <section class="mt-10 bg-slate-50 rounded-[2rem] p-6">
                <h2 class="text-2xl font-bold mb-6">SÁCH TÂM LÝ HỌC</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    <a href="#" class="group block rounded-3xl bg-white p-4 shadow-sm border border-slate-200 hover:shadow-lg transition">
                        <div class="h-72 rounded-3xl bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=700&q=80')"></div>
                        <h3 class="mt-4 font-semibold text-sm text-slate-900">Thảo túng tâm lý</h3>
                        <p class="mt-1 text-xs text-slate-500">Tâm lý học</p>
                        <p class="mt-2 font-semibold text-slate-900">126.130 ₫</p>
                    </a>
                </div>
            </section>

            <section class="mt-10 bg-slate-50 rounded-[2rem] p-6 mb-10">
                <h2 class="text-2xl font-bold mb-6">TRUYỆN TRANH</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <a href="#" class="group block rounded-3xl bg-white p-4 shadow-sm border border-slate-200 hover:shadow-lg transition">
                        <div class="h-72 rounded-3xl bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=700&q=80')"></div>
                        <h3 class="mt-4 font-semibold text-sm text-slate-900">Thỏ Bảy Màu Và...</h3>
                        <p class="mt-1 text-xs text-slate-500">Kira</p>
                        <p class="mt-2 font-semibold text-slate-900">81.180 ₫</p>
                    </a>
                    <a href="#" class="group block rounded-3xl bg-white p-4 shadow-sm border border-slate-200 hover:shadow-lg transition">
                        <div class="h-72 rounded-3xl bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1522468823206-3323708cd724?auto=format&fit=crop&w=700&q=80')"></div>
                        <h3 class="mt-4 font-semibold text-sm text-slate-900">Tớ là mèo Pusheen</h3>
                        <p class="mt-1 text-xs text-slate-500">NXB Kim Đồng</p>
                        <p class="mt-2 font-semibold text-slate-900">80.000 ₫</p>
                    </a>
                </div>
            </section>
        </main>
    </div>
</body>

</html>