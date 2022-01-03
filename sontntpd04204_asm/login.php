<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="CSS/login.css" />
</head>
<body>
    <?php
        $lifetime = 60*60*24*365;
        session_set_cookie_params($lifetime,'/');
        session_start();
        
        require_once ('connect.php');
        // Khi nhấn vào nút đăng nhập
        if(isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])){
          $username = $_POST['username'];
          $password = $_POST['password'];
          $sql = "SELECT * FROM khachhang WHERE username = '".$username."' AND password = '".$password."'";
          $result = $db ->query($sql);
          $rs = $result->fetch(PDO::FETCH_ASSOC);

          if($rs && $rs['role'] == 1){
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            header('location: admin/index.php');
          }elseif($rs && $rs['role'] == 0){
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            header('location: index.php');
          }else{
            echo '<script language="javascript">';
            echo 'alert("Bạn đã nhập sai tên tài khoản hoặc mật khẩu")';
            echo '</script>';
          }
          
        }
        
        // Khi nhấn vào nút đăng ký
        if(isset($_POST['dangky'])){
            header('location: add-kh.php');
        }

    ?>

<div class="container">
<h1>Đăng nhập</h1>
  <form action="" method = "post" enctype="multipart/form-data">
    <label for="fname">Tài khoản</label>
    <input type="text" name="username" placeholder="Nhập tài khoản ...">

    <label for="lname">Mật khẩu</label>
    <input type="password" name="password" placeholder="Nhập mật khẩu ...">

    <input type="submit" name= "dangnhap" value="Đăng nhập">
    <input type="submit" name= "dangky" value="Đăng ký">
  </form>
</div>

</body>
</html>
