<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $loi = array();
    $loi1 = array();
    $loi2 = array();
    $loi3 = array();
    $loi4 = array();

    $car_id = $_GET['car_id'];
    $conn = new PDO("mysql:host=127.0.0.1;dbname=datntph13533_examphp02;charset=utf8", "root", "");
    $query = "select * from cars where car_id=$car_id";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $product = $stmt->fetch();

    if (isset($_POST['sub'])) {
        $car_name = $_POST['car_name'];
        $Folder = "image/" . basename($_FILES['car_image']['name']);
        $car_image = $_FILES['car_image']['name'];
        $car_price = $_POST['car_price'];
        $car_quantity = $_POST['car_quantity'];
        $car_description = $_POST['car_description'];
        $car_id = $_POST['car_id'];

        if ($car_name == "") {
            $loi['car_name'] = "Bạn chưa nhập tên sản phẩm!";
        }

        if ($car_image == "") {
            $loi1['car_image'] = "Bạn chưa nhập ảnh sản phẩm!";
        }

        if ($car_price == "") {
            $loi2['car_price'] = "Bạn chưa nhập giá sản phẩm!";
        } elseif ($car_price < 0) {
            $loi2['car_price'] = "Bạn đang nhập giá sản phẩm < 0.<pre> Vui lòng mời bạn nhập lại!";
        }

        if ($car_quantity == "") {
            $loi3['car_quantity'] = "Bạn chưa nhập số lượng sản phẩm!";
        } elseif ($car_quantity < 0) {
            $loi3['car_quantity'] = "Bạn đang nhập số lượng sản phẩm < 0.<pre> Vui lòng mời bạn nhập lại!";
        }

        if ($car_description == "") {
            $loi4['car_description'] = "Bạn chưa nhập ghí chú sản phẩm!";
        }

        if ($car_name && $car_image && $car_price && $car_quantity && $car_description != "") {
            $conn = new PDO("mysql:host=127.0.0.1;dbname=datntph13533_examphp02;charset=utf8", "root", "");
            $query = "update cars set car_name='$car_name', car_image='$car_image', car_price='$car_price',
            car_quantity='$car_quantity',car_description='$car_description' where car_id=$car_id ";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $product = $stmt->fetch();

            header("location: list-product.php");
        }
    }
    ?>
    <h1>Cập nhật sản phẩm</h1>
    <form method="POST" enctype="multipart/form-data">
        <p>
            <input type="text" name="car_id" value="<?php echo $product['car_id']; ?>" hidden>
        </p>
        <p>
            Tên sản phẩm <input type="text" name="car_name" id="name" value="<?php echo $product['car_name']; ?>">
        <div><?php echo (isset($loi['car_name'])) ? $loi['car_name'] : ""; ?></div>
        </p>
        <p>
            Ảnh sản phẩm
            <input type="image" name="car_image" id="anh" src="image/<?php echo $product['car_image'];?>">
             <input type="file" name="car_image" id="anh" value="<?php echo $product['car_image']; ?>">
        <div><?php echo (isset($loi1['car_image'])) ? $loi1['car_image'] : ""; ?></div>
        </p>
        <p>
            Giá sản phẩm <input type="text" name="car_price" id="gia" value="<?php echo $product['car_price']; ?>">
        <div><?php echo (isset($loi2['car_price'])) ? $loi2['car_price'] : ""; ?></div>
        </p>
        <p>
            Số lượng sản phẩm <input type="text" name="car_quantity" id="sl" value="<?php echo $product['car_quantity']; ?>">
        <div><?php echo (isset($loi3['car_quantity'])) ? $loi3['car_quantity'] : ""; ?></div>
        </p>
        <p>
            Ghi chú <textarea name="car_description" id="" cols="30" rows="5"><?php echo $product['car_description']; ?></textarea>
        <div><?php echo (isset($loi4['car_description'])) ? $loi4['car_description'] : ""; ?></div>
        </p>
        <p>
            <button type="submit" name="sub">Cập nhật sản phẩm</button>
        </p>
    </form>
</body>

</html>