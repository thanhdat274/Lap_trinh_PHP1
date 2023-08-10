<?php 
    session_start();
    unset($_SESSION['userErr']);
    unset($_SESSION['passErr']);
    unset($_SESSION['failLogin']);
    unset($_SESSION['loginPlease']);

    if(isset($_POST['btnSubmit'])){
        $checkStatus = true;
        if($_POST['username'] == "" ){
            $_SESSION['userErr'] = "Vui lòng không để trống username";
            $checkStatus = false;
        }
        if($_POST['password'] == "" ){
            $_SESSION['passErr'] = "Vui lòng không để trống password";
            $checkStatus = false;
        }

        if($checkStatus){
            checkLogin($_POST['username'], $_POST['password']);
        }else{
            header("location: login.php");
        }
    }


    function checkLogin($username, $password){
        if($username == "admin" &&  $password == "123456"){
            $_SESSION['successLogin'] = "Đăng nhập thành công";
            setcookie('fullname', 'Longhh7', time() + 600);

            header("location: admin.php");
        }else{
            $_SESSION['failLogin'] = "Sai tài khoản hoặc mật khẩu";
            header("location: login.php");
        }
    }
?>