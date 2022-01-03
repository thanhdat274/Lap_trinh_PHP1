<?php
session_start();
require_once ('./../admin/functions.php');
$tk = $_POST['tai_khoan'];
$mk = $_POST['mat_khau'];
$mk2 = $_POST['mat_khau2'];

$admin = loginAdmin($tk, $mk, $mk2);
if(empty($admin)){
    $_SESSION['error'] = "Thông Tin Tài Khoản Mật Khẩu Không Chính Xác !";
    header("Location: http://localhost:81/ASM_PHP1_CLASS/layout/login-admin.php");
    die;
}
$_SESSION['admin'] = $admin;

header("Location: http://localhost:81/ASM_PHP1_CLASS/admin/home/home-admin.php");
?>