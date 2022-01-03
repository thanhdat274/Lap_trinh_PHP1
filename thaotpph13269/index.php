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

    <table class="table">
        <thead>
            <tr>
                <th>image</th>
                <th>name</th>
                <th>quantity</th>
                <th>price</th>
                <th>description</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            <?php   
                $query = "select * from cars";
                $stmt = $conn->prepare($query);
                $stmt->execute();
                $cars = $stmt->fetchAll();
                foreach($cars as $c):
            ?>
            <tr>
                <td scope="row"><img src="image/<?php echo $c['car_image']?>" alt=""></td>
                <td><?php echo $c['car_name']?></td>
                <td><?php echo $c['car_price']?></td>
                <td><?php echo $c['car_quantity']?></td>
               
                <td><?php echo $c['car_description']?></td>
                <td>
                    <a href="update.php?id=<?php echo $c['id']?>" class="btn btn-primary">update</a>
                    <a href="delete.php?id=<?php echo $c['id']?>" class="btn btn-danger" onclick="if(confirm('delete?')){return true;}else{event.stopPropagation();event.preventDefault();}">delete</a>
                </td>
                <?php  endforeach;?>
                
            </tr>
        </tbody>
    </table>



















</body>

</html>