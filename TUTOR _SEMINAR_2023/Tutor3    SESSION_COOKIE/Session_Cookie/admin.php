<?php
    session_start();
    if(!isset($_SESSION['successLogin'])){
        $_SESSION['loginPlease'] = "Vui lòng đăng nhập";
        header("location: login.php");
    }

    if(isset($_GET['logout'])){
        unset($_SESSION['successLogin']);
        header("location: login.php");
    }

    if(isset($_COOKIE['fullname'])){
        echo $_COOKIE['fullname'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Đây là trang Admin</h1>    
    <a href="admin.php?logout=true">Đăng xuất</a>

</body>
</html>