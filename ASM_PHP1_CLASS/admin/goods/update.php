<?php
    session_start();
    include_once("./../functions.php");
    $data = [
        'id'=> $_POST['id'],
        'ten' => $_POST['ten'],
        'so_luong' => $_POST['so_luong'],
        'gia' => $_POST['gia'],
        'anh' => '',
        'trang_thai' => $_POST['trang_thai'],
    ];
    
    $image = $_FILES['anh'];
    if(strpos($upLoad['type'], 'image') === false){

        $_SESSION['error'] = "File phải là ảnh";
        header("Location: http://localhost:81/ASM_PHP1_CLASS/admin/admins/add-admin.php");
        die;
    }
    $storePart = "./../../images/";
    $fileName = $image['name'];
    $part = $storePart . $fileName;
    move_uploaded_file($image['tmp_name'], $part);
    $data['anh'] = "/ASM_PHP1_CLASS/images/" . $fileName;
    updateProduct($data);
    header("Location: http://localhost:81/ASM_PHP1_CLASS/admin/goods/list-product.php");
?>