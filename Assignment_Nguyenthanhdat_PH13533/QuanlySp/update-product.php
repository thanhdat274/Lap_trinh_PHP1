<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật sản phẩm</title>
    <link rel="stylesheet" href="../css/add-update-product.css">
</head>

<body>
    <?php
    const status = [
        0 => "Hết hàng",
        1 => "Còn hàng"
    ];
    $id = $_GET['id'];
    $connection = new PDO("mysql:host=127.0.0.1;dbname=asm_php1;charset=utf8", "root", "");
    $query = "select * from product where id=$id";
    $stmt = $connection->prepare($query);
    $stmt->execute();
    $product = $stmt->fetch();


    $loi = array();
    $loi1 = array();
    $loi2 = array();
    $loi3 = array();
    if (isset($_POST['submit'])) {
        $productName = $_POST['productName'];
        $productQuantity = $_POST['productQuantity'];
        $productPrice = $_POST['productPrice'];
        $imageFolder = "image/" . basename($_FILES['productImage']['name']);
        $productImage = $_FILES['productImage']['name'];
        $productStatus = $_POST['productStatus'];
        $id = $_POST['product-id'];
        if ($productName == '') {
            $loi['productName'] = 'Bạn chưa nhập tên sản phẩm';
        }

        if ($productQuantity == '') {
            $loi1['productQuantity'] = 'Bạn chưa nhập số lượng sản phẩm';
        }

        if ($productPrice == '') {
            $loi2['productPrice'] = 'Bạn chưa nhập giá sản phẩm';
        }

        if ($productImage == '') {
            $loi3['productImage'] = 'Bạn chưa nhập ảnh sản phẩm';
        }
        if ($productName && $productQuantity && $productPrice && $productImage != '') {
            $connection = new PDO("mysql:host=127.0.0.1;dbname=asm_php1;charset=utf8", "root", "");
            $query = "update product set productName='$productName',productQuantity='$productQuantity',
            productPrice='$productPrice',productImage='$productImage',productStatus='$productStatus' where id=$id";
            $stmt = $connection->prepare($query);
            $stmt->execute();
            $product = $stmt->fetch();

            header("location: list-product.php");
        }
    }
    ?>
    <div class="wrapper">
        <div class="box">
            <h1 class="tieude">SỬA SẢN PHẨM</h1>
            <form action="" method="POST" enctype="multipart/form-data">
                <p>
                    <input type="text" name="product-id" id="" value="<?php echo $product['id'] ?>" hidden>
                </p>
                <p>
                    Tên sản phẩm<input type="text" name="productName" id="ten" value="<?php echo $product['productName']; ?>">
                <div class="loi"> <?php echo (isset($loi['productName'])) ? $loi['productName'] : ''; ?></div>
                </p>
                <p>
                    Số lượng<input type="text" name="productQuantity" id="sl" value="<?php echo $product['productQuantity']; ?>">
                <div class="loi"> <?php echo (isset($loi1['productQuantity'])) ? $loi1['productQuantity'] : ''; ?></div>
                </P>
                <p>
                    Giá sản phẩm<input type="text" name="productPrice" id="gia" value="<?php echo $product['productPrice']; ?>">
                <div class="loi"> <?php echo (isset($loi2['productPrice'])) ? $loi2['productPrice'] : ''; ?></div>
                </p>
                <p>
                    Ảnh sản phẩm<input type="file" name="productImage" id="file" value="<?php echo $product['productImage']; ?>">
                <div class="loi"> <?php echo (isset($loi3['productImage'])) ? $loi3['productImage'] : ''; ?></div>
                </p>
                <p>
                    Tình trạng hàng<select name="productStatus" id="loai" value="<?php echo $product['productStatus']; ?>">
                        <?php foreach (status as $key => $value) : ?>
                            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                        <?php endforeach ?>
                    </select>
                </p>
                <p>
                    <button type="submit" name="submit">Sửa sản phẩm</button>
                </p>
            </form>
        </div>
    </div>
</body>

</html>