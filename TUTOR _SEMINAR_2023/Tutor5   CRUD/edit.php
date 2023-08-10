<?php
    require_once 'connection.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $title = $_POST['title'];
        $overview = $_POST['overview'];
        $release_date = $_POST['release_date'];
        $genre_id = $_POST['genre_id'];

        $movie_id = $_POST['movie_id'];
        $poster = $_POST['poster'];

        // Lấy dữ liệu file
        $file = $_FILES['poster'];

        if ($file['size'] > 0){

            $poster = $file['name'];
            
            // upload file
            move_uploaded_file($file['tmp_name'], "images/" . $poster);
        }
            
        // SQL INSERT
        $sql = "UPDATE movies SET title = '$title', poster = '$poster', overview = '$overview', release_date = '$release_date', genre_id = '$genre_id' WHERE movie_id = '$movie_id'";

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        setcookie('message', 'Cập nhật dữ liệu thành công', time()+1);
        header('Location: index.php');
        exit;
    }
// Lấy movie_id trên thanh URL
$movie_id = $_GET['movie_id'];

// Câu lệnh SQL với điều kiện movie_id
$sql = "SELECT * FROM movies WHERE movie_id = $movie_id";
$stmt = $conn->prepare($sql);
$stmt->execute();

$movie = $stmt->fetch(PDO::FETCH_ASSOC);

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
        <input type="hidden" name="movie_id" value="<?= $movie['movie_id'] ?>">
        Title: <input type="text" name="title" value="<?= $movie['title'] ?>"> <br><br>
        
        <input type="hidden" name="poster" value="<?= $movie['poster'] ?>">
        Poster: <input type="file" name="poster"> <br><br>
        <img src="images/<?= $movie['poster'] ?>" alt="">

        Overview: <textarea name="overview" id="" cols="100" rows="10">value="<?= $movie['overview'] ?>"</textarea> <br><br>
        Release Date: <input type="date" name="release_date" value="<?= $movie['release_date'] ?>"> <br><br>
        Genre <select name="genre_id" id="">
            <?php foreach ($genres as $g) { ?>
                <option value="<?php echo $g['genre_id'] ?>" 
                <?= ($g['genre_id']) == $movie['genre_id'] ? 'selected' : '' ?>>
                    <?php echo $g['genre_name']?>
                </option>
            <?php } ?>
        </select> <br><br>
        <button type="submit">Update</button>
        <a href="index.php">List</a>
    </form>
</body>
</html>