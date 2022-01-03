<?php 
$news_id = $_GET['news_id'];
$conn = new PDO("mysql:host=127.0.0.1;dbname=datntph13533_examphp03;charset=utf8", "root", "");
$query = "delete from news where news_id=$news_id";
$stmt = $conn->prepare($query);
$stmt->execute();

header("location: list-new.php");
?>