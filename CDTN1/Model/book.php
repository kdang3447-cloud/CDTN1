<?php

namespace App\Models;

class Book {

    private $filePath = __DIR__ . '/../../data/books.json';

    public function getAll()
{
    if (!file_exists($this->filePath)) {
        return [];
    }

    $json = file_get_contents($this->filePath);
    $data = json_decode($json, true);

    if (!is_array($data)) {
        return [];
    }

    $books = [];

    foreach ($data as $item) {
        $books[] = [
            'id' => $item['id'] ?? '',
            'title' => $item['title'] ?? 'Chưa có tên sách',
            'author' => $item['author'] ?? 'Chưa có tác giả',
            'category' => trim($item['category'] ?? 'khác'),
            'price' => (float) ($item['price'] ?? 0),
            'stock' => (int) ($item['stock'] ?? 0),
            'image' => $item['image'] ?? 'public/images/default-book.jpg'
        ];
    }

    return $books;
}

    public function countBooks()
    {
        return count($this->getAll());
    }

    public function getCategories()
    {
        $books = $this->getAll();
        $categories = [];

        foreach ($books as $book) {
            $categories[] = $book['category'];
        }

        return array_unique($categories);
    }

    public function countCategories()
    {
        return count($this->getCategories());
    }
}
