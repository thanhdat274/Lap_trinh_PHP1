<?php
session_start();
require_once('./../admin/functions.php');
$data = [
    'tai_khoan' => $_POST['tai_khoan'],
    'mat_khau' => $_POST['mat_khau'],
];
insertUser($data);

$_SESSION['info'] = "<script>alert('Đăng Kí Thành Công! Đăng Nhập Ngay!');</script>";
header("Location: http://localhost:81/ASM_PHP1_CLASS/layout/login.php");
?>