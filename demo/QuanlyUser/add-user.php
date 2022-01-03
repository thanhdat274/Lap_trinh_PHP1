<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm mới User</title>
    <link rel="stylesheet" href="../css/add-update-user.css">
</head>

<body>
    <?php
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
            $query = "insert into user (username,password) values ('$username','$password')";
            $stmt = $connection->prepare($query);
            $stmt->execute();

            header("location: list-user.php");
        }
    }
    ?>
    <div class="wrapper">
        <div class="box">
            <h1 class="tieude">THÊM MỚI USER</h1>
            <form action="" method="POST">
                <p>
                    Username<input type="text" name="username" id="user" placeholder="Nhập Username">
                <div class="loi"> <?php echo (isset($loi['username'])) ? $loi['username'] : ''; ?></div>
                </p>
                <p>
                    Password<input type="password" name="password" id="pass" placeholder="Nhập Password">
                <div class="loi"> <?php echo (isset($loi1['password'])) ? $loi1['password'] : ''; ?></div>
                </P>
                <p>
                    <button type="submit" name="submit">Thêm mới</button>
                </p>
            </form>
        </div>
    </div>
</body>

</html>