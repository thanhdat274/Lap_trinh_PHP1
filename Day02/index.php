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
        echo "hello";
        #comment
        //comment
        /*
            line1
            line2
            line3
        */

        /*-------- Biến -------*/
        /*
            là đại lượng sinh ra để chứa giá trị
            giá trị của biến có thể thay đổi được

            quy tắc khai báo biến
                - khai báo bằng ký tự $
                - biến được phân biệt bởi chữ hoa và chữ thường
                - tên biến bắt đầu bằng chữ cái hoặc dấu gạch dưới
        */
        $_name = "sontv";
        $Name = "thienth";
        $chuVi;

        echo $Name;

        /*-------- Hằng -------*/
        /*
            là đại lượng sinh ra để chứa giá trị
            giá trị của hằng không thể thay đổi được
            cú pháp:
                define('tên hằng','giá trị của hằng');
        */
        define('dienTich','500');


        /*-------- Biểu thức và toán tử -------*/
        /*
            Biểu thức: tập hợp của các toán tử và toán hạng
            toán tử: các phép toán + - * / ... 
            toán hạng: là những giá trị mà các phép toán thực hiện trên nó

            - toán tử gán: = += -= *= /= -- ++ %= 
            - toán tử số học: + - * / %
            - toán tử quan hệ: == != > < >= <=
            - toán tử logic: && ||  !
        */

        /*-------- câu lệnh rẽ nhánh -------*/
        /*
            - form lệnh if đứng 1 mình
            - form lệnh if else
            - form lệnh if else if
        */

        $dtb = 5;
        if($dtb > 5){
            echo "Điểm trung bình lớn hơn 5";
        }else if($dtb < 5){
            echo "Điểm trung bình nhỏ hơn 5";
        }else{
            echo "Điểm trung bình bằng 5";
        }
    ?>
    <div>Username: <?php echo $Name?></div>
    <div>Diện tích: <?php echo dienTich?></div>
</body>
</html>