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
    $conn = new PDO("mysql:host=127.0.0.1;dbname=masv_examphp03;charset=utf8", "root", "");
    $query = "select * from news";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $news = $stmt->fetchAll();
    ?>
    <h1>Danh sách</h1>
    <p><a href="add-product.php"><button>Them moi</button></a></p>
    <table border="1px">
        <thead>
            <tr>
                <th>new_title</th>
                <th>new_image</th>
                <th>new_intro</th>
                <th>new_detail</th>
                <th>new_status</th>
                <th colspan="2">ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($news as $u) : ?>
                <tr>
                    <td><?php echo $u['new_title']; ?></td>
                    <td><img src="image/<?php echo $u['new_image']; ?>" alt=""></td>
                    <td><?php echo $u['new_intro']; ?></td>
                    <td><?php echo $u['new_detail']; ?></td>
                    <td><?php echo $u['new_status']; ?></td>
                    <td><a href="update-product.php?new_id=<?php echo $u['new_id']; ?>"><button>Sửa</button></a></td>
                    <td><a href="delete-product.php?new_id=<?php echo $u['new_id']; ?>"><button>Xóa</button></a></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>

</html>