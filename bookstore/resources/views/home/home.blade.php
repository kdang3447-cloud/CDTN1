<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Store</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #ececec;
            color: #222;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .container {
            width: 96%;
            max-width: 1280px;
            margin: 0 auto;
        }

        .header-wrap {
            margin: 8px;
            border: 4px solid #29b6f6;
            background: linear-gradient(90deg, #6c5ce7, #6c63ff);
            padding: 10px 14px;
        }

        .header-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            flex-wrap: wrap;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #fff;
            font-size: 28px;
            font-weight: bold;
        }

        .search-box {
            flex: 1;
            max-width: 520px;
            display: flex;
            background: #fff;
            border-radius: 999px;
            overflow: hidden;
        }

        .search-box input {
            width: 100%;
            border: none;
            outline: none;
            padding: 12px 18px;
            font-size: 14px;
        }

        .search-box button {
            border: none;
            background: #ff5c5c;
            color: #fff;
            padding: 0 22px;
            cursor: pointer;
            font-weight: 600;
        }

        .login-btn {
            background: rgba(255,255,255,0.2);
            color: #fff;
            padding: 10px 18px;
            border-radius: 999px;
            border: 1px solid rgba(255,255,255,0.4);
            font-size: 14px;
        }
        .hero-banner {
    margin-top: 18px;
    margin-bottom: 22px;
    background: #fff;
    padding: 12px;
    border-radius: 4px;
    overflow: hidden;
}

.hero-banner img {
    width: 100%;
    height: auto;
    display: block;
    border-radius: 2px;
}
.book-card {
    width: 145px;
    background: #fff;
    padding: 10px;
    border-radius: 10px;
    border: 1px solid transparent;
    transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
    overflow: hidden;
}

.book-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 10px 24px rgba(0, 0, 0, 0.15);
    border-color: #6c63ff;
}

.book-thumb {
    width: 100%;
    height: 200px;
    background: #fff;
    overflow: hidden;
    margin-bottom: 10px;
    border-radius: 6px;
}

.book-thumb img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
}

.book-card:hover .book-thumb img {
    transform: scale(1.08);
}

.book-name {
    color: #3048b8;
    font-size: 13px;
    line-height: 1.45;
    min-height: 52px;
    margin-bottom: 8px;
    transition: color 0.3s ease;
}

.book-price {
    font-size: 15px;
    font-weight: 700;
    color: #222;
    transition: color 0.3s ease;
}

.book-card:hover .book-name {
    color: #6c63ff;
}

.book-card:hover .book-price {
    color: #ff4d4f;
}

