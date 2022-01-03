<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/add-product.css" />
</head>
<body>
    <?php
    require_once ('connect.php');
        if(isset($_GET['maHD'])){
            $maHD = $_GET['maHD'];
            $sql = "SELECT * FROM hoadon WHERE maHD = '".$maHD."' ";
            $result = $db->query($sql);
            $rs = $result->fetch();

            if(isset($_POST['edit'])){
                $maHD = $_GET['maHD'];
                $tinhTrang = $_POST['tinhTrang'];
                $sql = "UPDATE hoadon SET tinhTrang = '".$tinhTrang."' WHERE maHD = '".$maHD."' ";
                $result = $db->exec($sql);

                header('location: view-order.php');
            }
        }
    ?>

<h1>Thông tin hóa đơn</h1>
<div class="container">
  <form action="" method = "post" enctype="multipart/form-data">
    <label>Mã hóa đơn</label>
    <input type="text" name = "maHD" value = "<?php echo $rs['maHD'] ?>" disabled>
    
    <label>Tổng tiền</label>
    <input type="text" name = "tongTien" value = "<?php echo number_format($rs['tongTien']) ?> đ" disabled>
    
    <label>Ngày mua</label>
    <input type="text" name = "ngayMua" value = "<?php echo $rs['ngayMua'] ?>" disabled>    

    <label>Tình trạng</label>
    <select name="tinhTrang" size="1">
                <?php echo $rs['tinhTrang'] ?>
                <?php if($rs['tinhTrang'] == 0){ ?>
                <option value = 0 >Chưa thanh toán</option>
                <option value= 1 >Đã thanh toán</option>
            <?php } else if($rs['tinhTrang']== 1){ ?>
                <option value=1>Đã thanh toán</option>
                <option value=0>Chưa thanh toán</option>
            <?php } ?>
            </select>
    <input type="submit" name = "edit" value = "Edit">
  </form>
</body>
</html>