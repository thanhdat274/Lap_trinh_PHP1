<?php include_once "../classes/users_class.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa người dùng</title>
</head>
<body>
    <?php
        $user = new users_class();
        if(isset($_GET['idEdit'])){
            $id = $_GET['idEdit'];
        }
        if(isset($_POST['txtName'])){
            $update_user = $user->update_user($_POST['txtName'],$id);
        }
        if(isset($update_user)){
            echo $update_user;
            header("refresh:1;url=userlist.php");
        }
    ?>
    <form action="" method="post">
        <label for="">Họ tên </label> <input type="text" name="txtName">
        <p>
            <button type="submit">Cập nhật</button>
        </p>
    </form>
</body>
</html>