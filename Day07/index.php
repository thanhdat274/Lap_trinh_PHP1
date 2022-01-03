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
        /* Mảng */ 
        /* 
            Mảng thông thường: key : value
                các key được tự động gán khi khởi tạo mảng
        */ 
        // $products = array("iPhone12","Samsung Galaxy","Xiao Mi Mi11 Lite");
        // echo '<pre>';
        // var_dump($products);
        // foreach($products as $item){
        //     echo '<pre>';
        //     echo $item;
        // }
        // echo '<pre>';
        // echo $products[2];
        // echo "Hiển thị phần tử trong mảng sử dụng for: ";
        // for($index = 0;$index< count($products);$index++){
        //     echo '<pre>';
        //     echo $products[$index];
        // }

        /*
            Mảng định danh
        */ 
        // $newProducts = array(
        //     "apple" => "iPhone12",
        //     "samsung" => "Samsung Galaxy",
        //     "xiao mi" => "Xiao Mi Mi11 Lite"
        // );
        // echo '<pre>';
        // var_dump($newProducts);
        // echo $newProducts["apple"];
        // echo $newProducts["xiao mi"];
        // foreach($newProducts as $key=>$value){
        //     echo '<pre>';
        //     echo $key .": ". $value;
        // }
        /* một số hàm xử lý mảng thông dụng */ 
        $numbers = array(1,2,3,4,5);
        
        /* Thêm phần tử vào đầu mảng 
            array_unshift(tên mảng, giá trị 1, giá trị 2...)
        */ 
        // array_unshift($numbers,100);
        // echo '<pre>';
        // var_dump($numbers);

        /* Thêm phần tử vào cuối mảng 
            array_push(tên mảng, )
        */ 
        // echo '<pre>';
        // echo "Mảng gốc: ";
        // var_dump($numbers);

        // array_push($numbers, 55,66);
        // echo "Mảng sau khi đã thêm phần tử: ";
        // var_dump($numbers);

        /* Thêm phần tử vào vị trí bất kỳ 
            array_splice(tên mảng, vị trí cần thêm, số phần tử xóa đi tính từ vị trí cần thêm, giá trị thêm vào)
        */ 
        // echo '<pre>';
        // echo "Mảng gốc: ";
        // var_dump($numbers);
        // array_splice($numbers,2,0,33);
        // echo "Mảng sau khi đã thêm phần tử: ";
        // var_dump($numbers);

        /* Xóa phần tử ở vị trí đầu tiên 
            array_shift(tên mảng)
        */ 
        // echo '<pre>';
        // echo "Mảng gốc: ";
        // var_dump($numbers);
        // array_shift($numbers);
        // echo "Mảng sau khi đã xóa phần tử: ";
        // var_dump($numbers);

        /* Xóa phần tử ở vị trí cuối cùng
            array_pop(tên mảng)
        */ 
        // echo '<pre>';
        // echo "Mảng gốc: ";
        // var_dump($numbers);
        // array_pop($numbers);
        // echo "Mảng sau khi đã xóa phần tử: ";
        // var_dump($numbers);

        /* Xóa phần tử ở vị trí bất kỳ 
            unset(tên mảng[key])
        */ 
        echo '<pre>';
        echo "Mảng gốc: ";
        var_dump($numbers);
        unset($numbers[3]);
        echo "Mảng sau khi đã xóa phần tử: ";
        var_dump($numbers);

        $newProducts = array(
            "apple" => "iPhone12",
            "samsung" => "Samsung Galaxy",
            "xiao mi" => "Xiao Mi Mi11 Lite"
        );
        unset($newProducts["xiao mi"]);
        var_dump($newProducts);
        $numbers["vsmart"] = "joy1";
        
        array_push($numbers,50);
        var_dump($numbers);
    ?>
</body>
</html>