<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="./../css/user.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

</head>

<style>
    a {
    text-decoration: none;
    }

    .cart {
        position: relative;
    }

    .number {
        position: absolute;
        top: 1;
        left: 1;
        bottom: 1;
        right: 1;
        cursor: pointer;
    }
</style>

<body>
    <header>

        <div id="menu-bar" class="fas fa-bars"></div>
        
        <a href="http://localhost:81/ASM_PHP1_CLASS/User/home-user.php#home" class="logo">LOVEONEX</a>

        <nav class="navbar">
        <a href="http://localhost:81/ASM_PHP1_CLASS/User/home-user.php#home">Trang Chủ</a>
        <a href="http://localhost:81/ASM_PHP1_CLASS/User/home-user.php#products">Sản phẩm Mới Nhất</a>
        <a href="http://localhost:81/ASM_PHP1_CLASS/User/home-user.php#featured">Sản Phẩm Nổi Bật</a>
        <a href="http://localhost:81/ASM_PHP1_CLASS/User/home-user.php#info">tin tức</a>
    </nav>

        <div class="icons">
            <span>
                <a href="./cart-user.php" type="submit"><i class="fas fa-shopping-bag cart"></i></a>
                <span class="number"><?php echo isset($_SESSION['cart']) ? intval($_SESSION['cart']) : 0 ?></span>
            </span>

            <?php echo isset($_SESSION['user']) ? "<a href='./../layout/log-out.php' class='fas fa-user-times'></a>" : "<a href='./../layout/login.php' class='fas fa-user'></a>" ?>
            <a href="<?php echo isset($_SESSION['admin']) ? "http://localhost:81/ASM_PHP1_CLASS/admin/home/home-admin.php" : "./../layout/login-admin.php" ?>"><i class="fas fa-users-cog"></i></a>
        </div>
                            

    </header>