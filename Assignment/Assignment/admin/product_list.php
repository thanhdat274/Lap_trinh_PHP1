<?php
require_once "connect.php";
$sql = "SELECT * FROM products";
$stmt = $conn->prepare($sql);
$stmt->execute();
//lấy dữ liệu
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản phẩm</title>
    <link rel="stylesheet" href="../css/product_list.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>

<body>
    <div class="container">
        <header>

            <div class="title-adm">
                <h3>Xin chào Admin</h3>
            </div>
            <div class="product-log">
                <nav>

                    <ul id="main">
                        <li><a href="../KhachHang/index.php"><i class="fas fa-home"></i> Trang chủ</a></li>
                        <li><a href="login.php"><i class="fas fa-power-off"></i> Đăng xuất</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <main class="content">

            <div class="product-content">
                <div class="product-content-item">
                    <div class="title-admin">
                        <h3>Menu Admin</h3>
                    </div>
                    <div class="product-adm">
                        <a href="insers_product.php">Thêm sản phẩm</a><br>
                        <hr>
                        <a href="">Sản phẩm</a><br>
                        <hr>
                        <a href="">Đơn hàng</a><br>
                        <hr>
                        <a href="">Tin tức</a>
                        <hr>
                    </div>
                </div>

                <div class="product-content-sp">
                    <div class="title-table">
                        <span>Các sản phẩm</span>
                    </div>

                    <table border="1">
                        <tr>
                            <th class="namesp">id</th>
                            <th class="namesp">Tên sản phẩm</th>
                            <th class="namesp">Giá gốc</th>
                            <th class="namesp">% khuyến mại</th>
                            <th class="namesp">Giá</th>
                            <th class="namesp">ảnh sản phẩm</th>
                            <th class="namesp">ngày thêm sản phẩm</th>
                            <th class="namesp">ngày sửa sản phẩm</th>
                            <th class="namesp"></th>
                            <th class="namesp"></th>
                        </tr>
                        <?php foreach ($result as $row) : ?>
                            <tr>
                                <td class="id"><?php echo $row['id'] ?></td>
                                <td class="price_old"><?php echo $row['name_products'] ?></td>
                                <td class="price_old"><?= number_format($row['price_old'], 0, ",", ".") ?> $</td>
                                <td class="price_old"><?php echo $row['hot_sale'] ?> %</td>
                                <td><?= number_format($row['price'], 0, ",", ".") ?> $</td>

                                <td class="images"><img src="../images_data/<?php echo $row['images'] ?>" width="170" height="220"></td>
                                <td><?php echo $row['creatat'] ?></td>
                                <td><?php echo $row['updateted'] ?></td>
                                <td class="update"><a href="update_Product.php?id=<?php echo $row['id']; ?>">Sửa</a></td>
                                <td class="delete"><a href="delete_Product.php?id=<?php echo $row['id']; ?>">Xóa</a></td>

                            </tr>
                        <?php endforeach; ?>

                    </table>
                    <div class="nexttrang">
                        <?php
                        $product_all = $conn->query($sql);
                        $product_count = $product_all->rowCount();
                        $product_but = ceil($product_count / 4);
                        $i = 1;
                        echo '<p>Trang: </p>';
                        for ($i = 1; $i <= $product_but; $i++) {
                            echo '<a style="margin:0 5px;" href="product_list.php?pages=' . $i . '">' . $i . '</a>';
                        }

                        ?>

                    </div>
                </div>
            </div>
        </main>
        <!--  -->
        <footer>
            <p>Thiết kế by Đinh Đức Dương</p>
        </footer>
    </div>
</body>

</html>