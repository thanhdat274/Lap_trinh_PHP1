<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $sql = "SELECT * FROM sanpham WHERE maSP ='".$id."' ";
            $result = $db ->query($sql);
            $rs = $result->fetch();
        }
    
    ?>
</body>
</html>