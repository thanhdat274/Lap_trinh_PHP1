<?php 
    include_once "../classes/users_class.php";
    include_once "../lib/session.php";
    session::checkLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
</head>
<body>
    <?php
        $user = new users_class();
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Lấy dữ liệu từ form
            $email = $_POST['txtName'];
            $pass  = $_POST['txtPass'];
            $check_login = $user->login($email,$pass);
        }
    ?>
    <form action="login.php" method="post">
        <h1>Đăng nhập</h1>
        <p>
            <?php
                if(isset($check_login)) echo $check_login;
            ?>
        </p>
        <p>
            Email <input type="text" required name="txtName">
        </p>
        <p>
            Mật khẩu <input type="password" required name="txtPass">
        </p>
        <p>
            <button type="submit">Đăng nhập</button>
        </p>
    </form>
</body>
</html>