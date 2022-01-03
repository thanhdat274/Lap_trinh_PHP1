<?php 
    session_start();
    require_once 'db.php';
    $id = $_GET['id'];

                 $query = "delete from cars where id=$id";
                $stmt = $conn->prepare($query);
                $stmt->execute();

                $_SESSION['mess']=[
                    "type" =>"success",
                    "content" =>"delete car success"
                ];
                header('location:index.php');
?>