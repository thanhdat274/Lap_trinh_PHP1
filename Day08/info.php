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
        $productName = $_POST['product-name'];
        $quantity = $_POST['quantity'];
    ?>
    <div>Thông tin</div>
    <div>
        <p>Tên sản phẩm: <?php echo $productName?></p>
        <p>Số lượng: <?php echo $quantity?></p>
    </div>
</body>
</html>