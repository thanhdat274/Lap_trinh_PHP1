<?php
    const status=[
        0 => "Hết hàng",
        1 => "Còn hàng"
    ];

    if(isset($_POST['btn-add'])){

        // echo '<pre>';
        // var_dump($_FILES);
        $productName = $_POST['product-name'];
        $productQuantity = $_POST['product-quantity'];
        $productPrice = $_POST['product-price'];
        $imageFolder = "image/".basename($_FILES['product-image']['name']);
        // đường dẫn đến thư mục chứa ảnh
        $productImage = $_FILES['product-image']['name'];
        $productStatus = $_POST['product-status'];

        $connection = new PDO("mysql:host=127.0.0.1;dbname=;charset=utf8","root","");
        $query = "insert into product (productName,productQuantity,productPrice,productImage,productStatus)
         values('$productName','$productQuantity','$productPrice','$productImage','$productStatus')";
        $stmt = $connection->prepare($query);
        $stmt-> execute();

        header('location: list-product.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm mới sản phẩm</title>
    <style>
        input{
            display: block;
        }
    </style>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="text" name="product-name" id="" placeholder="Enter product name">
        <input type="text" name="product-quantity" id="" placeholder="Enter product quantity">
        <input type="text" name="product-price" id="" placeholder="Enter product price">
        <input type="file" name="product-image" id="">
        <select name="product-status" id="">
            <?php foreach(status as $key => $value):?>
                <option value="<?php echo $key?>"><?php echo $value?></option>
            <?php endforeach?>
        </select>
        <input type="submit" name="btn-add" id="" value="Thêm mới">
    </form>
</body>
</html>