<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Thong-tin.css">
</head>

<body>
    <?php
    $Email = $_POST['Email'];
    $Password = $_POST['pass'];
    ?>

    <div class="wraper">
        <div class="left">
            <img src="anh/image 1.png" class="anh">
        </div>
        <div class="right">
            <div class="hop">
                <h1>Bạn đăng kí tài khoản thành công</h1>
                <form action="Dang-nhap.php">
                    <input type="submit" name="Login" id="Login" value="Login now">
                </form>
            </div>
        </div>
    </div>
</body>

</html>