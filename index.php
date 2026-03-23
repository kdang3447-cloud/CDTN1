<?php
$file = "books.json";

function getBooks() {
    global $file;
    if (!file_exists($file)) return [];
    return json_decode(file_get_contents($file), true);
}

function saveBooks($data) {
    global $file;
    file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $books = getBooks();

    if ($action === 'get') {
        echo json_encode($books);
        exit;
    }

    if ($action === 'create') {
        $book = $_POST;
        $book['id'] = time();
        $books[] = $book;
        saveBooks($books);
        echo json_encode(["ok"=>true]);
        exit;
    }

    if ($action === 'update') {
        foreach ($books as &$b) {
            if ($b['id'] == $_POST['id']) {
                $b = array_merge($b, $_POST);
            }
        }
        saveBooks($books);
        echo json_encode(["ok"=>true]);
        exit;
    }

    if ($action === 'delete') {
        $books = array_filter($books, fn($b)=>$b['id']!=$_POST['id']);
        saveBooks(array_values($books));
        echo json_encode(["ok"=>true]);
        exit;
    }
}
?>
<!doctype html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Book Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
    body {
        background: #0f172a;
        color: #e2e8f0
    }

    .card {
        background: #1e293b;
        padding: 16px;
        border-radius: 10px
    }

    table {
        width: 100%;
        border-collapse: collapse;
        table-layout: fixed;
    }

    th,
    td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #334155;
    }

    td {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    /* căn giữa một số cột */
    th:nth-child(4),
    td:nth-child(4),
    th:nth-child(5),
    td:nth-child(5),
    th:nth-child(6),
    td:nth-child(6),
    th:nth-child(7),
    td:nth-child(7) {
        text-align: center;
    }
    </style>
</head>

<body class="p-6">

    <h1 class="text-3xl mb-6">📚 Quản Lý Sản Phẩm </h1>

    <!-- FORM -->
    <div class="card mb-6">
        <input id="id" type="hidden">
        <div class="grid grid-cols-5 gap-3">
            <input id="title" placeholder="Tên sách" class="p-2 text-black">
            <input id="author" placeholder="Tác giả" class="p-2 text-black">
            <input id="category" placeholder="Danh mục" class="p-2 text-black">
            <input id="price" type="number" placeholder="Giá" class="p-2 text-black">
            <input id="stock" type="number" placeholder="Số lượng" class="p-2 text-black">
        </div>

        <div class="mt-4 flex gap-2">
            <button onclick="save()" class="bg-blue-500 px-4 py-2">💾 Lưu</button>
            <button onclick="resetForm()" class="bg-gray-500 px-4 py-2">Reset</button>
        </div>
    </div>

    <!-- DASHBOARD -->
    <div class="grid grid-cols-4 gap-4 mb-6">
        <div class="card">Tổng sách: <span id="total"></span></div>
        <div class="card">Tổng giá trị: <span id="value"></span></div>
        <div class="card">Còn hàng: <span id="in"></span></div>
        <div class="card">Hết hàng: <span id="out"></span></div>
    </div>

    <!-- TABLE -->
    <table class="w-full border">
        <thead class="bg-gray-700">
            <tr>
                <th>Tên</th>
                <th>Tác giả</th>
                <th>Danh mục</th>
                <th>Giá</th>
                <th>SL</th>
                <th>Trạng thái</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="table"></tbody>
    </table>

    <script>
    let books = [];

    async function api(data) {
        return fetch("", {
            method: "POST",
            body: new URLSearchParams(data)
        }).then(r => r.json());
    }

    async function load() {
        books = await api({
            action: "get"
        });
        render();
    }

    function render() {
        const tb = document.getElementById("table");
        tb.innerHTML = "";

        let total = books.length;
        let value = 0,
            instock = 0,
            out = 0;

        books.forEach(b => {
            value += b.price * b.stock;
            if (b.stock > 0) instock++;
            else out++;

            tb.innerHTML += `
    <tr class="border">
      <td>${b.title}</td>
      <td>${b.author}</td>
      <td>${b.category}</td>
      <td>${Number(b.price).toLocaleString()} đ</td>
      <td>${b.stock}</td>
      <td>${b.stock>0?'Còn':'Hết'}</td>
      <td>
        <button onclick='edit(${JSON.stringify(b)})' class="bg-yellow-500 px-2">Sửa</button>
        <button onclick='del(${b.id})' class="bg-red-500 px-2">X</button>
      </td>
    </tr>`;
        });

        document.getElementById("total").innerText = total;
        document.getElementById("value").innerText = value.toLocaleString() + " đ";
        document.getElementById("in").innerText = instock;
        document.getElementById("out").innerText = out;
    }

    async function save() {
        const id = document.getElementById("id").value;

        const data = {
            action: id ? "update" : "create",
            id,
            title: document.getElementById("title").value,
            author: document.getElementById("author").value,
            category: document.getElementById("category").value,
            price: document.getElementById("price").value,
            stock: document.getElementById("stock").value
        };

        await api(data);
        resetForm();
        load();
    }

    function edit(b) {
        document.getElementById("id").value = b.id;
        document.getElementById("title").value = b.title;
        document.getElementById("author").value = b.author;
        document.getElementById("category").value = b.category;
        document.getElementById("price").value = b.price;
        document.getElementById("stock").value = b.stock;
    }

    async function del(id) {
        if (confirm("Xoá?")) {
            await api({
                action: "delete",
                id
            });
            load();
        }
    }

    function resetForm() {
        document.querySelectorAll("input").forEach(i => i.value = "");
    }

    load();
    </script>

</body>

</html>