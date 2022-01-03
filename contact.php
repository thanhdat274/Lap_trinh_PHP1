<?php

$conn = mysqli_connect('localhost','root','','demo');
mysqli_set_charset($conn,'utf8');
session_start();


if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE username = '$username' ";
    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($query);
    $checkUsername = mysqli_num_rows($query);

    if ($checkUsername == 1) {

        $password = $data['password'];
        if ($password) {
            $_SESSION['user'] = $data;
     
            echo "đăng nhập thành công";
        } else {
            echo  'Mật khẩu không chính xác';
        }
    } else {
        echo  'Tên không tồn tại';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="login.css">
    <title>Document</title>

</head>

<body>

    <div class="container">
        <div class="product1">
            <form action="" method="POST">
                <h2>Sign in to <br> Unity Exchange GIGN IN
                </h2>
                <input type="text" name="username" id="" placeholder="Username" class="a"> <br>
                <strong><?php echo isset($erooMessage['username']) ? $erooMessage['username'] : ''; ?> <br>
                    <input type="password" name="password" id="" placeholder="Password" class="a"> <br>
                    <strong> <?php echo isset($erooMessage['password']) ? $erooMessage['password'] : ''; ?>
                        <a class=" b" href=""><i class="fa fa-link"></i>Forgot Password? </a> <br>
                        <input type="submit" name="sub" value="Sign in" class="c"> <br>
                        <p>Not a member?
                            <a href="index.php"><i class="fa fa-link"></i>Sign up now</a>
                        </p>

            </form>
        </div>
    </div>
</body>

</html>