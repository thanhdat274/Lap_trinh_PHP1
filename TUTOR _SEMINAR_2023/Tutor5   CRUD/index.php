<?php
    require_once 'connection.php';

    if (!isset($_COOKIE['username'])){
        header('Location: login.php');
        die;
    }

    // Câu lệnh SQL Select
    $sql = "SELECT m.*, genre_name FROM movies m JOIN genres g ON m.genre_id = g.genre_id";

    // Chuẩn bị câu lệnh truy vấn
    $stmt = $conn->prepare($sql);

    // Thực thi
    $stmt->execute();

    // Lấy dữ liệu dạng mảng ( FETCH_ASSOC : Lấy 1 mảng liên kết có cả key và value)
    $movies = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách phim</title>
</head>
<body>
    <div class="" style="color: green;">
        <?= $_COOKIE['message'] ?? '' ?>
    </div>

    <?php if (isset($_SESSION['username'])) { ?>
        WELCOME <b><?= $_COOKIE['username'] ?>
        <a href="logout.php">Log out</a>
    <?php } ?>
    

    <table border="1">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Poster</th>
        <th>Overview</th>
        <th>Release date</th>
        <th>Genres name</th>
        <th>
            <a href="add.php">Add</a>
        </th>
    </tr>
    <?php foreach($movies as $m) { ?> 
        <tr>
            <td><?php echo $m['movie_id'] ?></td>
            <td><?php echo $m['title'] ?></td>
            <td>
                <img src="images/<?php echo $m['poster'] ?>" width="100" alt="">
            </td>
            <td><?php echo $m['overview'] ?></td>
            <td><?php echo $m['release_date'] ?></td>
            <td><?php echo $m['genre_id'] ?></td>
            <td>
                <a href="edit.php?id=<?php echo $m['movie_id'] ?>">Sửa</a>
                <a onclick="return confirm('Bạn có muốn xóa không ?')" href="delete.php?id=<?php echo $m['movie_id'] ?>">Xóa</a>
            </td>
        </tr>
    <?php } ?>
    </table>
    <script>
    </script>
</body>
</html>