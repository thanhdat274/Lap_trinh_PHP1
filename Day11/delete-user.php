<?php
    $id = $_GET['id'];
    $connection = new PDO("mysql:host=127.0.0.1;dbname=we16301;charset=utf8","root","");
    $query = "delete from user where id=$id";
    $stmt = $connection->prepare($query);
    $stmt->execute();

    header('location: list-user.php');
?>