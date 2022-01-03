<?php
    // echo '<pre>';
    // var_dump($_POST);
    $username = $_POST["username"];
    $password = $_POST["password"];
    $id = $_POST['user-id'];

    $connection = new PDO("mysql:host=127.0.0.1;dbname=we16301;charset=utf8","root","");
    $query = "update user set username='$username',password='$password' where id=$id";
    $stmt = $connection->prepare($query);
    $stmt->execute();

    header('location: list-user.php');
?>