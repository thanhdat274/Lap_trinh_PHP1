<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sánh tài khoản User</title>
    <link rel="stylesheet" href="../css/list-user.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>

<body>
    <?php 
    session_start();
    if(isset($_SESSION['username'],$_SESSION['password'])){
        $username = $_SESSION['username'];
        $password = $_SESSION['password'];
        if(time()-$_SESSION['login_time_stamp']>600){
            session_destroy();
            header('location: Dangnhap.php');
        }
    }
    ?>
    <div class="wrapper">
        <header>
            <div class="title-adm">
                <h3>Xin chào: <?php echo (isset($_SESSION['username'])) ? $_SESSION['username'] : '';?></h3>
            </div>
            <div class="product-log">
                <nav>
                    <ul id="main">
                        <li><a href="../Khach-hang/Trang-chu.php"><i class="fas fa-home"></i> Trang chủ</a></li>
                        <li><a href="Dangnhap.php"><i class="fas fa-power-off"></i> Đăng xuất</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <section class="content">
            <div class="left">
                <div class="box-tong">
                    <div class="tieude">DANH MỤC</div>
                    <p class="muc1"><a href="list-user.php">Quản lý User</a></p>
                    <p class="muc-con"><a href="add-user.php">+ Thêm mới User</a></p>
                    <p class="muc1"><a href="../QuanlySp/list-product.php">Quản lý Sản Phẩm</a></p>
                    <!-- <p class="muc-con"><a href="">+ Thêm mới sản phẩm</a></p> -->
                </div>
            </div>
            <div class="right">
                <?php
                $connection = new PDO("mysql:host=127.0.0.1;dbname=asm_php1;charset=utf8", "root", "");
                $query = "select * from user";
                $stmt = $connection->prepare($query);
                $stmt->execute();
                $users = $stmt->fetchAll();
                ?>
                <div class="td">Thông tin tài khoản</div>
                <table border="1">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Password</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $u) : ?>
                            <tr>
                                <td class="ten"><?php echo $u['username']; ?></td>
                                <td class="mk"><?php echo $u['password']; ?></td>
                                <td class="sua"><a href="update-user.php?id=<?php echo $u['id']; ?>">Sửa</a></td>
                                <td class="xoa"><a href="delete-user.php?id=<?php echo $u['id']; ?>">Xóa</a></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</body>

</html>