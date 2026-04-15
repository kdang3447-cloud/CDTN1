<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $topBooks = [
            [
                'slug' => 'nhung-vu-an-cua-sherlock-holmes',
                'title' => 'Những vụ án của Sherlock Holmes - Văn học kinh điển',
                'price' => 112100,
                'image' => 'images/books/book1.png',
            ],
            [
                'slug' => 'cong-bang-tren-doi-la-do-ban-no-luc-gianh-lay',
                'title' => 'Công bằng trên đời là do bạn nỗ lực giành lấy',
                'price' => 99000,
                'image' => 'images/books/book2.jpg',
            ],
            [
                'slug' => 'tuoi-tre-dang-gia-bao-nhieu',
                'title' => 'Tuổi trẻ đáng giá bao nhiêu',
                'price' => 90000,
                'image' => 'images/books/book3.jpg',
            ],
            [
                'slug' => 'thao-tung-tam-ly',
                'title' => 'Thao túng tâm lý',
                'price' => 121000,
                'image' => 'images/books/book4.jpg',
            ],
            [
                'slug' => 'tho-bay-mau-va-nhung-nguoi-nghi-no-la-ban',
                'title' => 'Thỏ Bảy Màu Và Những Ngày Nghỉ No La Bàn',
                'price' => 81000,
                'image' => 'images/books/book5.jpg',
            ],
            [
                'slug' => 'to-la-meo-pusheen',
                'title' => 'Tớ là mèo Pusheen',
                'price' => 80000,
                'image' => 'images/books/book8.jpg',
            ],
            [
                'slug' => 'moi-lan-vap-nga-la-mot-lan-truong-thanh',
                'title' => 'Mỗi lần vấp ngã là một lần trưởng thành',
                'price' => 120000,
                'image' => 'images/books/book7.png',
            ],
        ];

        $categories = [
            [
                'name' => 'SÁCH VĂN HỌC KINH ĐIỂN',
                'books' => [
                    [
                        'slug' => 'nhung-vu-an-cua-sherlock-holmes',
                        'title' => 'Những vụ án của Sherlock Holmes',
                        'price' => 112100,
                        'image' => 'images/books/book1.png',
                    ],
                ],
            ],
            [
                'name' => 'SÁCH HƯỚNG NGHIỆP & PHÁT TRIỂN BẢN THÂN',
                'books' => [
                    [
                        'slug' => 'cong-bang-tren-doi-la-do-ban-no-luc-gianh-lay',
                        'title' => 'Công bằng trên đời là do bạn nỗ lực giành lấy',
                        'price' => 99000,
                        'image' => 'images/books/book2.jpg',
                    ],
                    [
                        'slug' => 'tuoi-tre-dang-gia-bao-nhieu',
                        'title' => 'Tuổi trẻ đáng giá bao nhiêu',
                        'price' => 90000,
                        'image' => 'images/books/book3.jpg',
                    ],
                    [
                        'slug' => 'moi-lan-vap-nga-la-mot-lan-truong-thanh',
                        'title' => 'Mỗi lần vấp ngã là một lần trưởng thành',
                        'price' => 120000,
                        'image' => 'images/books/book7.png',
                    ],
                ],
            ],
            [
                'name' => 'SÁCH TÂM LÝ HỌC',
                'books' => [
                    [
                        'slug' => 'thao-tung-tam-ly',
                        'title' => 'Thao túng tâm lý',
                        'price' => 121000,
                        'image' => 'images/books/book4.jpg',
                    ],
                ],
            ],
            [
                'name' => 'TRUYỆN TRANH',
                'books' => [
                    [
                        'slug' => 'tho-bay-mau-va-nhung-nguoi-nghi-no-la-ban',
                        'title' => 'Thỏ Bảy Màu Và Những Ngày Nghĩ Nó Là Bạn',
                        'price' => 81000,
                        'image' => 'images/books/book5.jpg',
                    ],
                    [
                        'slug' => 'to-la-meo-pusheen',
                        'title' => 'Tớ là mèo Pusheen',
                        'price' => 80000,
                        'image' => 'images/books/book8.jpg',
                    ],
                ],
            ],
        ];

        return view('home.home', compact('topBooks', 'categories'));
    }
}