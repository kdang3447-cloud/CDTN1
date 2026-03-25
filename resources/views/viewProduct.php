<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Book Management System</title>
    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="/css/styleProduct.css">
    <style>
    .fade-in {
        animation: fadeIn 0.5s ease-in;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .btn-hover {
        transition: all 0.3s ease;
    }

    .btn-hover:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
    </style>
</head>

<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen">
    <div class="container mx-auto p-6 max-w-6xl">
        <h1 class="text-4xl font-bold text-center mb-8 text-indigo-800 fade-in">
            <i class="fas fa-book mr-2"></i>Hệ Thống Quản Lý Sách
        </h1>

        <!-- Success/Error Messages -->
        <div id="message" class="hidden mb-4 p-4 rounded-lg"></div>

        <!-- Form to add/edit book -->
        <div class="bg-white rounded-xl shadow-lg p-6 mb-8 fade-in">
            <h2 class="text-2xl font-semibold mb-4 text-gray-800">
                <i class="fas fa-plus-circle mr-2 text-green-500"></i>Thêm/Sửa Sách
            </h2>
            <form id="form">
                <input type="hidden" id="id">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="relative">
                        <i class="fas fa-heading absolute left-3 top-3 text-gray-400"></i>
                        <input id="title" placeholder="Tiêu đề Sách"
                            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all"
                            required>
                    </div>
                    <div class="relative">
                        <i class="fas fa-user absolute left-3 top-3 text-gray-400"></i>
                        <input id="author" placeholder="Tác giả"
                            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all"
                            required>
                    </div>
                    <div class="relative">
                        <i class="fas fa-tags absolute left-3 top-3 text-gray-400"></i>
                        <input id="category" placeholder="Thể Loại"
                            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all"
                            required>
                    </div>
                    <div class="relative">
                        <i class="fas fa-dollar-sign absolute left-3 top-3 text-gray-400"></i>
                        <input id="price" type="number" placeholder="Giá (VND)"
                            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all"
                            required>
                    </div>
                    <div class="relative md:col-span-2">
                        <i class="fas fa-boxes absolute left-3 top-3 text-gray-400"></i>
                        <input id="stock" type="number" placeholder="Số Lượng Trong Kho"
                            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all"
                            required>
                    </div>
                </div>
                <div class="flex gap-4 mt-6">
                    <button type="button" onclick="save()" id="saveBtn"
                        class="btn-hover bg-gradient-to-r from-green-500 to-green-600 text-white px-6 py-3 rounded-lg font-semibold shadow-md">
                        <i class="fas fa-save mr-2"></i>Lưu Sách
                    </button>
                    <button type="button" onclick="resetForm()"
                        class="btn-hover bg-gradient-to-r from-gray-500 to-gray-600 text-white px-6 py-3 rounded-lg font-semibold shadow-md">
                        <i class="fas fa-undo mr-2"></i>Reset
                    </button>
                </div>
            </form>
        </div>

        <!-- Statistics -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
            <div class="bg-white rounded-xl shadow-lg p-6 text-center fade-in">
                <i class="fas fa-book text-3xl text-blue-500 mb-2"></i>
                <h3 class="text-lg font-semibold text-gray-700">Tổng Số Sách</h3>
                <p class="text-2xl font-bold text-blue-600" id="total">0</p>
            </div>
            <div class="bg-white rounded-xl shadow-lg p-6 text-center fade-in">
                <i class="fas fa-dollar-sign text-3xl text-green-500 mb-2"></i>
                <h3 class="text-lg font-semibold text-gray-700">Tổng Giá Trị</h3>
                <p class="text-2xl font-bold text-green-600" id="value">0</p>
            </div>
            <div class="bg-white rounded-xl shadow-lg p-6 text-center fade-in">
                <i class="fas fa-check-circle text-3xl text-emerald-500 mb-2"></i>
                <h3 class="text-lg font-semibold text-gray-700">Còn Hàng</h3>
                <p class="text-2xl font-bold text-emerald-600" id="in">0</p>
            </div>
            <div class="bg-white rounded-xl shadow-lg p-6 text-center fade-in">
                <i class="fas fa-times-circle text-3xl text-red-500 mb-2"></i>
                <h3 class="text-lg font-semibold text-gray-700">Hết Hàng</h3>
                <p class="text-2xl font-bold text-red-600" id="out">0</p>
            </div>
        </div>

        <!-- Table -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden fade-in">
            <div class="px-6 py-4 bg-gray-50 border-b">
                <h2 class="text-2xl font-semibold text-gray-800">
                    <i class="fas fa-list mr-2 text-indigo-500"></i>Danh Sách Sách
                </h2>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-indigo-50">
                        <tr>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-indigo-700 uppercase tracking-wider">
                                Tiêu đề</th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-indigo-700 uppercase tracking-wider">
                                Tác giả</th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-indigo-700 uppercase tracking-wider">
                                Thể loại</th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-indigo-700 uppercase tracking-wider">
                                Giá</th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-indigo-700 uppercase tracking-wider">
                                Số lượng hàng trong kho</th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-indigo-700 uppercase tracking-wider">
                                Tình Trạng</th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-indigo-700 uppercase tracking-wider">
                                Hành Động</th>
                        </tr>
                    </thead>
                    <tbody id="table" class="bg-white divide-y divide-gray-200">
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="/js/Product.js"></script>
</body>

</html>