.book-overlay {
    position: absolute;
    inset: 0;
    background: rgba(0, 0, 0, 0.28);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.book-card:hover .book-overlay {
    opacity: 1;
}

.book-overlay span {
    background: #fff;
    color: #333;
    padding: 8px 14px;
    border-radius: 20px;
    font-size: 13px;
    font-weight: 600;
}
        .nav-row {
            margin-top: 12px;
            display: flex;
            justify-content: space-between;
            gap: 16px;
            flex-wrap: wrap;
        }

        .nav-left,
        .nav-right {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .nav-item {
            background: #f5f5f5;
            border: 1px solid #d4d4d4;
            border-radius: 999px;
            padding: 9px 16px;
            font-size: 14px;
        }

        .hero {
            margin-top: 12px;
            background: #333;
            min-height: 420px;
            position: relative;
            overflow: hidden;
        }

        .hero-overlay {
            min-height: 420px;
            background: rgba(0,0,0,0.35);
            padding: 28px 22px;
            display: flex;
            justify-content: space-between;
            align-items: end;
            gap: 20px;
            flex-wrap: wrap;
        }

        .hero-left {
            max-width: 470px;
            color: #fff;
        }

        .hero-badge {
            display: inline-block;
            background: #fff;
            color: #6b4b1f;
            padding: 10px 18px;
            border-radius: 12px;
            font-weight: 700;
            margin-bottom: 14px;
        }

        .hero-title {
            font-size: 58px;
            line-height: 1.05;
            font-weight: 800;
            text-transform: uppercase;
            margin-bottom: 20px;
        }

        .hero-btn {
            display: inline-block;
            background: #fff;
            color: #5e3b12;
            padding: 12px 20px;
            border-radius: 10px;
            font-weight: bold;
        }

        .section {
            background: #f3f3f3;
            margin-top: 16px;
            padding: 20px 18px 28px;
        }

        .section-title {
            font-size: 22px;
            font-weight: 800;
            text-transform: uppercase;
            margin-bottom: 18px;
        }

        .book-grid {
            display: flex;
            gap: 24px;
            flex-wrap: wrap;
        }

        .book-card {
            width: 145px;
        }

        .book-thumb {
            width: 100%;
            height: 200px;
            background: #fff;
            overflow: hidden;
            margin-bottom: 10px;
        }

        .book-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .book-name {
            color: #3048b8;
            font-size: 13px;
            line-height: 1.45;
            min-height: 52px;
            margin-bottom: 8px;
        }

        .book-price {
            font-size: 15px;
            font-weight: 700;
        }

        footer {
            margin-top: 24px;
            background: #222;
            color: #ddd;
            text-align: center;
            padding: 16px 0;
            font-size: 14px;
        }

        @media (max-width: 768px) {
            .header-top,
            .nav-row {
                flex-direction: column;
                align-items: stretch;
            }

            .search-box {
                max-width: 100%;
            }

            .nav-left,
            .nav-right {
                justify-content: center;
            }

            .book-grid {
                justify-content: center;
            }

            .book-card {
                width: 45%;
            }

            .hero-title {
                font-size: 34px;
            }
        }

        @media (max-width: 480px) {
            .book-card {
                width: 100%;
            }

            .hero-title {
                font-size: 28px;
            }
        }
    </style>
</head>
<body>

<header class="header-wrap">
    <div class="container">
        <div class="header-top">
            <a href="{{ route('home') }}" class="logo">
                <span>📘</span>
                <span>Book</span>
            </a>

            <form action="#" method="GET" class="search-box">
                <input type="text" placeholder="Tất cả danh mục">
                <button type="submit">Tìm kiếm</button>
            </form>

            <a href="#" class="login-btn">Đăng nhập</a>
        </div>

        <div class="nav-row">
            <div class="nav-left">
                <a href="#" class="nav-item">Danh mục</a>
                <a href="#" class="nav-item">Giới thiệu</a>
                <a href="#" class="nav-item">Tin tức</a>
                <a href="#" class="nav-item">Review sách</a>
                <a href="#" class="nav-item">Tra cứu đơn</a>
            </div>

            <div class="nav-right">
                <a href="#" class="nav-item">🛒 Giỏ hàng</a>
                <a href="#" class="nav-item">💳 Thanh toán</a>
                <a href="#" class="nav-item">☎ Liên hệ</a>
            </div>
        </div>
    </div>
</header>

<main class="container">
<section class="hero-banner">
    <a href="#">
        <img src="{{ asset('images/banner/banner1.png') }}" alt="Banner sách">
    </a>
</section>
    <section class="section">
        <h2 class="section-title">TOP SÁCH BÁN CHẠY</h2>
<div class="book-grid">
    @foreach($topBooks as $book)
        <div class="book-card">
            <a href="{{ route('product.show', $book['slug']) }}">
                <div class="book-thumb">
                    <img src="{{ asset($book['image']) }}" alt="{{ $book['title'] }}">
                </div>
                <div class="book-name">{{ $book['title'] }}</div>
                <div class="book-price">{{ number_format($book['price'], 0, ',', '.') }} đ</div>
            </a>
        </div>
    @endforeach
</div>
    </section>

@foreach($categories as $category)
    <section class="section">
        <h2 class="section-title">{{ $category['name'] }}</h2>

        <div class="book-grid">
            @foreach($category['books'] as $book)
                <div class="book-card">
                    <a href="{{ route('product.show', $book['slug']) }}">
                        <div class="book-thumb">
                            <img src="{{ asset($book['image']) }}" alt="{{ $book['title'] }}">
                            <div class="book-overlay">
                                <span>Xem chi tiết</span>
                            </div>
                        </div>
                        <div class="book-name">{{ $book['title'] }}</div>
                        <div class="book-price">{{ number_format($book['price'], 0, ',', '.') }} đ</div>
                    </a>
                </div>
            @endforeach
        </div>
    </section>
@endforeach
</main>

<footer>
    © {{ date('Y') }} Book Store
</footer>

</body>
</html>