<?php
    if (isset($_POST['upload'])) 
    {
        $file = $_FILES['image'];
        $typeArr = array('image/jpeg', 'image/png');
        if ($file['size'] == 0) {
            $message = 'Please select image';
        } else if (!in_array($file['type'], $typeArr)) {
            $message = 'Please select JPG or PNG';
        } else if ($file['size'] >= 1000000) {  // 1000000 BYTE = 1MB 
            $message = 'Max size 1MB';
        } else {
            $file_image = 'images/'.time().$file['name'];
            move_uploaded_file($_FILES["image"]["tmp_name"], $file_image);
            $image = basename($file_image);
            $message = 'Upload successfully file: ' . $image;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if (isset($message)): ?>
    <h1><?= $message; ?></h1>
    <?php endif; ?>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" accept="image/*" name="image">
        <button type="submit" name="upload">Submit</button>
    </form>
</body>
</html>