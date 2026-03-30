<?php

namespace App\Http\controllers;

use App\models\Book;

class HomeController
{
    public function index()
    {
        $bookModel = new Book();
        $books = $bookModel->getAll();

        $booksByCategory = [];

        foreach ($books as $book) {
            $category = !empty($book['category']) ? $book['category'] : 'Khác';
            $booksByCategory[$category][] = $book;
        }

        $pageTitle = 'Trang chủ cửa hàng sách';

        require BASE_PATH . '/app/views/home/index.php';
    }
}
