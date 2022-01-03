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
        session_start();
        if(isset($_SESSION['username'],$_SESSION['password'])){
            // echo '<pre>';
            // var_dump($_COOKIE);
            $username = $_SESSION['username'];
            $password = $_SESSION['password'];
            echo $username."-".$password;
            if(time()-$_SESSION['login_time_stamp']>30){
                session_destroy();
                header('location: login.php');
            }
        }else{
            echo 'Hết thời gian đăng nhập.';
            echo 'đăng nhập lại => <a href="login.php">Back to Login</a>';
        }
    ?>
</body>
</html>