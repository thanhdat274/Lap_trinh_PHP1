<?php 
    session_start();
    require_once 'db.php';
    $id= $_GET['id'];

    $query = "select * from cars where id=$id";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->fetch();
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


   <form method="post" action="function.php" enctype="multipart/form-data">

        <img src="image/<?php echo $result['car_image']?>" alt="">
        <input type="hidden" name="id" value="<?php echo $result['id']?>">
        
       <div class="form-group">
           <label for="my-input">name</label>
           <input id="my-input" class="form-control" type="text" name="car_name" value=" <?php echo $result['car_name']?>"  >
       </div>
       <div class="form-group">
           <label for="my-input">price</label>
           <input id="my-input" class="form-control" type="text" name="car_price"value="<?php echo $result['car_price']?>">
       </div>
       <div class="form-group">
           <label for="my-input">quantity</label>
           <input id="my-input" class="form-control" type="text" name="car_quantity" value="<?php echo $result['car_quantity']?>"  >
       </div>
       <div class="form-group">
           <label for="my-input">description</label>
           <textarea name="car_description" id="" cols="150" rows="5"><?php echo $result['car_description']?></textarea>
       </div>

        <button type="submit" class="btn btn-primary" name="update">save</button>
        <a href="index.php" class="btn btn-outline-primary"> previous</a>

   </form>



















</body>

</html>