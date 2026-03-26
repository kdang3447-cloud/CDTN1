<!doctype html>
<html lang="vi" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cửa hàng Sách</title>
    <script src="https://cdn.tailwindcss.com/3.4.17"></script>
    <script src="https://cdn.jsdelivr.net/npm/lucide@0.263.0/dist/umd/lucide.min.js"></script>
    <script src="/_sdk/element_sdk.js"></script>
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <script src="/_sdk/data_sdk.js" type="text/javascript"></script>
</head>

<body class="h-full">
    <div id="app" class="h-full w-full overflow-auto flex flex-col bg-white">
        <!-- Header -->
        <header class="w-full sticky top-0 z-40 bg-white border-b border-gray-200 shadow-sm">
            <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between py-4">
                    <div class="flex items-center gap-3">
                        <div class="text-2xl font-bold text-blue-600">
                            📚
                        </div>
                        <h1 id="storeName" class="text-xl font-bold text-gray-900">Cửa hàng Sách</h1>
                    </div>
                    <div class="hidden md:flex flex-1 mx-8">
                        <div class="relative w-full max-w-md">
                            <input id="searchInput" type="text" placeholder="Tìm kiếm sách..."
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <i data-lucide="search" class="absolute right-3 top-2.5 h-5 w-5 text-gray-400"></i>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        @if(session('user'))
                            <div class="flex items-center gap-2">
                                <span class="px-4 py-2 bg-green-600 text-white rounded-lg font-medium">Chào,
                                    {{ session('user') }}</span>
                                <form method="POST" action="/logout" class="inline">
                                    @csrf
                                    <button type="submit"
                                        class="px-3 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition font-medium">Đăng
                                        xuất</button>
                                </form>
                                <form method="POST" action="/delete-account" class="inline">
                                    @csrf
                                    <button type="submit"
                                        class="px-3 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition font-medium">Xóa
                                        tài khoản</button>
                                </form>
                            </div>
                        @else
                            <a href="/auth"
                                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-medium">Đăng
                                nhập</a>
                        @endif
                        <button class="p-2 hover:bg-gray-100 rounded-lg transition relative"> <i
                                data-lucide="shopping-cart" class="h-6 w-6 text-gray-700"></i> <span
                                class="absolute top-0 right-0 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">0</span>
                        </button>
                    </div>
                </div><!-- Categories Navigation -->
                <div class="flex gap-6 border-t border-gray-200 py-3 overflow-x-auto">
                    <a href="#" class="text-sm font-medium text-gray-700 hover:text-blue-600 whitespace-nowrap">Tất cả
                        sách</a> <a href="#"
                        class="text-sm font-medium text-gray-700 hover:text-blue-600 whitespace-nowrap">Văn học</a> <a
                        href="#" class="text-sm font-medium text-gray-700 hover:text-blue-600 whitespace-nowrap">Khoa
                        học</a> <a href="#"
                        class="text-sm font-medium text-gray-700 hover:text-blue-600 whitespace-nowrap">Trẻ em</a> <a
                        href="#" class="text-sm font-medium text-gray-700 hover:text-blue-600 whitespace-nowrap">Tiểu
                        sử</a> <a href="#"
                        class="text-sm font-medium text-gray-700 hover:text-blue-600 whitespace-nowrap">Kỹ năng</a>
                </div>
            </div>
        </header>
        <main class="flex-1 w-full">
            @if(session('success'))
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
                    <div class="p-3 bg-green-600 text-white rounded-lg">{{ session('success') }}</div>
                </div>
            @endif
            @if(session('error'))
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
                    <div class="p-3 bg-red-600 text-white rounded-lg">{{ session('error') }}</div>
                </div>
            @endif
            <!-- Banner -->
            <div class="w-full bg-gradient-to-r from-blue-600 to-blue-800 text-white py-8">
                <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                    <h2 class="text-3xl font-bold mb-2">Khuyến mãi Mùa hè</h2>
                    <p class="text-blue-100">Giảm tới 40% cho các sách được chọn</p>
                </div>
            </div><!-- Featured Section -->
            <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <div class="mb-6">
                    <h3 id="featuredTitle" class="text-2xl font-bold text-gray-900 mb-4">Sách nổi bật</h3>
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
                        <!-- Book Card 1 -->
                        <div
                            class="bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition cursor-pointer">
                            <div
                                class="bg-gradient-to-br from-blue-400 to-blue-600 h-40 flex items-center justify-center text-6xl">
                                📕
                            </div>
                            <div class="p-3">
                                <h4 class="font-semibold text-gray-900 text-sm line-clamp-2">The Great Gatsby</h4>
                                <p class="text-xs text-gray-500 mt-1">F. Scott Fitzgerald</p>
                                <div class="flex items-center justify-between mt-3">
                                    <span class="font-bold text-gray-900">₫ 259.000</span> <button
                                        class="bg-blue-600 text-white px-2 py-1 rounded text-xs hover:bg-blue-700 transition">Thêm</button>
                                </div>
                            </div>
                        </div><!-- Book Card 2 -->
                        <div
                            class="bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition cursor-pointer">
                            <div
                                class="bg-gradient-to-br from-red-400 to-red-600 h-40 flex items-center justify-center text-6xl">
                                📗
                            </div>
                            <div class="p-3">
                                <h4 class="font-semibold text-gray-900 text-sm line-clamp-2">To Kill a Mockingbird</h4>
                                <p class="text-xs text-gray-500 mt-1">Harper Lee</p>
                                <div class="flex items-center justify-between mt-3">
                                    <span class="font-bold text-gray-900">₫ 299.000</span> <button
                                        class="bg-blue-600 text-white px-2 py-1 rounded text-xs hover:bg-blue-700 transition">Thêm</button>
                                </div>
                            </div>
                        </div><!-- Book Card 3 -->
                        <div
                            class="bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition cursor-pointer">
                            <div
                                class="bg-gradient-to-br from-yellow-400 to-yellow-600 h-40 flex items-center justify-center text-6xl">
                                📘
                            </div>
                            <div class="p-3">
                                <h4 class="font-semibold text-gray-900 text-sm line-clamp-2">1984</h4>
                                <p class="text-xs text-gray-500 mt-1">George Orwell</p>
                                <div class="flex items-center justify-between mt-3">
                                    <span class="font-bold text-gray-900">₫ 319.000</span> <button
                                        class="bg-blue-600 text-white px-2 py-1 rounded text-xs hover:bg-blue-700 transition">Thêm</button>
                                </div>
                            </div>
                        </div><!-- Book Card 4 -->
                        <div
                            class="bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition cursor-pointer">
                            <div
                                class="bg-gradient-to-br from-purple-400 to-purple-600 h-40 flex items-center justify-center text-6xl">
                                📙
                            </div>
                            <div class="p-3">
                                <h4 class="font-semibold text-gray-900 text-sm line-clamp-2">Pride and Prejudice</h4>
                                <p class="text-xs text-gray-500 mt-1">Jane Austen</p>
                                <div class="flex items-center justify-between mt-3">
                                    <span class="font-bold text-gray-900">₫ 239.000</span> <button
                                        class="bg-blue-600 text-white px-2 py-1 rounded text-xs hover:bg-blue-700 transition">Thêm</button>
                                </div>
                            </div>
                        </div><!-- Book Card 5 -->
                        <div
                            class="bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition cursor-pointer">
                            <div
                                class="bg-gradient-to-br from-green-400 to-green-600 h-40 flex items-center justify-center text-6xl">
                                📔
                            </div>
                            <div class="p-3">
                                <h4 class="font-semibold text-gray-900 text-sm line-clamp-2">The Catcher in the Rye</h4>
                                <p class="text-xs text-gray-500 mt-1">J.D. Salinger</p>
                                <div class="flex items-center justify-between mt-3">
                                    <span class="font-bold text-gray-900">₫ 279.000</span> <button
                                        class="bg-blue-600 text-white px-2 py-1 rounded text-xs hover:bg-blue-700 transition">Thêm</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- Categories Section -->
                <div class="my-8">
                    <h3 id="categoriesTitle" class="text-2xl font-bold text-gray-900 mb-4">Mua theo danh mục</h3>
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                        <div
                            class="bg-gradient-to-br from-blue-50 to-blue-100 p-4 rounded-lg text-center cursor-pointer hover:shadow-md transition">
                            <div class="text-3xl mb-2">
                                📖
                            </div>
                            <h4 class="font-semibold text-gray-900 text-sm">Văn học</h4>
                            <p class="text-xs text-gray-600 mt-1">2.450 sách</p>
                        </div>
                        <div
                            class="bg-gradient-to-br from-red-50 to-red-100 p-4 rounded-lg text-center cursor-pointer hover:shadow-md transition">
                            <div class="text-3xl mb-2">
                                🔬
                            </div>
                            <h4 class="font-semibold text-gray-900 text-sm">Khoa học</h4>
                            <p class="text-xs text-gray-600 mt-1">1.320 sách</p>
                        </div>
                        <div
                            class="bg-gradient-to-br from-yellow-50 to-yellow-100 p-4 rounded-lg text-center cursor-pointer hover:shadow-md transition">
                            <div class="text-3xl mb-2">
                                💼
                            </div>
                            <h4 class="font-semibold text-gray-900 text-sm">Kinh doanh</h4>
                            <p class="text-xs text-gray-600 mt-1">980 sách</p>
                        </div>
                        <div
                            class="bg-gradient-to-br from-purple-50 to-purple-100 p-4 rounded-lg text-center cursor-pointer hover:shadow-md transition">
                            <div class="text-3xl mb-2">
                                🧘
                            </div>
                            <h4 class="font-semibold text-gray-900 text-sm">Kỹ năng</h4>
                            <p class="text-xs text-gray-600 mt-1">756 sách</p>
                        </div>
                        <div
                            class="bg-gradient-to-br from-green-50 to-green-100 p-4 rounded-lg text-center cursor-pointer hover:shadow-md transition">
                            <div class="text-3xl mb-2">
                                👶
                            </div>
                            <h4 class="font-semibold text-gray-900 text-sm">Trẻ em</h4>
                            <p class="text-xs text-gray-600 mt-1">3.100 sách</p>
                        </div>
                        <div
                            class="bg-gradient-to-br from-pink-50 to-pink-100 p-4 rounded-lg text-center cursor-pointer hover:shadow-md transition">
                            <div class="text-3xl mb-2">
                                📚
                            </div>
                            <h4 class="font-semibold text-gray-900 text-sm">Khác</h4>
                            <p class="text-xs text-gray-600 mt-1">Xem tất cả</p>
                        </div>
                    </div>
                </div><!-- Best Sellers -->
                <div class="my-8">
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Bán chạy nhất</h3>
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
                        <div
                            class="bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition cursor-pointer">
                            <div
                                class="bg-gradient-to-br from-indigo-400 to-indigo-600 h-40 flex items-center justify-center text-6xl">
                                📕
                            </div>
                            <div class="p-3">
                                <div class="flex gap-1 mb-1">
                                    <i data-lucide="star" class="h-3 w-3 fill-yellow-400 text-yellow-400"></i> <i
                                        data-lucide="star" class="h-3 w-3 fill-yellow-400 text-yellow-400"></i> <i
                                        data-lucide="star" class="h-3 w-3 fill-yellow-400 text-yellow-400"></i> <i
                                        data-lucide="star" class="h-3 w-3 fill-yellow-400 text-yellow-400"></i> <i
                                        data-lucide="star" class="h-3 w-3 fill-yellow-400 text-yellow-400"></i>
                                </div>
                                <h4 class="font-semibold text-gray-900 text-sm line-clamp-2">The Hobbit</h4>
                                <p class="text-xs text-gray-500 mt-1">J.R.R. Tolkien</p>
                                <div class="flex items-center justify-between mt-3">
                                    <span class="font-bold text-gray-900">₫ 339.000</span> <button
                                        class="bg-blue-600 text-white px-2 py-1 rounded text-xs hover:bg-blue-700 transition">Thêm</button>
                                </div>
                            </div>
                        </div>
                        <div
                            class="bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition cursor-pointer">
                            <div
                                class="bg-gradient-to-br from-cyan-400 to-cyan-600 h-40 flex items-center justify-center text-6xl">
                                📗
                            </div>
                            <div class="p-3">
                                <div class="flex gap-1 mb-1">
                                    <i data-lucide="star" class="h-3 w-3 fill-yellow-400 text-yellow-400"></i> <i
                                        data-lucide="star" class="h-3 w-3 fill-yellow-400 text-yellow-400"></i> <i
                                        data-lucide="star" class="h-3 w-3 fill-yellow-400 text-yellow-400"></i> <i
                                        data-lucide="star" class="h-3 w-3 fill-yellow-400 text-yellow-400"></i> <i
                                        data-lucide="star" class="h-3 w-3 fill-gray-300 text-gray-300"></i>
                                </div>
                                <h4 class="font-semibold text-gray-900 text-sm line-clamp-2">Atomic Habits</h4>
                                <p class="text-xs text-gray-500 mt-1">James Clear</p>
                                <div class="flex items-center justify-between mt-3">
                                    <span class="font-bold text-gray-900">₫ 379.000</span> <button
                                        class="bg-blue-600 text-white px-2 py-1 rounded text-xs hover:bg-blue-700 transition">Thêm</button>
                                </div>
                            </div>
                        </div>
                        <div
                            class="bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition cursor-pointer">
                            <div
                                class="bg-gradient-to-br from-lime-400 to-lime-600 h-40 flex items-center justify-center text-6xl">
                                📘
                            </div>
                            <div class="p-3">
                                <div class="flex gap-1 mb-1">
                                    <i data-lucide="star" class="h-3 w-3 fill-yellow-400 text-yellow-400"></i> <i
                                        data-lucide="star" class="h-3 w-3 fill-yellow-400 text-yellow-400"></i> <i
                                        data-lucide="star" class="h-3 w-3 fill-yellow-400 text-yellow-400"></i> <i
                                        data-lucide="star" class="h-3 w-3 fill-yellow-400 text-yellow-400"></i> <i
                                        data-lucide="star" class="h-3 w-3 fill-yellow-400 text-yellow-400"></i>
                                </div>
                                <h4 class="font-semibold text-gray-900 text-sm line-clamp-2">Dune</h4>
                                <p class="text-xs text-gray-500 mt-1">Frank Herbert</p>
                                <div class="flex items-center justify-between mt-3">
                                    <span class="font-bold text-gray-900">₫ 359.000</span> <button
                                        class="bg-blue-600 text-white px-2 py-1 rounded text-xs hover:bg-blue-700 transition">Thêm</button>
                                </div>
                            </div>
                        </div>
                        <div
                            class="bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition cursor-pointer">
                            <div
                                class="bg-gradient-to-br from-orange-400 to-orange-600 h-40 flex items-center justify-center text-6xl">
                                📙
                            </div>
                            <div class="p-3">
                                <div class="flex gap-1 mb-1">
                                    <i data-lucide="star" class="h-3 w-3 fill-yellow-400 text-yellow-400"></i> <i
                                        data-lucide="star" class="h-3 w-3 fill-yellow-400 text-yellow-400"></i> <i
                                        data-lucide="star" class="h-3 w-3 fill-yellow-400 text-yellow-400"></i> <i
                                        data-lucide="star" class="h-3 w-3 fill-yellow-400 text-yellow-400"></i> <i
                                        data-lucide="star" class="h-3 w-3 fill-yellow-400 text-yellow-400"></i>
                                </div>
                                <h4 class="font-semibold text-gray-900 text-sm line-clamp-2">The Midnight Library</h4>
                                <p class="text-xs text-gray-500 mt-1">Matt Haig</p>
                                <div class="flex items-center justify-between mt-3">
                                    <span class="font-bold text-gray-900">₫ 299.000</span> <button
                                        class="bg-blue-600 text-white px-2 py-1 rounded text-xs hover:bg-blue-700 transition">Thêm</button>
                                </div>
                            </div>
                        </div>
                        <div
                            class="bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition cursor-pointer">
                            <div
                                class="bg-gradient-to-br from-rose-400 to-rose-600 h-40 flex items-center justify-center text-6xl">
                                📔
                            </div>
                            <div class="p-3">
                                <div class="flex gap-1 mb-1">
                                    <i data-lucide="star" class="h-3 w-3 fill-yellow-400 text-yellow-400"></i> <i
                                        data-lucide="star" class="h-3 w-3 fill-yellow-400 text-yellow-400"></i> <i
                                        data-lucide="star" class="h-3 w-3 fill-yellow-400 text-yellow-400"></i> <i
                                        data-lucide="star" class="h-3 w-3 fill-yellow-400 text-yellow-400"></i> <i
                                        data-lucide="star" class="h-3 w-3 fill-gray-300 text-gray-300"></i>
                                </div>
                                <h4 class="font-semibold text-gray-900 text-sm line-clamp-2">Project Hail Mary</h4>
                                <p class="text-xs text-gray-500 mt-1">Andy Weir</p>
                                <div class="flex items-center justify-between mt-3">
                                    <span class="font-bold text-gray-900">₫ 399.000</span> <button
                                        class="bg-blue-600 text-white px-2 py-1 rounded text-xs hover:bg-blue-700 transition">Thêm</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main><!-- Footer -->
        <footer class="w-full bg-gray-900 text-white mt-12">
            <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                    <div>
                        <h4 class="font-bold mb-4 flex items-center gap-2"><span class="text-2xl">📚</span> <span>Cửa
                                hàng Sách</span></h4>
                        <p id="footerText" class="text-sm text-gray-400">Nơi mua sách trực tuyến lớn nhất với đa dạng
                            thể loại sách.</p>
                    </div>
                    <div>
                        <h4 class="font-bold mb-4">Liên kết nhanh</h4>
                        <ul class="space-y-2 text-sm text-gray-400">
                            <li><a href="#" class="hover:text-white transition">Trang chủ</a></li>
                            <li><a href="#" class="hover:text-white transition">Sách</a></li>
                            <li><a href="#" class="hover:text-white transition">Danh mục</a></li>
                            <li><a href="#" class="hover:text-white transition">Bán chạy nhất</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-bold mb-4">Dịch vụ khách hàng</h4>
                        <ul class="space-y-2 text-sm text-gray-400">
                            <li><a href="#" class="hover:text-white transition">Liên hệ chúng tôi</a></li>
                            <li><a href="#" class="hover:text-white transition">Thông tin giao hàng</a></li>
                            <li><a href="#" class="hover:text-white transition">Đổi trả</a></li>
                            <li><a href="#" class="hover:text-white transition">Câu hỏi thường gặp</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-bold mb-4">Theo dõi chúng tôi</h4>
                        <div class="flex gap-4">
                            <a href="#" class="text-gray-400 hover:text-white transition"> <i data-lucide="facebook"
                                    class="h-5 w-5"></i> </a> <a href="#"
                                class="text-gray-400 hover:text-white transition"> <i data-lucide="twitter"
                                    class="h-5 w-5"></i> </a> <a href="#"
                                class="text-gray-400 hover:text-white transition"> <i data-lucide="instagram"
                                    class="h-5 w-5"></i> </a>
                        </div>
                    </div>
                </div>
                <div class="border-t border-gray-800 pt-8">
                    <p class="text-center text-sm text-gray-400">© 2024 Cửa hàng Sách. Bảo lưu mọi quyền.</p>
                </div>
            </div>
        </footer>
    </div>
    <script src="{{ asset('js/welcome.js') }}"></script>
    <script>
    (function() {
        function c() {
            var b = a.contentDocument || a.contentWindow.document;
            if (b) {
                var d = b.createElement('script');
                d.innerHTML =
                    "window.__CF$cv$params={r:'9e287518d6cc88cc',t:'MTc3NDU1MjI0Ny4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";
                b.getElementsByTagName('head')[0].appendChild(d)
            }
        }
        if (document.body) {
            var a = document.createElement('iframe');
            a.height = 1;
            a.width = 1;
            a.style.position = 'absolute';
            a.style.top = 0;
            a.style.left = 0;
            a.style.border = 'none';
            a.style.visibility = 'hidden';
            document.body.appendChild(a);
            if ('loading' !== document.readyState) c();
            else if (window.addEventListener) document.addEventListener('DOMContentLoaded', c);
            else {
                var e = document.onreadystatechange || function() {};
                document.onreadystatechange = function(b) {
                    e(b);
                    'loading' !== document.readyState && (document.onreadystatechange = e, c())
                }
            }
        }
    })();
    </script>
</body>

</html>
</div>
</section>