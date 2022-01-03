<?php
    include_once("./../functions.php");
    $data = [
        'mat_khau' => $_POST['mat_khau'],
        'tai_khoan' => $_POST['tai_khoan'],
    ];
    insertUser($data);
    header("Location: http://localhost/ASM_PHP1_CLASS/admin/users/list-user.php");
?>