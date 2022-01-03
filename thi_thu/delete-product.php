<?php
$car_id = $_GET['car_id'];
$conn = new PDO("mysql:host=127.0.0.1;dbname=datntph13533_examphp02;charset=utf8", "root", "");
$query = "delete from cars where car_id=$car_id";
$stmt = $conn->prepare($query);
$stmt->execute();

header("location: list-product.php");
?>
