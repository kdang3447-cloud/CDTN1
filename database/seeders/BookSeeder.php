<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            [
                'title' => 'Lập Trình PHP Cơ Bản',
                'author' => 'Nguyễn Văn A',
                'category' => 'Lập Trình',
                'price' => 150000,
                'stock' => 25,
            ],
            [
                'title' => 'Laravel: Hướng Dẫn Toàn Diện',
                'author' => 'Trần Thị B',
                'category' => 'Lập Trình',
                'price' => 250000,
                'stock' => 15,
            ],
            [
                'title' => 'JavaScript Tiên Tiến',
                'author' => 'Phạm Văn C',
                'category' => 'Lập Trình',
                'price' => 180000,
                'stock' => 20,
            ],
            [
                'title' => 'Design Pattern Cho Java',
                'author' => 'Lê Thị D',
                'category' => 'Lập Trình',
                'price' => 220000,
                'stock' => 12,
            ],
            [
                'title' => 'Python Cho Người Mới Bắt Đầu',
                'author' => 'Vũ Văn E',
                'category' => 'Lập Trình',
                'price' => 120000,
                'stock' => 30,
            ],
            [
                'title' => 'SQL & Database Thiết Kế',
                'author' => 'Dương Thị F',
                'category' => 'Cơ Sở Dữ Liệu',
                'price' => 200000,
                'stock' => 18,
            ],
            [
                'title' => 'React.js Thực Tế',
                'author' => 'Hoàng Văn G',
                'category' => 'Web Development',
                'price' => 280000,
                'stock' => 10,
            ],
            [
                'title' => 'Cloud Computing Với AWS',
                'author' => 'Tô Thị H',
                'category' => 'Cloud',
                'price' => 320000,
                'stock' => 8,
            ],
            [
                'title' => 'DevOps & Docker',
                'author' => 'Đặng Văn I',
                'category' => 'DevOps',
                'price' => 300000,
                'stock' => 5,
            ],
            [
                'title' => 'Machine Learning Cơ Bản',
                'author' => 'Bùi Thị J',
                'category' => 'AI/ML',
                'price' => 350000,
                'stock' => 3,
            ],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
