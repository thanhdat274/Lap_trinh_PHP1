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
        h1 {
            margin: 0 0 0 20px;
        }

        form {
            margin: 0 0 0 20px;
        }

        button {
            width: 200px;
            height: 30px;
            background: black;
            color: #fff;
        }

        .loi {
            color: red;
        }
    </style>
    <?php
    const status = [
        0 => "Hết hàng",
        1 => "Còn hàng"
    ];

    $loi = array();
    // $loi1 = array();
    $loi2 = array();
    $loi3 = array();

    $news_id = $_GET['news_id'];
    $conn = new PDO("mysql:host=127.0.0.1;dbname=datntph13533_examphp03;charset=utf8", "root", "");
    $query = "select * from news where news_id=$news_id";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $news = $stmt->fetch();

    if (isset($_POST['sub'])) {
        $news_title = $_POST['news_title'];
        $folder = "image/" . basename($_FILES['news_image']['name']);
        $news_image = $_FILES['news_image']['name'];
        $news_intro = $_POST['news_intro'];
        $news_detail = $_POST['news_detail'];
        $news_status = $_POST['news_status'];
        $news_id = $_POST['news_id'];

        if ($news_title == "") {
            $loi['news_title'] = "Bạn chưa nhập news_title!";
        } elseif (strlen($news_title) > 200) {
            $loi['news_title'] = "Bạn ddang nhập news_title vượt quá 200 kí tự";
        }

        if ($news_image == "") {
            $loi1['news_image'] = "Bạn chưa nhập news_image!";
        }
        
        if ($news_intro == "") {
            $loi2['news_intro'] = "Bạn chưa nhập news_intro!";
        }
        if ($news_detail == "") {
            $loi3['news_detail'] = "Bạn chưa nhập news_detail!";
        }
        if ($news_title && $news_image && $news_intro && $news_detail != "") {
            $conn = new PDO("mysql:host=127.0.0.1;dbname=datntph13533_examphp03;charset=utf8", "root", "");
            $query = "update news set news_title='$news_title',news_image='$news_image',news_intro='$news_intro',news_detail='$news_detail',news_status='$news_status' where news_id=$news_id ";

            $stmt = $conn->prepare($query);
            $stmt->execute();
            $news = $stmt->fetch();

            header("location: list-new.php");
        }
    }
    ?>
    <h1>Cập nhật tin tức</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <p>
            <input type="text" name="news_id" id="" value="<?php echo $news['news_id']; ?>" hidden>
        </p>
        <p>
            news_title<input type="text" name="news_title" id="" value="<?php echo $news['news_title']; ?>">
        <p class="loi"><?php echo isset($loi['news_title']) ? $loi['news_title'] : ""; ?></p>
        </p>
        <p>
            news_image
            <input type="image" name="news_image" id="anh" src="image/<?php echo $news['news_image']; ?>">
            <input type="file" name="news_image" id="" value="<?php echo $news['news_image']; ?>">
        <!-- <p class="loi"><?php echo isset($loi1['news_image']) ? $loi1['news_image'] : ""; ?></p> -->
        </p>
        <p>
            news_intro <input type="text" name="news_intro" id="" value="<?php echo $news['news_intro']; ?>">
        <p class="loi"><?php echo isset($loi2['news_intro']) ? $loi2['news_intro'] : ""; ?></p>
        </p>
        <p>
            news_detail <input type="text" name="news_detail" id="" value="<?php echo $news['news_detail']; ?>">
        <p class="loi"><?php echo isset($loi3['news_detail']) ? $loi3['news_detail'] : ""; ?></p>
        <p>
            news_status <select name="news_status" id="loai" value="<?php echo $news['news_status']; ?>">
                <?php foreach (status as $key => $value) : ?>
                    <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                <?php endforeach ?>
            </select>
        </p>
        <p>
            <button type="submit" name="sub">Cập nhật tin tức</button>
        </p>
    </form>
</body>

</html>