<?php
    // khi validate sử dụng session
    session_start();
    unset($_SESSION['error']);

    if (isset($_POST['btnSave'])){
        // Validate file ảnh
        // $_FILES['name'];
        // - Trả về 1 mảng
        print_r($_FILES['$image']);
        // [name] => anh.jpg (tên file) 
        // [full_path] => anh.jpg (đường dẫn dưới máy của người dùng)
        // [type] => image/jpeg (định dạng)
        // [tmp_name] => C:\xampp\tmp\php9840.tmp (đường dẫn tạm)
        // [error] => 0 (lỗi)
        // [size] => 12011 (Kích thước) (byte)

        // Kiểm tra xem người dùng có nhập file ảnh k
        $fileUpload = $_FILES['image'];
        if(empty($fileUpload['name'])){
            $_SESSION['error']['empty'] = 'Bạn k được bỏ trống file';
        }

        // Kiểm tra xem quá trình tải file ảnh lên có lỗi k
        if ($fileUpload['error'] != 0){
            $_SESSION['error']['errorFile'] = 'Quá trình tải file lỗi đã bị lỗi';
        }

        // Kiểm tả xem file có đúng định dạng hay k
        // Khai báo 1 mảng => Chứa tất cả những định dạng file mà chúng cho phép
        $allowType = ['jpg', 'png', 'jpeg', 'gif'];
        // Hàm lấy ra phần mở rộng của file
        $imageType = pathinfo($fileUpload['name'], PATHINFO_EXTENSION);
        // PATHINFO_EXTENSION là 1 hằng số được chỉ định cho hàm pathinfo() trả về phần mở rộng
        if (!in_array($imageType, $allowType)){
            $_SESSION['error']['type'] = 'Ảnh tải lên sai định dạng';
        }

        // Kiểm tra xem file ảnh có chiều dài và chiều rộng của ảnh có phù hợp hay k
        // Quy định về chiều dài và chiều rộng
        $maxWidth = 200;
        $maxHeight = 200;
        // Hàm trả về chiều dài và chiều rộng getimagesize()
        // print_r(getimagesize($fileUpload['tmp_name']));
        $data = getimagesize($fileUpload['tmp_name']);
        if ($data[0]>$maxWidth || $data[1] > $maxHeight){
            $_SESSION['error']['data'] = 'Ảnh tải lên có chiều dài và chiều rộng vượt mức cho phép';
        }

        // Kiểm tra xem dung lượng của file có trong mức cho phép hay không
        // Quy định vè dung lượng file
        $imageSize = 2000000;
        if ($fileUpload['size'] > $imageSize){
            $_SESSION['error']['size'] = 'Ảnh tải lên có dung lượng vượt mức cho phép';
        }

        // -------------------------------- UPLOAD FILE --------------------------------------
        // Kiểm tra nếu k có lỗi thì mới upload file
        if (isset($_SESSION['error'])){
            // Thư mục lưu trữ ảnh
            $imageUpload = 'upload/';

            // đổi tên file ảnh
            $newName = time().$fileUpload['name'];

            // đường dẫn đến file được lưu 
            $imageSave = $imageUpload . $newName;

            // hàm xử lí upload file:  move_uploaded_file()
            if (move_uploaded_file($fileUpload['tmp_name'], $imageSave)){
                $_SESSION['success'] = 'upload file ảnh thành công !';
            }
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Validate Ảnh</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="add-form">
    <h2>Validate & Upload file ảnh đơn</h2>
    <h1></h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="image">Ảnh:</label>
            <input type="file" id="image" name="image" accept="image/*">
            <?php 
                if (isset($_SESSION['error'])){
                    foreach($_SESSION['error'] as $value){

            ?>
            <span>* <?php echo $value ?></span>
            <?php
                    }
                }
            ?>
            <h4><?php echo isset($_SESSION['success']) ? $_SESSION['success'] : '' ?></h4>
        </div>
        <button class="submit-button" name="btnSave" type="submit">Thêm</button>
    </form>
</div>
</body>
</html>