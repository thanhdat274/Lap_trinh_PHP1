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

    $product_id = $_GET['product_id'];
    $connection = new PDO("mysql:host=127.0.0.1;dbname=cars;charset=utf8", "root", "");
    $query = "select * from products where product_id=$product_id";
    $stmt = $connection->prepare($query);
    $stmt->execute();
    $products = $stmt->fetch();

    if (isset($_POST['submit'])) {
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_quantity = $_POST['product_quantity'];
        $product_folder = "image/" . basename($_FILES['product_image']['name']);
        $product_image = $_FILES['product_image']['name'];
        $description = $_POST['description'];
        $product_id = $_POST['product_id'];


        //----
        if ($product_name == "") {
            $loi['product_name'] = "Bạn chưa nhập tên sản phẩm";
        }
        //---
        if ($product_price == "") {
            $loi1['product_price'] = "Bạn chưa nhập giá của sản phẩm";
        } elseif ($product_price < 0) {
            $loi1['product_price'] = "Bạn đang nhập giá của sản phẩm là số âm.Vui lòng nhập lại giá";
        }
        //---
        if ($product_quantity == "") {
            $loi2['product_quantity'] = "Bạn chưa nhập số lượng của sản phẩm";
        } elseif ($product_price < 0) {
            $loi2['product_quantity'] = "Bạn đang nhập số lượng của sản phẩm là số âm.Vui lòng nhập lại số lượng";
        }
        //---
        if ($product_image == "") {
            $loi3['product_image'] = "Bạn chưa nhập ảnh của sản phẩm";
        }
        //--
        if ($product_name && $product_price && $product_quantity && $product_image != "") {
            $connection = new PDO("mysql:host=127.0.0.1;dbname=cars;charset=utf8", "root", "");
            $query = "update products set product_name='$product_name', product_price='$product_price', product_quantity='$product_quantity',
            product_image='$product_image', description='$description' where product_id=$product_id";
            $stmt = $connection->prepare($query);
            $stmt->execute();
            $products = $stmt->fetch();

            header("location: list-product.php");
        }
    }
    ?>
    <h1>Sửa sản phẩm</h1>
    <div>
        <form action="" method="POST" enctype="multipart/form-data">
            <p>
                <input type="text" name="product_id" value="<?php echo $products['product_id']; ?>" hidden>
            </p>
            <p>
                Tên sản phẩm <input type="text" name="product_name" id="ten" value="<?php echo $products['product_name']; ?>">
            <div><?php echo (isset($loi['product_name'])) ? $loi['product_name'] : ""; ?></div>
            </p>
            <p>
                Giá sản phẩm<input type="text" name="product_price" id="gia" value="<?php echo $products['product_price']; ?>">
            <div><?php echo (isset($loi1['product_price'])) ? $loi1['product_price'] : ""; ?></div>
            </p>
            <p>
                Số lượng sản phẩm<input type="text" name="product_quantity" id="sl" value="<?php echo $products['product_quantity']; ?>">
            <div><?php echo (isset($loi2['product_quantity'])) ? $loi2['product_quantity'] : ""; ?></div>
            </p>
            <p>
                Ảnh sản phẩm<input type="image" src="image/<?php echo $products['product_image']; ?>" alt="">
                <input type="file" name="product_image" id="anh" value="<?php echo $products['product_image']; ?>">
            <div><?php echo (isset($loi3['product_image'])) ? $loi3['product_image'] : ""; ?></div>
            </p>
            <p>
                Tình trạng hàng <textarea name="description" id="" cols="150" rows="5"></textarea>
            </p>
            <p>
                <button type="submit" name="submit">Cập nhật</button>
            </p>
        </form>
    </div>
</body>

</html>