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
            $query = "insert into news (new_title,new_image,new_intro,new_detail,new_status) 
            values ('$new_title','$new_image','$new_intro','$new_detail','$new_status')";
            $stmt = $conn->prepare($query);
            $stmt->execute();

            header("location: list-product.php");
        }
    }
    ?>
    <h1>Them moi</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <p>
            <textarea name="new_title" id="title" cols="30" rows="5"></textarea>
        <p><?php echo isset($loi['new_title']) ? $loi['new_title'] : ""; ?></p>
        </p>
        <p>
            <input type="file" name="new_image" id="anh">
        <p><?php echo isset($loi1['new_image']) ? $loi1['new_image'] : ""; ?></p>
        </p>
        <p>
            <input type="text" name="new_intro" id="intro">
        <p><?php echo isset($loi2['new_intro']) ? $loi2['new_intro'] : ""; ?></p>
        </p>
        <p>
            <input type="text" name="new_detail" id="intro">
        <p><?php echo isset($loi3['new_detail']) ? $loi3['new_detail'] : ""; ?></p>
        </p>
        <p>
            <textarea name="new_status" id="status" cols="30" rows="5"></textarea>
        <p><?php echo isset($loi4['new_status']) ? $loi4['new_status'] : ""; ?></p>
        </p>
        <p>
            <button type="submit" name="sub">Them moi</button>
        </p>
    </form>
</body>

</html>