<?php
session_start();
require_once ('./../admin/connect_DB.php');
require_once ('./../admin/functions.php');
$tk = $_POST['tai_khoan'];
$mk = $_POST['mat_khau'];
$dataUser = checkDataUser($tk, $mk);
if(empty($dataUser)){
    $_SESSION['error'] = "Thông Tin Tài Khoản Mật Khẩu Không Chính Xác !";
    header("Location: http://localhost:81/ASM_PHP1_CLASS/layout/login.php");
    die;
}
$id = $dataUser['id'];
$conn = getConnection();
$sql = "select count(id) as 'so_luong' from don_hang where id_khach_hang = :id_khach_hang";
$statement = $conn->prepare($sql);
$statement->execute(['id_khach_hang' => $id]);
$id_khach_hang = $statement->fetch();
$_SESSION['cart'] = $id_khach_hang['so_luong'];

$_SESSION['user'] = $dataUser;
header("Location: http://localhost:81/ASM_PHP1_CLASS/User/home-user.php");
?>