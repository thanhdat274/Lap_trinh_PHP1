<?php
include_once('./../functions.php');
$data = [
    'id' => $_POST['id'],
    'tai_khoan' => $_POST['username'],
    'mat_khau' => $_POST['password'],
];
updateUser($data);
header("Location: http://localhost/ASM_PHP1_CLASS/admin/users/list-user.php");
?>