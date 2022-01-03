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
    // B1: viết 1 hàm tính tổng các số nguyên chẵn từ 1 tới n

    function tinhTong()
    {
        $n = 10;
        $tong = 0;
        for ($i = 1; $i <= $n; $i++) {
            if ($i % 2 == 0) {
                $tong += $i;
            }
        }
        echo $tong;
    }


    // B2: Yêu cầu:
    // viết 1 hàm để in ra các số từ 1 đến 100.
    // đối với các số chia hết cho 5 thì in ra chữ "Five" thay vì in ra số 5
    // đối với các số vừa chia hết cho 2 và 3 thì in ra chữ "Good Number" thay cho số đó

    function bai2()
    {
        for ($i = 1; $i <= 100; $i++) {
            if ($i % 5 == 0 && $i % 2 != 0) {
                echo (($i - 5) / 10) . "Five" . "<br>";
            } elseif ($i % 2 == 0 && $i % 3 == 0) {
                echo "Good Number" . "<br>";
            } else {
                echo $i . "<br>";
            }
        }
    }



    // B3: sử dụng kết quả của bài 1
    // Tháng 1 năm nay Nam mở một tài khoản tiết kiệm tại ngân hàng trong vòng 5 năm, tổng các số nguyên chẵn sẽ là số tiền mà Nam gửi tiết kiệm hàng tháng. Hàng năm ngân hàng sẽ trả lãi 8% dựa trên số tiền có trong tài khoản tính cho tới thời điểm tháng cuối cùng của năm đó. Cứ sang năm tiếp theo thì tiền lãi sẽ được tính dựa trên số tiền gốc của năm trước đó cộng với lãi của năm đó.

    // Viết hàm để tính và hiển thị ra các thông tin sau ra table html:
    // - Số tiền đóng hàng tháng 
    // - Tổng số tiền gốc hàng năm
    // - Số tiền lãi hàng năm 
    // - tổng số tiền mà Nam sẽ nhận được sau 5 năm

    // Lưu ý: sử dụng vòng lặp để hiển thị nhiều dòng trong table
    $tien_gui = 30;
    function tong_tien_goc_nam_1(){
        global $tien_gui;
        $tien_goc_nam_1=$tien_gui * 12;
        echo $tien_goc_nam_1;
    }
    echo tong_tien_goc_nam_1();

    function tien_lai_nam_1(){
  
    }
    function tien_lai(){

    }

    ?>
    <h1>Bài 1:</h1>
    <p>Tổng: <?php echo tinhTong() ?></p>
    
    <h1>Bài 2: </h1>
    <p><?php echo bai2() ?></p>


    <h1>Bài 4:</h1>
    <?php
    // B4: 
    // viết 1 hàm (sử dụng tham số) để kiểm tra số nguyên tố ( số nguyên tố là số chỉ chia hết cho 1 và chính nó )
    // nếu số đó là số nguyên tố thì hiển thị " đây là số nguyên tố "
    // nếu không thì hiển thị " đây không phải là số nguyên tố "

    function ham_kiem_tra_so_nguyen_to($n)
    {
        for ($x = 2; $x < $n; $x++) {
            if ($n % $x == 0) {
                return 0;
            }
        }
        return 1;
    }
    $a = ham_kiem_tra_so_nguyen_to(7);
    if ($a == 0)
        echo 'Đây không phải là số nguyên tố' . "<br>";
    else
        echo 'Đây là số nguyên tố' . "<br>";

    ?>
</body>

</html>