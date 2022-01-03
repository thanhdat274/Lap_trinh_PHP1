<?php 
    session_start();
    require_once 'db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php if(isset($_SESSION['mess'])):?>
        <div class="alert alert-<?php echo $_SESSION['mess']['type']?>">
            <?php echo $_SESSION['mess']['content']?>
        </div>
    <?php endif;?>
    <?php unset($_SESSION['mess'])?>
    
    <a href="add.php" class="btn btn-outline-primary">+ add new car</a>

   <form method="post" action="function.php" enctype="multipart/form-data">
       <div class="form-group">
           <label for="my-input">image</label>
           <input id="my-input" class="form-control" type="file" name="car_image">
       </div>
       <div class="form-group">
           <label for="my-input">name</label>
           <input id="my-input" class="form-control" type="text" name="car_name">
       </div>
       <div class="form-group">
           <label for="my-input">price</label>
           <input id="my-input" class="form-control" type="text" name="car_price">
       </div>
       <div class="form-group">
           <label for="my-input">quantity</label>
           <input id="my-input" class="form-control" type="text" name="car_quantity">
       </div>
       <div class="form-group">
           <label for="my-input">description</label>
           <textarea name="car_description" id="" cols="150" rows="5"></textarea>
       </div>

        <button type="submit" class="btn btn-primary" name="insert">save</button>
        <a href="index.php" class="btn btn-outline-primary"> previous</a>



   </form>



















</body>

</html>