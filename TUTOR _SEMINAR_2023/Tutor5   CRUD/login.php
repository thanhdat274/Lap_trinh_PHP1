<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = $_POST['username'];
        $password = $_POST['password'];

        // username: admin | password: 223344
        if ($username == 'admin' && $password == '223344'){
            setcookie('username', $username, time() + 60*60);
            header('location: index.php');
        }else {
            $error = 'Thông tin tài khoản hoặc mật khẩu khong đúng !';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div style="color: red" class="">
        <?= $error ?? '' ?>
    </div>
    <form action="" method="POST">
        username: <input type="text" name="username"> <br><br>
        password: <input type="password" name="password"> <br><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>