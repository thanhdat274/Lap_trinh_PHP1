<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        span{
            display: block;
            color: red;
        }
    </style>
</head>
<body>
    <div>
        <?php 
            if(isset($_SESSION['userErr'])){
                echo "<span>" . $_SESSION['userErr']  . "</span>";
            }
            if(isset($_SESSION['passErr'])){
                echo "<span>" . $_SESSION['passErr']  . "</span>";
            }
            if(isset($_SESSION['failLogin'])){
                echo "<span>" . $_SESSION['failLogin']  . "</span>";
            }
            if(isset($_SESSION['loginPlease'])){
                echo "<span>" . $_SESSION['loginPlease']  . "</span>";
            }
        ?>
    </div>
    <form action="process.php" method="post">
        <div>
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>
        <button name="btnSubmit">Đăng nhập</button>
    </form>    


</body>
</html>