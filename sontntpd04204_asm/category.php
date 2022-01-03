<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
          require_once ('connect.php');
          $sql1 = "SELECT * FROM phanloai";
          $result1 = $db ->query($sql1);
        ?>
</body>
</html>