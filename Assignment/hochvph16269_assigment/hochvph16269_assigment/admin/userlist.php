<?php include_once "../classes/users_class.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách người dùng</title>
    <style>
        a{
            text-decoration: none;
            color: blue;
        }
        a:hover{
            text-decoration: underline;
            color: red;
        }
    </style>
</head>
<body>
    <?php
        $users = new users_class();
        if(isset($_GET['delid'])){
            $del = $users->del_user($_GET['delid']);
        }
        if(isset($del)) echo $del;
    ?>
    <table border="1" style="border-collapse: collapse; width: 700px;">
        <caption>Danh sách người dùng</caption>
        <tr>
            <th>ID</th>
            <th>Họ tên</th>
            <th>Email</th>
            <th>Xử lý</th>
        </tr>
        <?php
            $listusers = $users->show_users();
            if($listusers){
                while($row = $listusers->fetch_assoc()){
        ?>
                <tr>
                    <td><?php echo $row['adminId']; ?></td>
                    <td><?php echo $row['adminName']; ?></td>
                    <td><?php echo $row['adminEmail']; ?></td>
                    <td>
                        <a href="useredit.php?idEdit=<?php echo $row['adminId']; ?>">Sửa</a> | 
                        <a onclick="return confirm('Bạn có chắc chắn muốn xóa người dùng này hay không?');" href="?delid=<?php echo $row['adminId']; ?>">Xóa</a>
                    </td>
                </tr>
        <?php
                }
            }
        ?>
    </table>
    <a href="useradd.php">Thêm người dùng</a>
</body>
</html>