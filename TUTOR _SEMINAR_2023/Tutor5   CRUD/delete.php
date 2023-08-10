<?php
    require 'connection.php';
    // Lấy movie_id của bản ghi cần xóa
    $movie_id = $_GET['movie_id'];

    // SQL delete
    $sql = "DELETE FROM movies WHERE movie_id = $movie_id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    // set thông báo xóa dữ liệu thành công
    setcookie('messages', 'Xóa dữ liệu thành công', time() + 1);
    header('location: index.php');
?>