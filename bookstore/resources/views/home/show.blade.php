<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $book['title'] }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #efefef;
            color: #222;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .container {
            width: 96%;
            max-width: 1280px;
            margin: 20px auto;
        }

        .back-link {
            display: inline-block;
            margin-bottom: 20px;
            color: #333;
            font-size: 15px;
        }

        .product-detail {
            display: grid;
            grid-template-columns: 300px 1fr 340px;
            gap: 26px;
            align-items: start;
        }

        .left-gallery {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .main-image {
            border: 3px solid #2b9cff;
            background: #fff;
            overflow: hidden;
        }

        .main-image img {
            width: 100%;
            display: block;
        }

        .thumb-list {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .thumb-item {
            width: 58px;
            height: 78px;
            border: 1px solid #ff7878;
            background: #fff;
            overflow: hidden;
            cursor: pointer;
        }

        .thumb-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .middle-info h1 {
            font-size: 18px;
            font-weight: 500;
            line-height: 1.5;
            margin-bottom: 16px;
        }

        .price-box {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            background: #e7e7e7;
            padding: 14px 18px;
            margin-bottom: 28px;
            min-width: 280px;
            flex-wrap: wrap;
        }

        .current-price {
            color: #ff3a30;
            font-size: 24px;
            font-weight: 500;
        }

        .old-price {
            color: #444;
            font-size: 15px;
            text-decoration: line-through;
        }

        .discount-badge {
            border: 1px solid #ff6b6b;
            color: #ff5555;
            padding: 4px 8px;
            font-size: 14px;
        }

        .quantity-row {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 28px;
        }

        .quantity-label {
            font-weight: 700;
        }

        .qty-box {
            display: flex;
            align-items: center;
        }

        .qty-btn,
        .qty-input {
            width: 34px;
            height: 34px;
            border: 1px solid #ccc;
            text-align: center;
            background: #f3f3f3;
            font-size: 22px;
        }

        .qty-btn {
            cursor: pointer;
            line-height: 32px;
            user-select: none;
        }

        .qty-input {
            width: 42px;
            font-size: 16px;
            background: #fff;
            outline: none;
        }

        .action-row {
            display: flex;
            gap: 22px;
            flex-wrap: wrap;
        }

        .btn-outline {
            padding: 13px 22px;
            border: 1px solid #ff6b6b;
            background: #fff;
            color: #ff5a5a;
            cursor: pointer;
            font-size: 15px;
        }

        .btn-outline:hover {
            background: #fff3f3;
        }

        .spec-table {
            width: 100%;
            border-collapse: collapse;
        }

        .spec-table tr:nth-child(odd) {
            background: #d9d9d9;
        }

        .spec-table tr:nth-child(even) {
            background: #eeeeee;
        }

        .spec-table td {
            padding: 12px 14px;
            font-size: 15px;
        }

        .spec-table td:first-child {
            width: 42%;
        }

        .description-section {
            margin-top: 26px;
            max-width: 760px;
        }

        .desc-title {
            display: inline-block;
            background: #e7e7e7;
            padding: 10px 18px;
            margin-bottom: 14px;
            font-size: 15px;
        }

        .desc-content {
            white-space: pre-line;
            line-height: 1.7;
            font-size: 15px;
        }

        @media (max-width: 1100px) {
            .product-detail {
                grid-template-columns: 300px 1fr;
            }

            .right-specs {
                grid-column: 1 / -1;
            }
        }

        @media (max-width: 768px) {
            .product-detail {
                grid-template-columns: 1fr;
            }

            .price-box {
                width: 100%;
                min-width: auto;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="{{ route('home') }}" class="back-link">← Quay lại trang chủ</a>

        <div class="product-detail">
            <div class="left-gallery">
                <div class="main-image">
                    <img id="mainProductImage" src="{{ asset($book['image']) }}" alt="{{ $book['title'] }}">
                </div>

                <div class="thumb-list">
                    @foreach($book['thumbs'] as $thumb)
                        <div class="thumb-item" onclick="changeMainImage('{{ asset($thumb) }}')">
                            <img src="{{ asset($thumb) }}" alt="thumb">
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="middle-info">
                <h1>Sách - {{ $book['title'] }}</h1>

                <div class="price-box">
                    <div class="current-price">{{ number_format($book['price'], 0, ',', '.') }}đ</div>

                    @if(!empty($book['old_price']))
                        <div class="old-price">{{ number_format($book['old_price'], 0, ',', '.') }}đ</div>
                    @endif

                    @if(!empty($book['discount']))
                        <div class="discount-badge">-{{ $book['discount'] }}</div>
                    @endif
                </div>

                <div class="quantity-row">
                    <div class="quantity-label">Số lượng:</div>

                    <div class="qty-box">
                        <div class="qty-btn" onclick="decreaseQty()">-</div>
                        <input type="text" id="qtyInput" class="qty-input" value="1" readonly>
                        <div class="qty-btn" onclick="increaseQty()">+</div>
                    </div>
                </div>

                <div class="action-row">
                    <button class="btn-outline">🛒 Thêm vào giỏ hàng</button>
                    <button class="btn-outline">Mua ngay</button>
                </div>
            </div>

            <div class="right-specs">
                <table class="spec-table">
                    <tbody>
                        @foreach($book['specs'] as $label => $value)
                            <tr>
                                <td>{{ $label }}</td>
                                <td>{{ $value }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="description-section">
            <div class="desc-title">Mô tả sản phẩm</div>
            <div class="desc-content">{{ $book['description'] }}</div>
        </div>
    </div>

    <script>
        function changeMainImage(src) {
            document.getElementById('mainProductImage').src = src;
        }

        function increaseQty() {
            const qtyInput = document.getElementById('qtyInput');
            let current = parseInt(qtyInput.value) || 1;
            qtyInput.value = current + 1;
        }

        function decreaseQty() {
            const qtyInput = document.getElementById('qtyInput');
            let current = parseInt(qtyInput.value) || 1;
            if (current > 1) {
                qtyInput.value = current - 1;
            }
        }
    </script>
</body>
</html>