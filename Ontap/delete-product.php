<?php 
    $new_id = $_GET['new_id'];
    $conn = new PDO("mysql:host=127.0.0.1;dbname=masv_examphp03;charset=utf8", "root", "");
    $query = "delete from news where new_id=$new_id";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    header("location: list-product.php");
?>