<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="../css/Dangnhap.css">
</head>

<body>
    <?php
    session_start();
    if (isset($_POST['submit'])) {
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['password'] = $_POST['password'];
    }
    $loi = array();
    $loi1 = array();

    if (isset($_POST['submit'])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        if ($username == '') {
            $loi['username'] = 'Bạn chưa nhập username';
        }
        if ($password == '') {
            $loi1['password'] = 'Bạn chưa nhập password';
        }

        if ($username && $password != '') {
            $connection = new PDO("mysql:host=127.0.0.1;dbname=asm_php1;charset=utf8", "root", "");
            $query = "select * from user where username='$username' and password='$password'";
            $stmt = $connection->prepare($query);
            $stmt->execute();
            $users = $stmt->fetch();
            if ($users != false) {

                $_SESSION["username"] = $_POST["username"];
                $_SESSION["password"] = $_POST["password"];
                $_SESSION['login_time_stamp'] = time();
                header("location: list-user.php");
            } else {
                $loi2 = "Bạn đã nhập sai username hoặc password";
            }
        }
    }
    ?>
    <div class="wrapper">
        <div class="box">
            <h1 class="tieude">ĐĂNG NHẬP</h1>
            <form action="" method="POST">
                <p>
                    Username<input type="text" name="username" id="user" placeholder=" Nhập Username">
                <div class="loi"> <?php echo (isset($loi['username'])) ? $loi['username'] : ''; ?></div>
                </p>
                <p>
                    Password<input type="password" name="password" id="pass" placeholder=" Nhập Password">
                <div class="loi"> <?php echo (isset($loi1['password'])) ? $loi1['password'] : ''; ?></div>
                </p>
                <p align="center" style="color: red;">
                    <?php echo (isset($loi2)) ? $loi2 : ''; ?>
                </p>
                <p>
                    <button type="submit" name="submit">Đăng nhập</button>
                </p>
            </form>
        </div>
    </div>
</body>

</html>