<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ cửa hàng sách</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>

<header class="topbar">
    <div class="container nav">
        <div class="logo">📚 Nhà Sách Mini</div>
        <nav class="menu">
            <a href="#">Trang chủ</a>
            <a href="#danhmuc">Danh mục</a>
            <a href="#sanpham">Sách</a>
            <a href="#footer">Liên hệ</a>
        </nav>
    </div>
</header>

<section class="hero">
    <div class="container hero-wrap">
        <div class="hero-left">
            <h1>Chào mừng đến với cửa hàng sách</h1>
            <p>
                Giao diện trang chủ xây theo mô hình MVC bằng PHP,
                đọc dữ liệu trực tiếp từ file JSON.
            </p>
            <a href="#sanpham" class="btn-main">Xem sách ngay</a>
        </div>

        <div class="hero-right">
            <div class="hero-card">
                <h3><?php echo $totalBooks; ?></h3>
                <p>Đầu sách hiện có</p>
            </div>
            <div class="hero-card">
                <h3><?php echo $totalCategories; ?></h3>
                <p>Danh mục sách</p>
            </div>
        </div>
    </div>
</section>

<section class="section" id="danhmuc">
    <div class="container">
        <h2>Danh mục nổi bật</h2>

        <div class="category-list">
            <?php if (!empty($categories)): ?>
                <?php foreach ($categories as $category): ?>
                    <span class="category-item">
                        <?php echo htmlspecialchars($category); ?>
                    </span>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Chưa có danh mục nào.</p>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="section" id="sanpham">
    <div class="container">
        <h2>Sách đang có trong cửa hàng</h2>

        <div class="book-grid">
            <?php if (!empty($books)): ?>
                <?php foreach ($books as $book): ?>
                    <div class="book-card">
                        <div class="book-thumb">📘</div>

                        <div class="book-body">
                            <span class="book-category">
                                <?php echo htmlspecialchars($book['category']); ?>
                            </span>

                            <h3 class="book-title">
                                <?php echo htmlspecialchars($book['title']); ?>
                            </h3>

                            <p class="book-author">
                                Tác giả: <?php echo htmlspecialchars($book['author']); ?>
                            </p>

                            <p class="book-price">
Giá: <?php echo number_format($book['price'], 0, ',', '.'); ?> đ
                            </p>

                            <p class="book-stock">
                                Tồn kho: <?php echo $book['stock']; ?>
                            </p>

                            <div class="book-actions">
                                <button class="btn btn-primary">Mua ngay</button>
                                <button class="btn btn-outline">Chi tiết</button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Chưa có sách nào trong dữ liệu.</p>
            <?php endif; ?>
        </div>
    </div>
</section>

<footer class="footer" id="footer">
    <div class="container">
        <h3>Nhà Sách Mini</h3>
        <p>Email: nhasach@example.com</p>
        <p>Hotline: 0123 456 789</p>
        <p>Địa chỉ: Hà Nội, Việt Nam</p>
    </div>
</footer>

</body>
</html>
