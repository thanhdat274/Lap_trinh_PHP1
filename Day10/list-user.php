<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            width: 50%;
        }
        th{
            background-color: black;
            color: white;
        }
    </style>
</head>
<body>
    <?php
        $connection = new PDO("mysql:host=127.0.0.1;dbname=we16301;charset=utf8","root","");
        /*
            PDO: PHP Data Object là 1 class cung cấp các phương thức để kết nối và truy xuất DB
        */ 
        $query = "select * from user";
        $stmt = $connection->prepare($query);
        /*
            -> dùng để truy cập vào phương thức
            prepare() : phương thức chuẩn bị 1 câu lệnh SQL
        */ 
        $stmt->execute();
        $users = $stmt->fetchAll();
        // echo '<pre>';
        // var_dump($users);

        // var_dump($users[0]);
        // echo $users[0]['username'];
        // echo $users[0]['password'];
    ?>
    <div>Thông tin tài khoản</div>
    <p><a href="add-user.php">Thêm mới user</a></p>
    <table>
        <thead>
            <tr>
                <th>Username</th>
                <th>Password</th>
            </tr>
        </thead>
        <tbody>
            <!-- <tr>
                <td><?php echo $users[0]['username'];?></td>
                <td><?php echo $users[0]['password'];?></td>
            </tr>
            <tr>
                <td><?php echo $users[1]['username'];?></td>
                <td><?php echo $users[1]['password'];?></td>
            </tr>
            <tr>
                <td><?php echo $users[2]['username'];?></td>
                <td><?php echo $users[2]['password'];?></td>
            </tr> -->
            <?php foreach($users as $u):?>
                <tr>
                    <td><?php echo $u['username'];?></td>
                    <td><?php echo $u['password'];?></td>
                </tr>
            <?php endforeach?>
        </tbody>
    </table>
</body>
</html>