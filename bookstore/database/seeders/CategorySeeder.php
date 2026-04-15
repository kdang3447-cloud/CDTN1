<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Sách văn học kinh điển', 'slug' => 'sach-van-hoc-kinh-dien'],
            ['name' => 'Sách hướng nghiệp & phát triển bản thân', 'slug' => 'sach-huong-nghiep-phat-trien-ban-than'],
            ['name' => 'Sách tâm lý học', 'slug' => 'sach-tam-ly-hoc'],
            ['name' => 'Truyện tranh', 'slug' => 'truyen-tranh'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}