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
        table {
            width: 70%;
            text-align: center;
            border-collapse: collapse;
        }

        th {
            height: 30px;
            background-color: blue;
            color: #fff;
        }

        .them {
            width: 200px;
            height: 30px;
            background: black;
            color: #fff;
        }

        .sua {
            width: 70px;
            height: 30px;
            background: blue;
            color: #fff;
            border: 0;
        }

        .xoa {
            width: 70px;
            height: 30px;
            background: red;
            color: #fff;
            border: 0;
        }
    </style>
    <?php
    $conn = new PDO("mysql:host=127.0.0.1;dbname=datntph13533_examphp03;charset=utf8", "root", "");
    $query = "select * from news";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $news = $stmt->fetchAll();
    ?>
    <h1>Danh sách tin tức</h1>
    <p><a href="add-new.php"><button class="them">Thêm mới bảng tin</button></a></p>
    <table border="1px">
        <thead>
            <tr>
                <th>news_title</th>
                <th>news_image</th>
                <th>news_intro</th>
                <th>news_detail</th>
                <th>news_status</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($news as $u) : ?>
                <tr>
                    <td><?php echo $u['news_title']; ?></td>
                    <td><img src="image/<?php echo $u['news_image']; ?>" alt=""></td>
                    <td><?php echo $u['news_intro']; ?></td>
                    <td><?php echo $u['news_detail']; ?></td>
                    <td><?php echo $u['news_status'] == 1 ? "Còn hàng" : "Hết hàng"; ?></td>
                    <td><a href="update-new.php?news_id=<?php echo $u['news_id']; ?>"><button class="sua">Sửa</button></a></td>
                    <td><a href="delete-new.php?news_id=<?php echo $u['news_id']; ?>"><button class="xoa">Xóa</button></a></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>

</html>