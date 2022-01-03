<?php 
    /*
        Function (hàm): là tập hợp của 1 đoạn code nhằm xử lý 1 chức năng nào đó
        Cú pháp khai báo:
            function tenHam(tham số){
                khối lệnh;
                return value;
            }
        Các kiểu hàm trong php:
            - hàm không có tham số và không có giá trị trả về
            - hàm không có tham số và có giá trị trả về
            - hàm có tham số và không có giá trị trả về
            - hàm có tham số và có giá trị trả về
    */
    /* hàm không có tham số và không có giá trị trả về */
    // function tinhTong(){
    //     $a = 5;
    //     $b = 10;
    //     $tong = $a + $b;
    // }
    // echo tinhTong();

    /*hàm không có tham số và có giá trị trả về */
    // function tinhTong(){
    //     $a = 5;
    //     $b = 10;
    //     $tong = $a + $b;
    //     // return $tong;
    // }

    /*hàm có tham số và không có giá trị trả về*/
    // function tinhTong($a,$b){
    //     $tong = $a + $b;
    // }
    // echo tinhTong(10,20);

    /* hàm có tham số và có giá trị trả về */ 
    // function tinhTong($a,$b){
    //     $tong = $a + $b;
    //     return $tong;
    // }
    // echo tinhTong(10,20);

    /*
        Tham số: giống như 1 biến để lưu trữ giá trị, được khai báo khi khởi tạo hàm
        Đối số: giá trị của tham số được truyền vào khi chúng ta gọi hàm
    */
    function showMessage($mess = 'check'){
        $result = '';
        if($mess == 'check'){
            $result = 'ok';
        }else{
            $result = 'not ok';
        }
        echo '<p>'.$result.'</p>';
    }
    showMessage('abc');


    /* Phạm vi của biến*/
    /*
        - biến cục bộ
            - được định nghĩa bên trong hàm
            - phạm vi hoạt động chỉ có hiệu lực bên trong hàm
        - biến toàn cục
            - được định nghĩa bên ngoài hàm
            - có thể sử dụng ở bất kỳ đâu trong chương trình
            - global: để lấy giá trị của 1 biến toàn cục và sử dụng trong 1 hàm
        - biến tĩnh
            - là biến cố định bên trong hàm
            - từ khóa khai báo static
    */
    $a = 5;
    function tinhTong(){
        global $a;
        $b = 10;
        $tong = $a + $b;
        return $tong;
    }
    echo $a;
    echo '<p>'. tinhTong().'</p>';

    function test(){
        static $diem = 0;
        $diem++;
        echo '<p>'.$diem.'</p>';
    }
    test();
    test();
    test();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
</body>
</html>