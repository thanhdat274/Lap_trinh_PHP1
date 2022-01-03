<?php
   
    $host = "localhost";
    $dbname = "we16301";
    $username = "root";
    $passdb = "";
    
    try{
        $conn = new PDO("mysql:host=$host; dbname=$dbname",$username,$passdb );
         $conn-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    }catch(PDOxception $e){
        echo "lỗi không thể kết nối dự liệu<br>";
        echo "thông tin lỗi" . $e->getMessage();
    }
    
?>