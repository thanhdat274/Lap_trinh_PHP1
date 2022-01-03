<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật User</title>
    <link rel="stylesheet" href="../css/add-update-user.css">
</head>

<body>
    <?php
    $id = $_GET['id'];
    $connection = new PDO("mysql:host=127.0.0.1;dbname=asm_php1;charset=utf8", "root", "");
    $query = "select * from user where id=$id";
    $stmt = $connection->prepare($query);
    $stmt->execute();
    $user = $stmt->fetch();


    $loi = array();
    $loi1 = array();

    if (isset($_POST['submit'])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $id = $_POST['user-id'];
        if ($username == '') {
            $loi['username'] = 'Bạn chưa nhập username';
        }
        if ($password == '') {
            $loi1['password'] = 'Bạn chưa nhập password';
        }

        if ($username && $password != '') {
            $connection = $connection = new PDO("mysql:host=127.0.0.1;dbname=asm_php1;charset=utf8", "root", "");
            $query = "update user set username='$username',password='$password' where id=$id";
            $stmt = $connection->prepare($query);
            $stmt->execute();
            
            header("location: list-user.php");
        }
    }

    ?>
    <div class="wrapper">
        <div class="box">
            <h1 class="tieude">SỬA USER</h1>
            <form action="" method="POST">
                <p>
                    <input type="text" name="user-id" id="" value="<?php echo $user['id']; ?>" hidden>
                </p>
                <p>
                    Username<input type="text" name="username" id="user" value="<?php echo $user['username']; ?>">
                <div class="loi"> <?php echo (isset($loi['username'])) ? $loi['username'] : ''; ?></div>
                </p>
                <p>
                    Password<input type="text" name="password" id="pass" value="<?php echo $user['password']; ?>">
                <div class="loi"> <?php echo (isset($loi1['password'])) ? $loi1['password'] : ''; ?></div>
                </P>
                <p>
                    <button type="submit" name="submit">Cập nhật</button>
                </p>
            </form>
        </div>
    </div>
</body>

</html>