<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        session_start();
        $maSP = $_GET['maSP'];
        unset($_SESSION['cart'][$maSP]);
        header('location:list-cart.php');
    ?>
</body>
</html>