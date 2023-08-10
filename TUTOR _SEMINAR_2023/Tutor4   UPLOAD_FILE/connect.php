<?php
    $host = 'localhost'; // tên máy
    $username = 'hocphp1'; // tên tk
    $password = '';
    $dbname = 'hocphp1';

    // xử lý luồng ngoại lệ
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname",$username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connect Successfully";
    } catch (PDOException $e){
        die('Connection Failed:'.$e->getMessage());
    }
?>