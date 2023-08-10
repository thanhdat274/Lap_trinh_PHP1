<?php
    require_once 'connection.php';

    // Câu lệnh SQL lấy dữ liệu bảng genres
    $sql = "SELECT * FROM genres";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $genres = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $title = $_POST['title'];
        $overview = $_POST['overview'];
        $release_date = $_POST['release_date'];
        $genre_id = $_POST['genre_id'];

        // Lấy dữ liệu file
        $file = $_FILES['poster'];
        $poster = $file['name'];

        // upload file
        move_uploaded_file($file['tmp_name'], "images/" . $poster);

        // SQL INSERT
        $sql = "INSERT INTO movies (title, poster, overview, release_date, genre_id) VALUES
        ('$title', '$poster', '$overview', '$release_date', '$genre_id')";

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        setcookie('message', 'thêm dữ liệu thành công', time()+1);
        header('Location: index.php');
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Film</title>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        Title: <input type="text" name="title"> <br><br>
        Poster: <input type="file" name="poster"> <br><br>
        Overview: <textarea name="overview" id="" cols="100" rows="10"></textarea> <br><br>
        Release Date: <input type="date" name="release_date"> <br><br>
        Genre <select name="genre_id" id="">
            <?php foreach ($genres as $g) { ?>
                <option value="<?php echo $g['genre_id'] ?>"><?php echo $g['genre_name']?></option>
            <?php } ?>
        </select>
        <button type="submit">Add</button>
        <a href="index.php">List</a>
    </form>
</body>
</html>