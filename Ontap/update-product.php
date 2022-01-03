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
    $new_id = $_GET['new_id'];
    $conn = new PDO("mysql:host=127.0.0.1;dbname=masv_examphp03;charset=utf8", "root", "");
    $query = "select * from news where new_id=$new_id";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $news = $stmt->fetch();

    $loi = array();
    $loi1 = array();
    $loi2 = array();
    $loi3 = array();
    $loi4 = array();

    if (isset($_POST['sub'])) {
        $new_title = $_POST['new_title'];
        $folder = "image/" . basename($_FILES['new_image']['name']);
        $new_image = $_FILES['new_image']['name'];
        $new_intro = $_POST['new_intro'];
        $new_detail = $_POST['new_detail'];
        $new_status = $_POST['new_status'];
        $new_id = $_POST['new_id'];

        if ($new_title == "") {
            $loi['new_title'] = "title đang để trống";
        } elseif (strlen($new_title) > 200) {
            $loi['new_title'] = "title ko đc nhập quá 200 kí tự";
        }

        if ($new_image == "") {
            $loi1['new_image'] = "title đang để trống";
        }

        if ($new_intro == "") {
            $loi2['new_intro'] = "title đang để trống";
        }

        if ($new_detail == "") {
            $loi3['new_detail'] = "title đang để trống";
        }

        if ($new_status == "") {
            $loi4['new_status'] = "title đang để trống";
        }
        if ($new_title && $new_title && $new_title && $new_title && $new_title != "") {
            $conn = new PDO("mysql:host=127.0.0.1;dbname=masv_examphp03;charset=utf8", "root", "");
            $query = "update news set new_title='$new_title',new_image='$new_image',new_intro='$new_intro',new_detail='$new_detail',new_status='$new_status' where new_id=$new_id";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $news = $stmt->fetch();

            header("location: list-product.php");
        }
    }
    ?>
    <h1>Cập nhật</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <p>
            <textarea name="new_title" id="title" cols="30" rows="5"><?php echo $news['new_title']; ?></textarea>
        <p><?php echo isset($loi['new_title']) ? $loi['new_title'] : ""; ?></p>
        </p>
        <p>
            <input type="image" name="new_image" id="anh" src="image/<?php echo $news['new_image']; ?>">
            <input type="file" name="new_image" id="anh">
        <p><?php echo isset($loi1['new_image']) ? $loi1['new_image'] : ""; ?></p>
        </p>
        <p>
            <input type="text" name="new_intro" id="intro" value="<?php echo $news['new_intro']; ?>">
        <p><?php echo isset($loi2['new_intro']) ? $loi2['new_intro'] : ""; ?></p>
        </p>
        <p>
            <input type="text" name="new_detail" id="intro" value="<?php echo $news['new_detail']; ?>">
        <p><?php echo isset($loi3['new_detail']) ? $loi3['new_detail'] : ""; ?></p>
        </p>
        <p>
            <textarea name="new_status" id="status" cols="30" rows="5"><?php echo $news['new_status']; ?></textarea>
        <p><?php echo isset($loi4['new_status']) ? $loi4['new_status'] : ""; ?></p>
        </p>
        <p>
            <button type="submit" name="sub">Cập nhật</button>
        </p>
    </form>
</body>

</html>