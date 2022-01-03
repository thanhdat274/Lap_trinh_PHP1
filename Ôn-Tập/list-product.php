<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
</head>

<body>
    <style>
        table {
            width: 70%;
            border-collapse: collapse;
            text-align: center;
            margin: 10px 0;
        }
        .them{
            width: 150px;
            height: 30px;
        }
    </style>
    <?php
    $connection = new PDO("mysql:host=127.0.0.1;dbname=cars;charset=utf8", "root", "");
    $query = "select * from products";
    $stmt = $connection->prepare($query);
    $stmt->execute();
    $products = $stmt->fetchAll();

    ?>
    <h1>Danh sách sản phẩm</h1>
    <a href="add-product.php"><button class="them">Thêm mới sản phẩm</button></a>
    <div>
        <table border="1px">
            <thead>
                <tr>
                    <th>product_name</th>
                    <th>product_price</th>
                    <th>product_quantity</th>
                    <th>product_image</th>
                    <th>description</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $item) : ?>
                    <tr>
                        <td><?php echo $item['product_name']; ?></td>
                        <td><?php echo number_format($item['product_price'], 0, ".", ","); ?></td>
                        <td><?php echo number_format($item['product_quantity'], 0, ".", ","); ?></td>
                        <td><img src="image/<?php echo $item['product_image']; ?>" alt=""></td>
                        <td><?php echo $item['description']; ?></td>
                        <td><a href="update-product.php?product_id=<?php echo $item['product_id']; ?>"><button>Sửa</button></a></td>
                        <td><a href="delete-product.php?product_id=<?php echo $item['product_id']; ?>"><button>Xóa</button></a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</body>

</html>