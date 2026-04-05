<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Điện tử'],
            ['name' => 'Thời trang'],
            ['name' => 'Sách'],
            ['name' => 'Đồ gia dụng'],
            ['name' => 'Thể thao'],
            ['name' => 'Mỹ phẩm'],
            ['name' => 'Thực phẩm'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
