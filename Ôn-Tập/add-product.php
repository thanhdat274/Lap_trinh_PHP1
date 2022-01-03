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

    if (isset($_POST['submit'])) {
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_quantity = $_POST['product_quantity'];
        $product_folder = "image/" . basename($_FILES['product_image']['name']);
        $product_image = $_FILES['product_image']['name'];
        $description = $_POST['description'];

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
        if ($product_name && $product_price && $product_quantity && $product_image != "") {
            $connection = new PDO("mysql:host=127.0.0.1;dbname=cars;charset=utf8", "root", "");
            $query = "insert into products (product_name,product_price,product_quantity,product_image,description)
            values('$product_name','$product_price','$product_quantity','$product_image','$description')";
            $stmt = $connection->prepare($query);
            $stmt->execute();

            header("location: list-product.php");
        }
    }
    ?>
    <h1>Thêm mới sản phẩm</h1>
    <div>
        <form action="" method="POST" enctype="multipart/form-data">
            <p>
                Tên sản phẩm <input type="text" name="product_name" id="ten">
            <div><?php echo (isset($loi['product_name'])) ? $loi['product_name'] : ""; ?></div>
            </p>
            <p>
                Giá sản phẩm<input type="text" name="product_price" id="gia">
            <div><?php echo (isset($loi1['product_price'])) ? $loi1['product_price'] : ""; ?></div>
            </p>
            <p>
                Số lượng sản phẩm<input type="text" name="product_quantity" id="sl">
            <div><?php echo (isset($loi2['product_quantity'])) ? $loi2['product_quantity'] : ""; ?></div>
            </p>
            <p>
                Ảnh sản phẩm<input type="file" name="product_image" id="anh">
            <div><?php echo (isset($loi3['product_image'])) ? $loi3['product_image'] : ""; ?></div>
            </p>
            <p>
                Tình trạng hàng <textarea name="description" id="" cols="150" rows="5"></textarea>
            </p>
            <p>
                <button type="submit" name="submit">Thêm mới</button>
            </p>
        </form>
    </div>
</body>

</html>