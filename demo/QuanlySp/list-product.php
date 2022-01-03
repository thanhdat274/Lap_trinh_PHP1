<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <link rel="stylesheet" href="../css/list-product.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION['username'], $_SESSION['password'])) {
        $username = $_SESSION['username'];
        $password = $_SESSION['password'];
        if(time()-$_SESSION['login_time_stamp']>60){
            session_destroy();
            header('location: ../QuanlyUser/Dangnhap.php');
        }
    }
    ?>
    <div class="wrapper">
        <header>
            <div class="title-adm">
                <h3>Xin chào: <?php echo (isset($_SESSION['username'])) ? $_SESSION['username'] : ''; ?></h3>
            </div>
            <div class="product-log">
                <nav>
                    <ul id="main">
                        <li><a href="../Khach-hang/Trang-chu.php"><i class="fas fa-home"></i> Trang chủ</a></li>
                        <li><a href="../QuanlyUser/Dangnhap.php"><i class="fas fa-power-off"></i> Đăng xuất</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <section class="content">
            <div class="left">
                <div class="box-tong">
                    <div class="tieude">DANH MỤC</div>
                    <p class="muc1"><a href="../QuanlyUser/list-user.php">Quản lý User</a></p>
                    <p class="muc1"><a href="../QuanlySp/list-product.php">Quản lý Sản Phẩm</a></p>
                    <p class="muc-con"><a href="../QuanlySp/add-product.php">+ Thêm mới sản phẩm</a></p>
                </div>
            </div>
            <div class="right">
                <?php
                $connection = new PDO("mysql:host=127.0.0.1;dbname=asm_php1;charset=utf8", "root", "");
                $query = "select * from product";
                $stmt = $connection->prepare($query);
                $stmt->execute();
                $products = $stmt->fetchAll();
                ?>
                <div class="td">Thông tin sản phẩm</div>
                <table border="1">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Product Quantity</th>
                            <th>Product Price</th>
                            <th>Product Image</th>
                            <th>Product Status</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $item) : ?>
                            <tr>
                                <td class="name"><?php echo $item['productName']; ?></td>
                                <td class="sl"><?php echo number_format($item['productQuantity'], 0, ".", ","); ?></td>
                                <td class="gia"><?php echo number_format($item['productPrice'], 0, ".", ","); ?>đ</td>
                                <td id="anh"><img src="image/<?php echo $item['productImage']; ?>" alt="" class="anh"></td>
                                <td class="tt"><?php echo $item['productStatus'] == 1 ? "Còn hàng" : "Hết hàng"; ?></td>
                                <td class="sua"><a href="update-product.php?id=<?php echo $item['id']; ?>">Sửa</a></td>
                                <td class="xoa"><a href="delete-product.php?id=<?php echo $item['id']; ?>">Xóa</a></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</body>

</html>