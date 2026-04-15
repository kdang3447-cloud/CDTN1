<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $classic = Category::where('slug', 'sach-van-hoc-kinh-dien')->first();
        $selfHelp = Category::where('slug', 'sach-huong-nghiep-phat-trien-ban-than')->first();
        $psychology = Category::where('slug', 'sach-tam-ly-hoc')->first();
        $comic = Category::where('slug', 'truyen-tranh')->first();

        $books = [
            [
                'category_id' => $classic->id,
                'title' => 'Những vụ án của Sherlock Holmes',
                'slug' => 'nhung-vu-an-cua-sherlock-holmes',
                'author' => 'Arthur Conan Doyle',
                'price' => 112100,
                'image' => 'book1.jpg',
                'description' => 'Tác phẩm kinh điển về thám tử Sherlock Holmes.',
                'is_best_seller' => true,
            ],
            [
                'category_id' => $selfHelp->id,
                'title' => 'Công bằng trên đời là do bạn nỗ lực giành lấy',
                'slug' => 'cong-bang-tren-doi-la-do-ban-no-luc-gianh-lay',
                'author' => 'Nhiều tác giả',
                'price' => 99000,
                'image' => 'book2.jpg',
                'description' => 'Cuốn sách truyền cảm hứng về sự nỗ lực và trưởng thành.',
                'is_best_seller' => true,
            ],
            [
                'category_id' => $selfHelp->id,
                'title' => 'Tuổi trẻ đáng giá bao nhiêu',
                'slug' => 'tuoi-tre-dang-gia-bao-nhieu',
                'author' => 'Rosie Nguyễn',
                'price' => 90000,
                'image' => 'book3.jpg',
                'description' => 'Cuốn sách nổi tiếng dành cho người trẻ.',
                'is_best_seller' => true,
            ],
            [
                'category_id' => $psychology->id,
                'title' => 'Thao túng tâm lý',
                'slug' => 'thao-tung-tam-ly',
                'author' => 'Nhiều tác giả',
                'price' => 126130,
                'image' => 'book4.jpg',
                'description' => 'Sách về phân tích hành vi và tâm lý con người.',
                'is_best_seller' => true,
            ],
            [
                'category_id' => $comic->id,
                'title' => 'Thỏ Bảy Màu Và Những Ngày Nghỉ No La Bàn',
                'slug' => 'tho-bay-mau-va-nhung-ngay-nghi-no-la-ban',
                'author' => 'Huỳnh Thái Ngọc',
                'price' => 81180,
                'image' => 'book5.jpg',
                'description' => 'Truyện tranh vui nhộn, dễ thương.',
                'is_best_seller' => true,
            ],
            [
                'category_id' => $classic->id,
                'title' => 'Cây cam ngọt của tôi',
                'slug' => 'cay-cam-ngot-cua-toi',
                'author' => 'José Mauro de Vasconcelos',
                'price' => 108000,
                'image' => 'book6.jpg',
                'description' => 'Tác phẩm văn học nổi tiếng đầy cảm xúc.',
                'is_best_seller' => true,
            ],
            [
                'category_id' => $selfHelp->id,
                'title' => 'Mỗi lần vấp ngã là một lần trưởng thành',
                'slug' => 'moi-lan-vap-nga-la-mot-lan-truong-thanh',
                'author' => 'Liêu Trí Phong',
                'price' => 120000,
                'image' => 'book7.jpg',
                'description' => 'Sách kỹ năng sống và phát triển bản thân.',
            ],
            [
                'category_id' => $comic->id,
                'title' => 'Tớ là mèo Pusheen',
                'slug' => 'to-la-meo-pusheen',
                'author' => 'Claire Belton',
                'price' => 80000,
                'image' => 'book8.jpg',
                'description' => 'Truyện tranh đáng yêu về mèo Pusheen.',
            ],
            [
                'category_id' => $selfHelp->id,
                'title' => 'Đắc nhân tâm',
                'slug' => 'dac-nhan-tam',
                'author' => 'Dale Carnegie',
                'price' => 125000,
                'image' => 'book12.jpg',
                'description' => 'Nghệ thuật ứng xử và giao tiếp.',
                'is_featured' => true,
            ],
            [
                'category_id' => $selfHelp->id,
                'title' => 'Tư duy ngược',
                'slug' => 'tu-duy-nguoc',
                'author' => 'Nguyễn Anh Dũng',
                'price' => 132000,
                'image' => 'book13.jpg',
                'description' => 'Phát triển góc nhìn khác biệt và sáng tạo.',
                'is_featured' => true,
            ],
            [
                'category_id' => $selfHelp->id,
                'title' => 'Nghĩ giàu làm giàu',
                'slug' => 'nghi-giau-lam-giau',
                'author' => 'Napoleon Hill',
                'price' => 118000,
                'image' => 'book10.jpg',
                'description' => 'Cuốn sách nổi tiếng về tư duy thành công.',
                'is_featured' => true,
            ],
            [
                'category_id' => $selfHelp->id,
                'title' => 'Bí mật tư duy triệu phú',
                'slug' => 'bi-mat-tu-duy-trieu-phu',
                'author' => 'T. Harv Eker',
                'price' => 135000,
                'image' => 'book9.jpg',
                'description' => 'Tư duy tài chính và thành công cá nhân.',
                'is_featured' => true,
            ],
            [
                'category_id' => $selfHelp->id,
                'title' => 'Bạch Nhật Tân',
                'slug' => 'bach-nhat-tan',
                'author' => 'Nhiều tác giả',
                'price' => 95000,
                'image' => 'book11.jpg',
                'description' => 'Sách nổi bật trong banner.',
                'is_featured' => true,
            ],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}