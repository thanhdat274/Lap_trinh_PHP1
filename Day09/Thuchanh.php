<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // B1:
    // Tạo form đăng nhập bao gồm
    // - Username
    // - Password
    // Cho 1 mảng 
    // $admins = array(
    //             'username' => 'datlt',
    //             'password' => 'fpoly'
    // );
    // Yêu cầu:
    // - kiểm tra xem username và password đã được nhập hay không, nếu không thì hiển thị thông báo 
    // - kiểm tra xem username và password nhập vào có đúng là admin hay không, 
    //           - nếu đúng thì cho đăng nhập và điều hướng sang 1 page khác rồi show ra thông báo đăng nhập thành công (VD: datlt đã đăng nhập thành công)
    //           - nếu không đúng thì hiển thị ra thông báo lỗi
    $admin = array(
        'username' => 'datlt',
        'password' => 'fpoly'
    );

    ?>
    <form action="" method="POST">
        <div>
            <input type="text" name="username" id="" placeholder="Username">
            <div></div>
        </div>
        <div>
            <input type="password" name="password" id="" placeholder="Password">
            <div></div>
        </div>
        <div>
            <input type="submit" name="btn-submit" id="" value="Đăng nhập">
        </div>
    </form>











    <?php
    // B2:
    // Tạo page addProduct.php
    // Tạo 1 form chứa các trường sau:
    // - product name
    // - product price
    // - product quantity
    // - product color (sử dụng input type = radio)
    // - button add product


    // sử dụng php để validate form và hiển thị thông báo lỗi
    // - tất cả các trường không được để trống
    // - product price không được nhỏ hơn 0
    // - product quantity không được nhỏ hơn 0


    // Sau  khi thêm sản phẩm sẽ điều hướng sang 1 trang khác để hiển thị sản phẩm vừa thêm vào

    ?>
</body>

</html>