<?php
    $connection = new PDO("mysql:host=127.0.0.1;dbname=;charset=utf8","root","");
    $query = "select * from product";
    $stmt = $connection->prepare($query);
    $stmt-> execute();
    $products = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            border-collapse: collapse;
            border: 1px solid white;
            width: 100%;
        }
        th{
            background-color: black;
            color: white;
            padding: 5px;
            border: 1px solid white;
        }
        img{
            width: 15%;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Product Image</th>
                <th>Product Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($products as $item):?>
                <tr>
                    <td><?php echo $item['productName']?></td>
                    <td><img src="image/<?php echo $item['productImage']?>" alt=""></td>
                    <td><?php echo $item['productStatus']==1? "Còn hàng":"Hết hàng";?></td>
                </tr>
            <?php endforeach?>
        </tbody>
    </table>
</body>
</html>