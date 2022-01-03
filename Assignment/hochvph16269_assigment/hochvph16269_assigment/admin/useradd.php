<?php include_once "../classes/users_class.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm người dùng</title>
</head>
<body>
    <?php
        $user = new users_class();
        if(isset($_POST['txtName']) && isset($_POST['txtEmail']) && isset($_POST['txtPass'])){
            $insert_user = $user->insert_user($_POST['txtName'],$_POST['txtEmail'],$_POST['txtPass']);
        }
        if(isset($insert_user)){
            echo $insert_user;
            header("refresh:1;url=userlist.php");
        }
    ?>
    <form action="useradd.php" method="post">
        <p>
            Họ tên <input type="text" name="txtName">
        </p>
        <p>
            Email <input type="email" name="txtEmail">
        </p>
        <p>
            Mật khẩu <input type="text" name="txtPass">
        </p>
        <button type="submit">Thêm người dùng</button>
    </form>
</body>
</html>