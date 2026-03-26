<?php
require_once __DIR__ . '/../models/Book.php';

class HomeController
{
    public function index()
    {
        $bookModel = new Book();

        $books = $bookModel->getAll();
        $totalBooks = $bookModel->countBooks();
        $categories = $bookModel->getCategories();
        $totalCategories = $bookModel->countCategories();

        require __DIR__ . '/../views/home.php';
    }
}
