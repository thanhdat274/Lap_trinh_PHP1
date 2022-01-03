<?php
    require_once "connect.php";
   if (isset($_GET['id'])) {
       $id = $_GET['id'];
   }

   $sql = "DELETE FROM products WHERE id = $id";
   $stmt = $conn->prepare($sql);
    $stmt -> execute();
    echo "xóa thành công dữ liệu";
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    header("location: product_list.php");
?>