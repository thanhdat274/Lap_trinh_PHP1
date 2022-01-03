<?php 
    session_start();
    require_once 'db.php';




    if(isset($_POST['insert'])){
        $car_name = $_POST['car_name'];
        $car_price = $_POST['car_price'];
        $car_quantity = $_POST['car_quantity'];
        $car_description = $_POST['car_description'];
        $folder = "image/".basename($_FILES['car_image']['name']);
        $car_image = $_FILES['car_image']['name'];

       if(empty($car_name) || empty($car_price) ||empty($car_quantity) || empty($car_description)|| $_FILES['car_image']['size']==0 ){
           $_SESSION['mess'] =[
                "type" =>"danger",
                "content" =>"not empty,plz"
           ];
           header('location:add.php');
       }
        elseif($car_price < 0 || $car_quantity <0){
            $_SESSION['mess']=[
                "type" =>"danger",
                "content" =>"price & quanttty must be >0"
            ];
            header('location:add.php');
        }else{
            $query = "insert into cars(car_name,car_price,car_quantity,car_description,car_image) values(
                '$car_name','$car_price','$car_quantity','$car_description','$car_image')";
                $stmt = $conn->prepare($query);
                $stmt->execute();
                $_SESSION['mess']=[
                    "type" =>"success",
                    "content" =>"add new car"
                ];
                header('location:index.php');
                
        }

    }
    /*__________________________________ */
    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $car_name = $_POST['car_name'];
        $car_price = $_POST['car_price'];
        $car_quantity = $_POST['car_quantity'];
        $car_description = $_POST['car_description'];
     

        if(empty($car_name) || empty($car_price) ||empty($car_quantity) || empty($car_description) ){
            $_SESSION['mess'] =[
                 "type" =>"danger",
                 "content" =>"not empty,plz"
            ];
            header('location: '. $_SERVER['HTTP_REFERER']);
        }
        elseif($car_price < 0||$car_quantity <0){
            $_SESSION['mess']=[
                "type" =>"danger",
                "content" =>"price & quanttty must be >0"
            ];
            header('location: '. $_SERVER['HTTP_REFERER']);
        }else{
            $query = "update cars set car_name='$car_name',car_price='$car_price',car_quantity='$car_quantity',car_description='$car_description' where id=$id";
                $stmt = $conn->prepare($query);
                $stmt->execute();
                $_SESSION['mess']=[
                    "type" =>"success",
                    "content" =>"update new car"
                ];
                header('location:index.php');
                
        }

    }
?>