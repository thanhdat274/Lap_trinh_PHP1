<?php
require_once "connect.php";
    if(isset($_POST['btnAdd'])){
        $name_products = $_POST['name_products'];
        $id = $_POST['id'];
        $file = $_FILES['images'];
        $price = $_POST['price'];
        $hot_sale = $_POST['hot_sale'];
        $price_old = $_POST['price_old'];

        if($file['size'] > 0){
            $images = $file['name'];
            move_uploaded_file($file['tmp_name'],"../images_data/". $images);
        }else{
            $images = $_POST['thumb_images'];
        }
       if(!empty($name_products) && !empty($price)){
            //sql

        try{
            $sql = "UPDATE products SET name_products=:name_products,hot_sale=:hot_sale,price_old=:price_old,images=:images,price=:price WHERE id=:id";
            //CHUẨN BỊ

            $stmt = $conn->prepare($sql);
            //truyền thm số
            $stmt ->bindParam(':name_products',$name_products);
            $stmt ->bindParam(':images',$images);
            $stmt ->bindParam(':price',$price);
            $stmt ->bindParam(':hot_sale',$hot_sale);
            $stmt ->bindParam(':price_old',$price_old);
            $stmt ->bindParam(':id',$id);
           
            // thực thi

            $stmt->execute();
            $message = "Sửa thành công";
            
        }catch(\Throwble $th){

        }
       }else{
           $message1 = "Vui lòng nhập đầy đủ dữ liệu";
       }
    
       
    }
    $id = $_GET['id'];
       //sql
       $sql = "SELECT * FROM products WHERE id = $id";
       //chuẩn bị
       $stmt = $conn->prepare($sql);
       //thực thi
       $stmt->execute();
       //lấy dữ liệu bản ghi
       $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa sản phẩm</title>
    <link rel="stylesheet" href="../css/insers_product.css">
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
<body>

    <div class="container">
   <header>
            <div class="title-adm">
                <h3>Xin chào Admin</h3>
            </div>
        <div class="product-log">
            <nav>
                <ul id="main">
                    <li><a href="../KhachHang/index.php"><i class="fas fa-home"></i> Trang chủ</a></li>
                    <li><a href="login.php"><i class="fas fa-power-off"></i> Đăng xuất</a></li>
                </ul>
            </nav>
        </div>
        </header>
        <main class="content">
            <div class="product-content">
                <div class="title-admin">
                    <h3>Menu Admin</h3>
                </div>
                <div class="product-adm">
                <a href="insers_product.php">Thêm sản phẩm</a><br>
                        <hr>
                    <a href="product_list.php">Sản phẩm</a><br>
                    <hr>
                    <a href="">Đơn hàng</a><br>
                    <hr>
                    <a href="">Tin tức</a>
                    <hr>
                </div>
            </div>
   
            <div class="product-add">
                <div class="error_product">
                    <?php
                        
                        if(isset($message1)){
                            echo "<h5>$message1</h5>";
                        }
                        
                    ?>
                    <div class="success_product">
                        <?php
                            if(isset($message)){
                                echo "<h5>$message</h5>";
                            }
                        ?>
                    </div>
                </div>
                <div class="product-add-item">
                    <div class="title-product-inserts">
                        <h3>Sửa sản phẩm</h3>
                    </div>
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?=$user['id']?>">
                        <input type="text" name="name_products" placeholder="Nhập tên sản phẩm" value="<?=$user['name_products']?>"><br>
                        <input type="hidden" name="thumb_images" value="<?=$user['images']?>">
                        <input class="avatar" type="file" name="images" value="ảnh sản phẩm" ><br>
                        <!-- hiển thị avatar -->
                        <img src="../images_data/<?=$user['images']?> "width="160" ><br>
                        <input type="text" name="hot_sale" placeholder="Nhập % khuyến mại" value="<?=$user['hot_sale']?>"><br>
                        <input type="text" name="price_old" placeholder="Nhập giá gốc" value="<?=$user['price_old']?>"><br>
                        <input type="text" name="price" placeholder="Nhập giá sản phẩm" value="<?=$user['price']?>"><br>
                        <button type="submit" class="btnAdd" name="btnAdd">Sửa</button>
                    </form>
                </div>
            </div>
        </main>
        <!--  -->
        <footer>
            <p>Thiết kế by Đinh Đức Dương</p>
        </footer>
    </div>
</body>
</html>