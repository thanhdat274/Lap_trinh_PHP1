
<?php
$product_id = $_GET['product_id'];
$connection = new PDO("mysql:host=127.0.0.1;dbname=cars;charset=utf8", "root", "");
$query = "delete from products where product_id=$product_id";
$stmt = $connection->prepare($query);
$stmt->execute();

header("location: list-product.php");
?>