<?php
require_once "index.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký thông tin</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <h2>ĐĂNG KÝ THÔNG TIN</h2>
    <br>
    <form action="" method="post">
        Tên: <input type="text" name="name">
        <span class="error">*
            <?php echo $nameErr; ?>
        </span>
        <br><br>
        Email: <input type="text" name="email">
        <span class="error">*
            <?php echo $emailErr; ?>
        </span>
        <br><br>
        Số điện thoại: <input type="text" name="phone">
        <span class="error">*
            <?php echo $phoneErr; ?>
        </span>
        <br><br>
        Ngày sinh: <input type="date" name="birthday">
        <span class="error">*
            <?php echo $birthErr; ?>
        </span>
        <br><br>
        </span>
        <br><br>
        Giới tính: <span class="error">*</span>
        <input type="radio" name="gender" value="nam"> Nam
        <input type="radio" name="gender" value="nữ"> Nữ
        <input type="radio" name="gender" value="khác"> Khác
        <span class="error">
            <?php echo $genderErr; ?>
        </span>
        <br><br>
        Sở thích:
        <span class="error">*</span>
        <input type="checkbox" name="hobby[]" value="reading"> Đọc sách
        <input type="checkbox" name="hobby[]" value="traveling"> Du lịch
        <input type="checkbox" name="hobby[]" value="cooking"> Nấu ăn
        <span class="error">
            <?php echo $hobbyErr; ?>
        </span>
        <br><br>
        Mật khẩu: <input type="password" name="password">
        <span class="error">*
            <?php echo $passErr; ?>
        </span>
        <br><br>
        Xác nhận mật khẩu: <input type="password" name="repass">
        <span class="error">*
            <?php echo $repassErr; ?>
        </span>
        <br><br>
        <input type="submit" name="submit" value="Đăng ký">
    </form>
    <?php
    if (isset($_POST["submit"])) {
        if ($nameErr == "" && $emailErr == "") {
            echo "<h3 style='color:green'><b>Bạn đã gửi thông tin thành công</b></h3>";
            // In các thông tin vừa nhập ra màn hình
            echo "<h4>Thông tin của bạn vừa gửi là:</h4>";    
            echo "Tên: " .$name;    
            echo "<br>";    
            echo "Email: " .$email;    
            echo "<br>";    
            echo "SĐT: " .$phone;    
            echo "<br>";    
            echo "Ngày sinh: " .$birthday;    
            echo "<br>";    
            echo "Giới tính: " .$gender;    
            echo "<br>";
            echo "Sở thích: ";
            foreach ($hobby as $value) {
                echo $value . ", ";
            }
        } else {
            echo "<h3 style='color:red'><b>Bạn cần KT thông tin trước khi gửi</b></h3>";
        }
        
        
    }
    ?>
</body>

</html>