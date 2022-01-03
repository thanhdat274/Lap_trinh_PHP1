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
    // tạo 1 mảng lưu trữ tên các quốc gia và thủ đô của chúng
    // VD:
    // Viet Nam: Ha Noi
    // Germany: Berlin
    // USA: Newyork
    // lặp và hiển thị thông tin của mảng đó
    echo "Bài 1:";
    $mang = array(
        'Viet Nam' => "Ha Noi",
        'Germany' => "Berlin",
        'USA' => "Newyork"
    );
    foreach ($mang as $key => $value) {
        echo "<pre>";
        echo $key . ' => ' . $value;
    }
    var_dump($mang);

    //         B2: 
    // xóa phần tử Viet Nam trong mảng 
    // hiển thị lại mảng
    echo "<pre>";
    echo "Bài 2:";
    echo "<pre>";
    array_shift($mang);
    echo "Mảng sau khi đã xóa phần tử: ";
    var_dump($mang);


    //     B3:
    // cho 1 mảng users  : ("sontv8","thienth","datlt","tiennh21")
    // - thêm phần tử "minhdq8" vào cuối mảng
    // - Xóa phần tử "sontv8" khỏi mảng
    // - replace phần tử "datlt" bằng "maidtt"
    echo "<pre>";
    echo "Bài 3:";
    echo "<pre>";
    // - thêm phần tử "minhdq8" vào cuối mảng
    $mang1 = array("sontv8", "thienth", "datlt", "tiennh21");
    echo "Mảng gốc: ";
    var_dump($mang1);
    echo "<pre>";
    array_push($mang1, "minhdq8");
    echo "Mảng sau khi đã thêm phần tử: ";
    var_dump($mang1);
    // - Xóa phần tử "sontv8" khỏi mảng
    $mang1 = array("sontv8", "thienth", "datlt", "tiennh21");
    echo "<pre>";
    echo "Mảng gốc: ";
    var_dump($mang1);
    echo "<pre>";
    array_shift($mang1);
    echo "Mảng sau khi đã xóa phần tử: ";
    var_dump($mang1);
    // - replace phần tử "datlt" bằng "maidtt"
    echo "<pre>";
    $mang1 = array("sontv8", "thienth", "datlt", "tiennh21");
    echo "Mảng gốc: ";
    var_dump($mang1);
    echo "<pre>";
    $mang1[2] = "maidtt";
    echo "Mảng sau khi đã thay đổi phần tử: ";
    var_dump($mang1);


    //     B4: 
    // kiểm tra xem trong mảng users ở B3 xem có "maidtt" hay không
    // nếu có thì hiển thị ra "Tài khoản có tồn tại"
    // nếu không thì hiển thị ra "Tài khoản không tồn tại"

    //     B5: 
    // Duy là một chàng trai trong sáng và cẩn thận. Duy có 5 cô người yêu và lưu luôn số đo vòng 1 của cả 5 cô lần lượt như sau: 80, 85, 95, 70, 75
    // Yêu cầu: tính và hiển thị số đo vòng 1 trung bình của các cô người yêu Duy
    $MangSoDoCuaNY = "80, 85, 95, 70, 75";
    $mang2 = explode(',', $MangSoDoCuaNY);
    $TongSoDo = 0;
    $SoNY = count($mang2);
    foreach ($mang_tam as $gia_tri) {
        $TongSoDo += $gia_tri;
    }
    $SoDoTB = $tong_gia_tri / $do_dai_mang;
    echo "TRUNG BÌNH SỐ ĐO 3 VÒNG CỦA NGƯỜI YÊU LÀ: " . $SoDoTB . "";
    ?>
</body>

</html>