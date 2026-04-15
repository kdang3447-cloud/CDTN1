<?php

namespace App\Http\Controllers;

class BookController extends Controller
{
    public function show($slug)
    {
        $books = $this->getBooks();

        $book = collect($books)->firstWhere('slug', $slug);

        if (!$book) {
            abort(404);
        }

        return view('home.show', compact('book'));
    }

    private function getBooks()
    {
        return [
            [
                'slug' => 'nhung-vu-an-cua-sherlock-holmes',
                'title' => 'Những vụ kỳ án của Sherlock Holmes - Văn học kinh điển',
                'price' => 112000,
                'old_price' => null,
                'discount' => null,
                'image' => 'images/books/book1.png',
                'thumbs' => [
                    'images/books/book1.png',
                ],
                'description' => "Sherlock Holmes là tiểu thuyết của Sir Arthur Conan Doyle lần đầu xuất hiện vào năm 1887 trong cuốn tiểu thuyết trinh thám “A Study in Scarlet”. Từ đó, nhà văn Anh đã viết 4 tiểu thuyết và 55 truyện ngắn về Holmes. Qua hàng thế kỷ, vị thám tử đã trở thành một biểu tượng văn hóa và là nguồn cảm hứng của rất nhiều cây bút khác.\n\nCuốn “Những vụ kỳ án của Sherlock Holmes” mang tới hàng loạt câu chuyện phá án ly kỳ, hóc búa, biến hóa vô cùng, và cuốn lắm cốt truyện hấp dẫn.",
                'specs' => [
                    'Tác giả' => 'S. Conan Doy',
                    'Nhà phát hành' => 'Đinh Tị',
                    'NXB' => 'Văn Học',
                    'Năm xuất bản' => '2022',
                    'Kích thước' => '14.5 x 20.5 cm',
                    'Số trang' => '526',
                    'Hình thức' => 'Bìa Mềm',
                ],
            ],
            [
                'slug' => 'cong-bang-tren-doi-la-do-ban-no-luc-gianh-lay',
                'title' => 'Công bằng trên đời là do bạn nỗ lực giành lấy',
                'price' => 99000,
                'old_price' => 109000,
                'discount' => null,
                'image' => 'images/books/book2.jpg',
                'thumbs' => [
                    'images/books/book2.jpg',
                ],
                'description' => "'GIỚI THIỆU TÁC PHẨM':\n\n“CÔNG BẰNG TRÊN ĐỜI LÀ DO BẠN NỖ LỰC GIÀNH LẤY”\n\nĐôi khi chúng ta đều tự hỏi, tại sao cứ phải liều mạng, thảnh thơi sống qua ngày cũng là sống mà nhỉ? Song, chỉ cần nghĩ thế giới này to lớn vô cùng, phong cảnh muôn màu muôn sắc, bạn sẽ không cam lòng.\n\nVậy rốt cuộc ý nghĩa của nỗ lực là gì?\n\nNỗ lực là mỗi ngày đều trôi qua một cách rực rỡ và đặc biệt, chứ không phải lặp lại một ngày mấy chục nghìn lần.\n\nNỗ lực không phải là thứ hôm nay bạn chiến đấu, đột kích một cái là có thể đạt thành tựu. Nỗ lực là một quá trình dài đằng đẵng, đôi khi sẽ khiến bạn thất vọng, nhưng kết quả cuối cùng chắc chắn làm bạn thỏa mãn.\n\nBạn khát vọng cuộc sống đối xử tử tế với bạn, nhưng kỳ thực, cuộc sống chẳng quan tâm đến bạn đâu, bạn phải cố gắng gấp bội mới có thể đạt được cuộc sống như mong muốn. Nỗ lực đủ lâu, cuộc sống ắt sẽ công bằng..",
                'specs' => [
                    'Tác giả' => 'Mao Mao Trùng Tiểu Thư',
                    'Người Dịch' => 'Hàn Vũ Phi',
                    'NXB' => 'Dân Trí',
                    'Năm xuất bản' => '2024',
                    'Trọng lượng (gr)' => '300',
                    'Kích Thước Bao Bì' => '20 x 13 x 1 cm',
                    'Số trang' => '280',
                    'Hình thức' => 'Bìa Mềm',
                ],
            ],
            [
                'slug' => 'tuoi-tre-dang-gia-bao-nhieu',
                'title' => 'Tuổi trẻ đáng giá bao nhiêu',
                'price' => 99000,
                'old_price' => null,
                'discount' => null,
                'image' => 'images/books/book3.jpg',
                'thumbs' => [
                    'images/books/book3.jpg',
                ],
                'description' => "'GIỚI THIỆU TÁC PHẨM':\n\nTuổi Trẻ Đáng Giá Bao Nhiêu\n\n'Bạn hối tiếc vì không nắm bắt lấy một cơ hội nào đó, chẳng có ai phải mất ngủ.
Bạn trải qua những ngày tháng nhạt nhẽo với công việc bạn căm ghét, người ta chẳng hề bận lòng.
Bạn có chết mòn nơi xó tường với những ước mơ dang dở, đó không phải là việc của họ.
Suy cho cùng, quyết định là ở bạn. Muốn có điều gì hay không là tùy bạn.
Nên hãy làm những điều bạn thích. Hãy đi theo tiếng nói trái tim. Hãy sống theo cách bạn cho là mình nên sống.
Vì sau tất cả, chẳng ai quan tâm'.",
                'specs' => [
                    'Tác giả' => 'Rosie Nguyễn',
                    'Ngày xuất bản' => '10-2016',
                    'NXB' => 'Nhà Xuất Bản Hội Nhà Văn',
                    'Năm xuất bản' => '2016',
                    'Kích Thước Bao Bì' => '14 x 20.5 cm',
                    'Số trang' => '285',
                    'Hình thức' => 'Bìa Mềm',
                ],
            ],
            [
                'slug' => 'thao-tung-tam-ly',
                'title' => 'Thao túng tâm lý',
                'price' => 121000,
                'old_price' => null,
                'discount' => null,
                'image' => 'images/books/book4.jpg',
                'thumbs' => [
                    'images/books/book4.jpg',
                ],
                'description' => "Trong cuốn ‘Thao túng tâm lý’, tác giả Shannon Thomas giới thiệu đến độc giả những hiểu biết liên quan đến thao túng tâm lý và lạm dụng tiềm ẩn.
\n“Thao túng tâm lý” là một dạng của lạm dụng tâm lý. Cũng giống như lạm dụng tâm lý, thao túng tâm lý có thể xuất hiện ở bất kỳ môi trường nào, từ bất cứ đối tượng độc hại nào. Đó có thể là bố mẹ ruột, anh chị em ruột, người yêu, vợ hoặc chồng, sếp hay đồng nghiệp… của bạn. Với tính chất bí hiểm, âm thầm gây hại, thao túng, lạm dụng tâm lý làm tổn thương cảm xúc, lòng tự trọng, cuộc sống của mỗi nạn nhân. Những người từng bị lạm dụng tâm lý thường không thể miêu tả rõ ràng điều gì đã xảy ra với mình. Trong nhiều trường hợp, nạn nhân bị thao túng đến mức tự hỏi có phải họ là người có lỗi, thậm chí họ có phải là người độc hại trong mối quan hệ đó.
\nHành vi của (những) kẻ lạm dụng giống như một trò chơi bí ẩn, tệ hại và lặp đi lặp lại,  do một cá nhân hoặc một nhóm người thực hiện với nạn nhân. Những hành vi này được ngụy trang tài tình đến mức hành vi độc ác của họ diễn ra thường xuyên, nhưng không bị phát hiện.
\nShannon Thomas giới thiệu những kiến thức cơ bản về đặc điểm, các dạng của lạm dụng tâm lý nói chung, thao túng tâm lý nói riêng, và cung cấp cho người đọc hành trình chữa lành gồm 6 giai đoạn:
\nGiai đoạn 1: Tuyệt vọng
\nGiai đoạn 2: Nhận diện
\nGiai đoạn 3: Thức tỉnh
\nGiai đoạn 4: Những ranh giới
\nGiai đoạn 5: Phục hồi
\nGiai đoạn 6: Duy trì
\nBằng những kiến thức chuyên sâu và sự thấu hiểu, tác giả sẽ giúp bạn từng bước vượt qua những rắc rối của thao túng tâm lý, lạm dụng tiểm ẩn để có cuộc sống ý nghĩa và lành mạnh hơn.
\n-Thông tin tác giả:
\nShannon Thomas, là một nhà giám sát công tác xã hội y tế được cấp phép hành nghề, và là chủ phòng tư vấn/chuyên gia tư vấn tâm lý chính của phòng tư vấn Southlake Christian (SCC) ở Southlake, bang Texas.
\nSCC từng nhận giải thưởng “Phòng thực hành tư vấn tâm lý tốt nhất” năm 2016 của Living Magazine khu vực Hạt Northeast Tarrant tại Dallas-Fort Worth.
\nThomas là Trợ giảng chuyên ngành và là thành viên Ủy ban tư vấn của Khoa Công tác xã hội – Trường Đại học Texas Christian.
\nCách tiếp cận khi tư vấn tâm lý của cô ấy xuất phát từ góc nhìn của một nhà tư vấn tâm lý được cấp phép hành nghề đồng thời từ góc nhìn của một người đi trước, một người sống sót sau khi bị lạm dụng tâm lý..",
                'specs' => [
                    'Tác giả' => 'Shannon Thomas, LCSW',
                    'Người Dịch' => 'Trương Tuấn',
                    'NXB' => 'Dân Trí',
                    'Năm xuất bản' => '2022',
                    'Kích Thước Bao Bì' => '20 x 13 x 1 cm',
                    'Số trang' => '328',
                    'Hình thức' => 'Bìa Mềm',
                ],
            ],
            [
                'slug' => 'tho-bay-mau-va-nhung-nguoi-nghi-no-la-ban',
                'title' => 'Thỏ Bảy Màu Và Những Người Nghĩ Nó Là Bạn - Kira',
                'price' => 81000,
                'old_price' => 99000,
                'discount' => '18%',
                'image' => 'images/books/book5.jpg',
                'thumbs' => [
                    'images/books/book5.jpg',
                ],
                'description' => "GIỚI THIỆU TÁC PHẨM:
 \nThỏ Bảy Màu là một nhân vật hư cấu chẳng còn xa lạ gì với anh em dùng mạng xã hội với slogan ‘Nghe lời Thỏ, kiếp này coi như bỏ!’.
\nThỏ Bảy Màu đơn giản chỉ là một con thỏ trắng với sự dở hơi, ngang ngược nhưng dễ thương vô cùng tận. Nó luôn nghĩ rằng mình không có cuộc sống và không có bạn bè. Tuy nhiên, Thỏ lại chẳng bao giờ thấy cô đơn vì đến cô đơn cũng bỏ nó mà đi.
\nCuốn sách là những mẩu chuyện nhỏ được ghi lại bằng tranh xoay quanh Thỏ Bảy Màu và những người nghĩ nó là bạn. Những mẩu chuyện được truyền tải rất ‘teen’ đậm chất hài hước, châm biếm qua sự sáng tạo không kém phần ‘mặn mà’ của tác giả càng trở nên thú vị và thu hút.
\nNếu một ngày bạn lỡ cảm thấy buồn thì hãy đọc cuốn sách này để biết thế nào là cười sảng nha!.",
                'specs' => [
                    'Tác giả' => 'Huỳnh Thái Ngọc',
                    'NXB' => 'Dân Trí',
                    'Năm xuất bản' => '2023',
                    'Năm tái bản' => '2024',
                    'Kích Thước Bao Bì' => '13 x 19 cm',
                    'Số trang' => '160',
                    'Hình thức' => 'Bìa Mềm',
                ],
            ],
            [
                'slug' => 'to-la-meo-pusheen',
                'title' => 'Tớ là mèo Pusheen - NXB Kim Đồng',
                'price' => 80000,
                'old_price' => null,
                'discount' => null,
                'image' => 'images/books/book8.jpg',
                'thumbs' => [
                    'images/books/book8.jpg',
                ],
                'description' => "Một cuốn sách đáng yêu về chú mèo Pusheen nổi tiếng trên mạng xã hội.\n\nNội dung nhẹ nhàng, minh họa dễ thương, phù hợp với bạn đọc yêu thích truyện tranh, sách minh họa và phong cách đáng yêu.",
                'specs' => [
                    'Tác giả' => 'Claire Belton',
                    'Nhà Phát Hành' => 'Kim Đồng',
                    'NXB' => 'Kim Đồng',
                    'Năm xuất bản' => '2024',
                    'Kích Thước' => '12.5 x 20.5 cm',
                    'Số trang' => '188',
                    'Hình thức' => 'Bìa Mềm',
                ],
            ],
            [
                'slug' => 'moi-lan-vap-nga-la-mot-lan-truong-thanh',
                'title' => 'Mỗi Lần Vấp Ngã Là Một Lần Trưởng Thành - Cuộc đời là quá trình không ngừng trưởng thành',
                'price' => 120000,
                'old_price' => null,
                'discount' => null,
                'image' => 'images/books/book7.png',
                'thumbs' => [
                    'images/books/book7.png',
                ],
                'description' => "Cuộc đời là quá trình không ngừng trưởng thành.
\nTrong quá trình này, bạn sẽ khó tránh khỏi vấp ngã, sẽ trải qua nhiều lần đau thương, và sẽ có những lúc bạn cảm thấy vô cùng mỏi mệt, nhưng hãy tin rằng, chỉ có những người đã từng đau thương thì mới trở nên vững vàng hơn.
\nMỗi chúng ta từ nhỏ đến lớn, dù ít dù nhiều đều đã từng trải qua những lúc cảm thấy đau khổ, đây chính là trở ngại mà chúng ta thường nói tới. Tôi tin rằng sẽ không một người nào dám khẳng định cuộc đời của họ chẳng bao giờ gặp trở ngại. Đó chính là cuộc sống.
\nNhưng mong bạn suy nghĩ kĩ, mỗi khi bạn gặp phải khó khăn hoặc vấp ngã, ngoài việc cảm thấy đau khổ về mặt tinh thần, bạn còn học được điều gì? Tôi dám khẳng định rằng bạn đã có được kinh nghiệm, và khi đã lĩnh hội, bạn sẽ không vấp ngã lại nơi bạn đã từng ngã. Đây chính là sự trưởng thành.
\nĐặc biệt, khi bạn rời xa vòng tay che chở, bao bọc của cha mẹ và nhà trường, bước chân vào xã hội, bạn sẽ gặp phải rất nhiều trở ngại và nhận ra xã hội này vốn không hề đơn giản như bạn tưởng tượng! Bạn cũng sẽ nhận ra khi bạn đau buồn hay gặp phải khó khăn, sẽ không có ai để ý đến sự tủi thân của bạn và cũng chẳng quan tâm đến sự bất lực của bạn. Thậm chí bạn cũng không muốn kể cho cha mẹ nghe vì sợ họ phải lo lắng cho mình, bạn chỉ có thể tự mình giải quyết, tự mình gánh chịu.
\nMột nữ sinh vừa tốt nghiệp đại học kể với tôi với vẻ rất tủi thân, người chưa hề biết cạnh tranh với ai như cô đã phải chịu sự đối xử bất công nơi làm việc, cấp trên không trọng dụng cô, còn luôn giao cho cô những công việc nặng nề và ngoài chuyên môn của cô, thậm chí đồng nghiệp cũng bài xích cô. Tôi nói với cô gái: “Đây là chuyện rất bình thường, bạn phải dừng ngay việc than vãn trách móc và học cách chấp nhận. Bạn cũng đừng chờ đợi một lúc nào đó hoàn cảnh thay đổi, cũng đừng hi vọng người khác sẽ thay đổi, mà hãy thay đổi suy nghĩ của chính bạn. Bạn nghĩ xem, tại sao bạn không được trọng dụng, và liệu bạn đã thể hiện hết năng lực của bản thân trong môi trường ‘khốc liệt’ này chưa?.",
                'specs' => [
                    'Tác giả' => 'Liêu Trí Phong',
                    'Nhà Phát Hành' => 'MinhLongbook',
                    'NXB' => 'Thanh Niên',
                    'Năm xuất bản' => '2021',
                    'Kích Thước' => '14.5 x 20.5 cm',
                    'Số trang' => '376',
                    'Hình thức' => 'Bìa Mềm',
                ],
            ],
        ];
    }
}