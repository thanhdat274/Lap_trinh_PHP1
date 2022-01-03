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
    // Bài 1: 
    // tính và hiển thị
    // chu vi và diện tích của một hình chữ nhật khi biết chiều rộng và
    // chiều dài theo hướng dẫn sau:
    // - Khai báo 2 biến a, b và gán giá trị cho chiều rộng
    // cho a và chiều dài cho b
    // - Khai báo 2 biến chuVi , dienTich chứa giá trị diện tích và chu
    // vi.  công thức tính chu vi là (a+b)*2 và  công thức tính diện tích là a*b.
    // - Trong html chúng ta cần hiển thị những thông tin sau: tên bài tập, yêu cầu của bài tập, kết quả sau khi tính toán

    $b = 20;
    $a = 10;
    $chuVi = ($a + $b) * 2;
    $dienTich = $a * $b;
    ?>
    <h1>Bài 1:</h1>
    <div>Tính và hiển thị chu vi và diện tích của một hình chữ nhật khi biết chiều rộng và
        chiều dài theo hướng dẫn sau:</div>
    <div>- Khai báo 2 biến a, b và gán giá trị cho chiều rộng
        cho a và chiều dài cho b</div>
    <div>- Khai báo 2 biến chuVi , dienTich chứa giá trị diện tích và chu
        vi. </div>
    <div>Công thức tính chu vi là (a+b)*2 và công thức tính diện tích là a*b.</div>
    <div>Kết quả: </div>
    <div> <?php echo "Chu vi: $chuVi" ?></div>
    <div><?php echo "Diện tích: $dienTich " ?></div>
    <hr>
    <!-- Thành dự định mở 1 trang trại nuôi bò sữa. Ban đầu Thành mua
    1000 con bò, sau đó trong vòng 2 năm tiếp theo Thành dự định mỗi tháng sẽ mua
    thêm 15 con bò nữa. Tuy nhiên đến tháng thứ 9 của năm đầu tiên Thành bị trộm mất
    1 khoản tiền lớn nên không thể tiếp tục đầu tư mua bò nữa nên từ đó trang trại
    của Thành không tăng thêm con bò nào.

    Tính số lượng bò mà trang trại của Thành có sau 2 năm, sau
    đó hiển thị những thông tin ra html như sau:
    Bài 2:
    Hiển thị đề bài trong thẻ p
    Số bò Thành mua ban đầu:
    Số bò Thành dự định mua thêm mỗi tháng:
    Tổng số bò mà trang trại Thành có sau 2 năm: -->
    <?php
    $a = 1000; //số bò ban đàu có
    $b = 15; //thêm 15 con mỗi tháng
    for ($i = 1; $i < 9; $i++) {
        $tongBoTang = $i * $b;
    }
    $tongBo2Nam = $a + $tongBoTang;
    ?>
    <h1>Bài 2</h1>
    <p>Thành dự định mở 1 trang trại nuôi bò sữa. Ban đầu Thành mua
        1000 con bò, sau đó trong vòng 2 năm tiếp theo Thành dự định mỗi tháng sẽ mua
        thêm 15 con bò nữa.
        <br>
        Tuy nhiên đến tháng thứ 9 của năm đầu tiên Thành bị trộm mất
        1 khoản tiền lớn nên không thể tiếp tục đầu tư mua bò nữa nên từ đó trang trại
        của Thành không tăng thêm con bò nào.
        <br>
        Tính số lượng bò mà trang trại của Thành có sau 2 năm, sau
        đó hiển thị những thông tin ra html như sau:
    </p>
    <p><?php echo "Số bò Thành mua ban đàu: $a con" ?></p>
    <p><?php echo "Số bò Thành mua thêm mỗi tháng: $b con" ?></p>
    <p><?php echo "Tổng số bò mà trang trại có sau 2 năm: $tongBo2Nam con" ?></p>
    <hr>
    <?php
    // Bài 3:

    // Nhập vào tiền điện, tiền nước, tiền mạng . Nếu tiền nước vượt
    // quá 250k hoặc tiền điện vượt quá 2 triệu thì hiển thị ra html là “tiền điện nước
    // cao quá, chuyển nhà đây.”, còn nếu tiền mạng vượt quá 500k thì hiển thị ra là “
    // tiền mạng cao quá, tôi sẽ lắp mạng khác ”
    // Trong vòng 5 năm, mỗi tháng bạn sẽ phải mất một khoản chi
    // phí cố định bằng tổng của 3 khoản đó. Tuy nhiên cứ tháng cuối cùng của 1 năm bạn
    // sẽ được miễn phí toàn bộ chi phí điện, nước, mạng của tháng đó.
    // Tính số tiền mà bạn phải chi mỗi tháng, số tiền mà bạn phải
    // chi mỗi năm và tổng số tiền mà bạn phải chi trong 5 năm
    // Hiển thị ra web:
    // Bài 3:
    // Đề bài
    // Các khoản tiền thuê nhà:
    // - tiền điện:
    // - tiền nước:
    // - tiền mạng:
    // Thống kê:
    // - Tổng tiền thuê nhà hàng tháng:
    // - Tổng số tiền phải đóng hàng năm:
    // - Tổng số tiền phải đóng trong 5 năm:

    $tienDien = 2100000;
    $tienNuoc = 200000;
    $tienMang = 150000;
    if ($tienDien > 2000000) {
        $t = "TIền điện nước cao quá, chuyển nhà đây.";
    } else if ($tienNuoc > 250000) {
        $t = "TIền điện nước cao quá, chuyển nhà đây.";
    } else {
        $t = "";
    }
    if ($tienMang > 500000) {
        $a = "tiền mạng cao quá, tôi sẽ lắp mạng khác";
    } else {
        $a = "";
    }
    $tienChiHT = $tienDien + $tienNuoc + $tienMang;
    $tienChiHN =  $tienChiHT * 11;
    $tienNha5N = $tienChiHN * 5;
    ?> 
    <h1>BÀi 3</h1>
    <p> Nhập vào tiền điện, tiền nước, tiền mạng . Nếu tiền nước vượt
        quá 250k hoặc tiền điện vượt quá 2 triệu thì hiển thị ra html là “tiền điện nước
        cao quá, chuyển nhà đây.”, còn nếu tiền mạng vượt quá 500k thì hiển thị ra là “
        tiền mạng cao quá, tôi sẽ lắp mạng khác ”
        Trong vòng 5 năm, mỗi tháng bạn sẽ phải mất một khoản chi
        phí cố định bằng tổng của 3 khoản đó. Tuy nhiên cứ tháng cuối cùng của 1 năm bạn
        sẽ được miễn phí toàn bộ chi phí điện, nước, mạng của tháng đó.
        <br>
        Tính số tiền mà bạn phải chi mỗi tháng, số tiền mà bạn phải
        chi mỗi năm và tổng số tiền mà bạn phải chi trong 5 năm
    </p>
    <div>Các khoản tiền thuê nhà: </div>
    <div><?php echo "Tiền điện:  $tienDien" ?></div>
    <div><?php echo "Tiền nước: $tienNuoc"?></div>
    <div><?php echo "Tiền mạng: $tienMang"?></div>
    <div><?php echo $a ?></div>
    <div><?php echo $t ?></div>
    <div>THông kê: </div>
    <div><?php echo "Tổng tiền thuê nhà hàng tháng: $tienChiHT VNĐ"?></div>
    <div><?php echo "Tổng tiền thuê nhà hàng năm: $tienChiHN VNĐ"?></div>
    <div><?php echo "Tổng tiền thuê nhà 5 năm: $tienNha5N VNĐ"?></div>
</body>

</html>