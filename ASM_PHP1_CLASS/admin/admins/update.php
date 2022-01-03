<?php
session_start();
include_once('./../functions.php');
$data = [
    'id' => $_POST['id'],
    'tai_khoan' => $_POST['username'],
    'mat_khau' => $_POST['password'],
    'mat_khau2' => $_POST['password2'],
    'ten' => $_POST['name'],
    'sdt' => $_POST['sdt'],
    'dia_chi' => $_POST['address'],
    'anh' => '',
];

$sdt = $_POST['sdt'];
if(is_int($sdt) === false){
    $_SESSION['error'] = "Số Điện Thoại phải là số";
    header("Location: http://localhost:81/ASM_PHP1_CLASS/admin/admins/add-admin.php");
    die;
}
$data['sdt'] = $sdt;
$image = $_FILES['anh'];
if(strpos($upLoad['type'], 'image') === false){

    $_SESSION['error'] = "Avatar phải là ảnh";
    header("Location: http://localhost:81/ASM_PHP1_CLASS/admin/admins/add-admin.php");
    die;
}

if($upLoad['size'] > 3000000){
    $_SESSION['error'] = "Avatar phải nhỏ hơn 3MB";
    header("Location: http://localhost:81/ASM_PHP1_CLASS/admin/admins/add-admin.php");
    die;
}
$storePart = "./../../images/";
$fileName = $image['name'];
$part = $storePart . $fileName;
move_uploaded_file($image['tmp_name'], $part);
$data['anh'] = "/ASM_PHP1_CLASS/images/" . $fileName;
updateAdmin($data);
header("Location: http://localhost:81/ASM_PHP1_CLASS/admin/admins/list-admin.php");
?>