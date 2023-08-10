<?php
require 'connect.php';
$sql = 'SELECT * FROM products';
// hứng dữ liệu từ db về
// fetchAll() : lấy toàn bộ dữ liệu
$result = $conn->query($sql)->fetchAll();
// print_r($result);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Danh sách sản phẩm</title>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <h1>Danh sách sản phẩm</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Mô tả sản phẩm</th>
        </tr>
        <?php
        foreach ($result as $value) {
        ?>
            <tr>
                <td><?php echo $value['id']; ?></td>
                <td><?php echo $value['name']; ?></td>
                <td><?php echo $value['price']; ?></td>
                <td><?php echo $value['description']; ?></td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>