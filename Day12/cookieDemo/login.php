<?php
    if(isset($_POST['btn-login'])){
        setcookie('username',$_POST['username'],time()+30);
        setcookie('password',$_POST['password'],time()+30);
        header('location: login-success.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="username" id="" placeholder="Enter Username">
        <input type="password" name="password" id="" placeholder="Enter Password">
        <input type="submit" name="btn-login" id="" value="Login">
    </form>
</body>
</html>