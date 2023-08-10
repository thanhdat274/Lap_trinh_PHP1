<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';

    try {
        $conn = new PDO("mysql:host=$servername;dbname=tutor5_php1;", $username, $password);
        // set thuộc tính thong báo lỗi
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo 'Kết nối thành công';
    } catch (PDOException $e) {
        echo 'Lỗi kết nối dữ liệu' . $e->getMessage();
    }
?>