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