<?php


if (!function_exists('set_active')) {
    function set_active($route)
    {
        return \Illuminate\Support\Facades\Route::is($route) ? 'active' : '';
    }
}

if (!function_exists('image_url')) {
    /**
     * Hàm trả về URL ảnh với fallback nếu ảnh không tồn tại
     * @param $imagePath - Đường dẫn ảnh từ CSDL
     * @param $default - Ảnh fallback mặc định
     * @return string - URL ảnh hoặc fallback
     */
    function image_url($imagePath, $default = '/images/book/default.png')
    {
        // Kiểm tra nếu file tồn tại
        $fullPath = public_path() . $imagePath;
        
        if (file_exists($fullPath)) {
            return asset($imagePath);
        }
        
        // Nếu không tồn tại, trả về ảnh mặc định
        return asset($default);
    }
}

if (!function_exists('format_price_vnd')) {
    /**
     * Format giá tiền thành VND
     * @param $price - Giá tiền
     * @return string - Giá tiền định dạng VND
     */
    function format_price_vnd($price)
    {
        if (is_null($price) || $price === '') {
            return '0 đ';
        }
        
        // Format số với dấu phân cách hàng nghìn
        return number_format((float)$price, 0, ',', '.') . ' đ';
    }
}

