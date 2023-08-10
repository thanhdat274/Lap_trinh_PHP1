<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- method: GET =  gửi dữ liệu của form vào url -->
    <!-- method: post = gửi dữ liệu của form đi 1 cách bảo mật -->
<!-- 
    <form action="form_example.php" method="GET">
        <input type="text" name="name" id="">
        <input type="submit" value="Gửi" name="submit">
    </form>

    <form action="" method="GET">
        <input type="text" name="name" id="">
        <input type="submit" value="Gửi" name="submit">
    </form> -->

    <form action="form_example.php" method="GET">
        <label for="">Tham số a</label>
        <input type="number" name="a" id="">
        <label for="">Tham số b</label>
        <input type="number" name="b" id="">
        <input type="submit" value="Gửi" name="submit">
    </form>
</body>

</html>
<?php
// isset : kiểm tra biến submit có tồn tại hay chưa
// ($_GET["submit"]): kiểm tra biến submit rỗng hay k

// Tạo form cho phép điền vào 2 tham số của phương trình bậc 1 : ax + b = 0
if (isset($_GET["submit"]) && ($_GET["submit"])) {
    $a = $_GET["a"];
    $b = $_GET["b"];
    if ($a==0){
       echo ($b==0) ? "Vố số nghiệm" : "Vô nghiệm";
    }else {
        echo ($b==0) ? "Phương trình có nghiệm x = 0" : "Phương trình có nghiệm x = " . -$b/$a;
    }
}
?>