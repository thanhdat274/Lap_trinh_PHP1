<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <style>
        table{
            width: 50%;
            border-collapse: collapse;
            text-align: center;
        }
        th{
            height: 40px;
        }
    </style>
    <?php
    $conn = new PDO("mysql:host=127.0.0.1;dbname=datntph13533_examphp02;charset=utf8", "root", "");
    $query = "select *from cars";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $product = $stmt->fetchAll();
    ?>
    <h1>Danh sách sản phẩm</h1>
    <p><a href="add-product.php"><button>Thêm mới sản phảm</button></a></p>
    <table border="1px">
        <thead>
            <tr>
                <th>car_name</th>
                <th>car_image</th>
                <th>car_price</th>
                <th>car_quantity</th>
                <th>car_description</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($product as $item) : ?>
                <tr>
                    <td><?php echo $item['car_name']; ?></td>
                    <td><img src="image/<?php echo $item['car_image']; ?>" alt=""></td>
                    <td><?php echo $item['car_price']; ?></td>
                    <td><?php echo $item['car_quantity']; ?></td>
                    <td><?php echo $item['car_description']; ?></td>
                    <td><a href="update-product.php?car_id=<?php echo $item['car_id']?>"><button>Sửa</button></a></td>
                    <td><a href="delete-product.php?car_id=<?php echo $item['car_id']?>"><button>Xóa</button></a></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>

</html>