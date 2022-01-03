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
    // cho 1 form có các trường như sau:
    //     - fullname
    //     - email
    //     - place
    //     - submit
    //     lấy dữ liệu sau khi submit form và hiển thị xuống khối html bên dưới: 
    //     <div>
    //          <p>Họ và tên: ... </p>
    //          <p>Email: ... </p>
    //          <p>Địa chỉ: ... </p>
    //     </div>
    echo "<pre>";
    var_dump($_GET);
    if(isset($_GET["full-name"])){
        echo $_GET["full-name"];
    }

    ?>
    <form action="" method="GET">
        <input type="text" name="fullname" id="full-name" placeholder="Hạ và Tên">
        <input type="email" name="email" id="email" placeholder="Email">
        <input type="text" name="diachi" id="dia-chi" placeholder="Địa chỉ">
        <input type="submit" name="btnSumbit" id="btn-sumbit" value="Thêm">
    </form>
    <div>
        <p></p>
    </div>
</body>

</html>