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

    if (isset($_POST['sub'])) {
        $car_name = $_POST['car_name'];
        $Folder = "image/" . basename($_FILES['car_image']['name']);
        $car_image = $_FILES['car_image']['name'];
        $car_price = $_POST['car_price'];
        $car_quantity = $_POST['car_quantity'];
        $car_description = $_POST['car_description'];

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
            $query = "insert into cars (car_name,car_image,car_price,car_quantity,car_description) 
            values('$car_name','$car_image','$car_price','$car_quantity','$car_description')";
            $stmt = $conn->prepare($query);
            $stmt->execute();

            header("location: list-product.php");
        }
    }
    ?>
    <h1>Thêm mới sản phẩm</h1>
    <form method="POST" enctype="multipart/form-data">
        <p>
            Tên sản phẩm <input type="text" name="car_name" id="name">
        <div><?php echo (isset($loi['car_name'])) ? $loi['car_name'] : ""; ?></div>
        </p>
        <p>
            Ảnh sản phẩm <input type="file" name="car_image" id="anh">
        <div><?php echo (isset($loi1['car_image'])) ? $loi1['car_image'] : ""; ?></div>
        </p>
        <p>
            Giá sản phẩm <input type="text" name="car_price" id="gia">
        <div><?php echo (isset($loi2['car_price'])) ? $loi2['car_price'] : ""; ?></div>
        </p>
        <p>
            Số lượng sản phẩm <input type="text" name="car_quantity" id="sl">
        <div><?php echo (isset($loi3['car_quantity'])) ? $loi3['car_quantity'] : ""; ?></div>
        </p>
        <p>
            Ghi chú <textarea name="car_description" id="" cols="30" rows="5"></textarea>
        <div><?php echo (isset($loi4['car_description'])) ? $loi4['car_description'] : ""; ?></div>
        </p>
        <p>
            <button type="submit" name="sub">Thêm mới sản phẩm</button>
        </p>
    </form>
</body>

</html>