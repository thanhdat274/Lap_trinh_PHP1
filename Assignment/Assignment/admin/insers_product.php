<?php
require_once "connect.php";
    if(isset($_POST['btnAdd'])){
        $name_products = $_POST['name_products'];
        $file = $_FILES['images'];
        $price = $_POST['price'];
        $hot_sale = $_POST['hot_sale'];
        $price_old = $_POST['price_old'];

        if($file['size'] > 0){
            $images = $file['name'];
            move_uploaded_file($file['tmp_name'],"../images_data/". $images);
        }else{
            $images = "";
        }
       if(!empty($name_products) && !empty($price) && !empty($hot_sale) && !empty($price_old)){
            //sql

            try{
                    $sql = "INSERT INTO products(name_products,images,price,hot_sale,price_old) VALUES(:name_products,:images,:price,:hot_sale,:price_old)";
                    //CHUẨN BỊ

                    $stmt = $conn->prepare($sql);
                    //truyền thm số
                    $stmt ->bindParam(':name_products',$name_products);
                    $stmt ->bindParam(':images',$images
                );
                    $stmt ->bindParam(':price',$price);
                    $stmt ->bindParam(':hot_sale',$hot_sale);
                    $stmt ->bindParam(':price_old',$price_old);
                    // thực thi

                    $stmt->execute();
                    $message = "Thêm thành công";
            
                }catch(\Throwble $th){

                }
       }else{
           $message1 = "Vui lòng nhập đầy đủ dữ liệu";
       }
    
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
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
                        <h3>Thêm sản phẩm</h3>
                    </div>
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="text" name="name_products" placeholder="Nhập tên sản phẩm"><br>
                        <input class="avatar" type="file" name="images" placeholder="images sản phẩm" value="ảnh sản phẩm"><br>
                        <input type="text" name="hot_sale" placeholder="Nhập % khuyến mại" ><br>
                        <input type="text" name="price_old" placeholder="Nhập giá gốc"><br>
                        <input type="text" name="price" placeholder="Nhập giá sản phẩm"><br>
                        <button type="submit" class="btnAdd" name="btnAdd">thêm</button>
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