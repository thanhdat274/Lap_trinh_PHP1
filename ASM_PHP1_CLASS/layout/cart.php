<?php
session_start();
require_once('./../admin/functions.php');
if (isset($_SESSION['user'])){
    $id = $_SESSION['user']['id'];
    $id_sp = intval($_GET['id']);
    $data = [
        'id_khach_hang' => $id,
        'id_san_pham' => $id_sp
    ];
    addCart($data);
    $cart = cart($id);
    $_SESSION['cart'] = $cart['so_luong'];
    header("Location: http://localhost:81/ASM_PHP1_CLASS/User/home-user.php");
    die;
} else {
    $_SESSION['error-cart'] = "<script>alert('Vui Lòng Đăng Nhập Trước!');</script>";
    header("Location: http://localhost:81/ASM_PHP1_CLASS/layout/login.php");
}
?>