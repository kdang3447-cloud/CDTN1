<?php
require_once "model.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $action = $_POST['action'] ?? '';
    $books = getBooks();

    // 📌 Lấy danh sách
    if ($action === 'get') {
        echo json_encode($books);
        exit;
    }

    // 📌 Thêm sách
    if ($action === 'create') {
        $book = [
            "id" => time(),
            "title" => $_POST['title'] ?? '',
            "author" => $_POST['author'] ?? '',
            "category" => $_POST['category'] ?? '',
            "price" => $_POST['price'] ?? 0,
            "stock" => $_POST['stock'] ?? 0
        ];

        $books[] = $book;
        saveBooks($books);

        echo json_encode(["ok" => true]);
        exit;
    }

    // 📌 Cập nhật
    if ($action === 'update') {
        foreach ($books as &$b) {
            if ($b['id'] == $_POST['id']) {
                $b['title'] = $_POST['title'];
                $b['author'] = $_POST['author'];
                $b['category'] = $_POST['category'];
                $b['price'] = $_POST['price'];
                $b['stock'] = $_POST['stock'];
            }
        }

        saveBooks($books);
        echo json_encode(["ok" => true]);
        exit;
    }

    // 📌 Xóa
    if ($action === 'delete') {
        $books = array_filter($books, function($b) {
            return $b['id'] != $_POST['id'];
        });

        saveBooks(array_values($books));
        echo json_encode(["ok" => true]);
        exit;
    }
}