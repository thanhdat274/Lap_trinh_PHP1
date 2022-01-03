<?php
include_once('./start-user.php');
include_once('./select-cart.php');
$result = selectSp();
?>

<div style="margin-top: 100px;"></div>
    <div class="container mt-5">
        <h1 style="text-align: center; color: #ff9f1a; margin-bottom: 50px;">Giỏ Hàng Của Bạn</h1>
        <br>
        <table class="table table-hover">
            <?php
            if(empty($result)){
                echo '<h2 style="text-align: center; margin-bottom: 50px;">Không có Sản Phẩm</h2>';
            } else {
                echo "
                <thead>
                    <tr>
                        <td>STT</td>
                        <td>Tên Sản Phẩm</td>
                        <td>Ảnh Sản Phẩm</td>
                        <td>Số Lượng</td>
                        <td>Giá</td>
                        <td>Thao Tác</td>
                    </tr>
                </thead>
                ";
                for($k = 0; $k < count($result); $k++){
            ?>
            <tbody>
                <tr>
                    <td><br><?php echo $k+1 ?></td>
                    <td><br><?php echo $result[$k]['ten'] ?></td>
                    <td><img src="<?php echo $result[$k]['anh'] ?>" witdh="60px" height="70px" alt=""></td>
                    <td><br>1</td>
                    <td><br><?php echo $result[$k]['gia'] ?> VNĐ</td>
                    <td><br><a href="./delete-cart.php?id=<?php echo $result[$k]['id'] ?>" class="btn btn-danger">Xóa</a></td>
                </tr>
            </tbody>
            <?php
                }
            }
            ?>
               

        </table>
    </div>


<div style="margin: 30px;"></div>

<?php
include_once('./end-user.php');
?>