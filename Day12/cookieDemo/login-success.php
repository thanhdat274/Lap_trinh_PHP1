<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>Login success</div>
    <div>Thông tin tài khoản của bạn: </div>
    <?php
        if(isset($_COOKIE['username'],$_COOKIE['password'])){
            // echo '<pre>';
            // var_dump($_COOKIE);
            $username = $_COOKIE['username'];
            $password = $_COOKIE['password'];
            echo $username."-".$password;
        }else{
            echo 'Bạn đã ngồi chơi quá lâu rồi, dẹp đê';
            echo 'Thích thì bấm vào đăng nhập lại => <a href="login.php">Back to Login</a>';
        }
    ?>
</body>
</html>