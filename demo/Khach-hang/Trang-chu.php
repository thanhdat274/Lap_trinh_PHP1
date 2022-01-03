<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="../css/Trang-chu.css">
    <link href='https://css.gg/shopping-cart.css' rel='stylesheet'>
    <link rel="stylesheet" href="font-icon/fontawesome-free-5.15.3-web/fontawesome-free-5.15.3-web/css/all.min.css">
</head>

<body>
    <?php
    session_start();
    $cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
    $connection = new PDO("mysql:host=127.0.0.1;dbname=asm_php1;charset=utf8", "root", "");
    $query = "select * from product";
    $stmt = $connection->prepare($query);
    $stmt->execute();
    $products = $stmt->fetchAll();
    ?>
    <div class="wrapper">
        <header>
            <div class="logo">
                <img src="anh/logo-mi2-150x150.png">
            </div>
            <div class="nav">
                <nav>
                    <ul id="main">
                        <li><a href="../QuanlyUser/Dangnhap.php">Đăng nhập</a><span>/</span><a href="">Đăng kí</a></li>
                        <li><a href="">Liên hệ</a></li>
                        <li><a href="http://localhost:81/L%E1%BA%ADp-tr%C3%ACnh-PHP1/demo/Khach-hang/cart.php?id=8">Giỏ hàng <i class="fas fa-cart-plus"></i> <?php echo count($cart);?></a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <div class="content">
            <div class="danhmuc">
                <ul>
                    <li><a href="#">SMARTPHONES ></a></li>
                    <li><a href="#">XE ĐIỆN & XE CÂN BẰNG ></a></li>
                    <li><a href="#">THIẾT BỊ GIA ĐÌNH ></a></li>
                    <li><a href="#">QUẠT & MÁY LỌC KHÔNG KHÍ ></a></li>
                    <li><a href="#">NHÀ CỬA & GIA DỤNG ></a></li>
                    <li><a href="#">ROBOT & MÁY HÚT BỤI ></a></li>
                    <li><a href="#">MÁY LỌC NƯỚC</a></li>
                    <li><a href="#">PHỤ KIỆN ÔTÔ ></a></li>
                    <li><a href="#">SẠC & PIN DỰ PHÒNG ></a></li>
                    <li><a href="#">THIẾT BỊ ÂM THANH ></a></li>
                    <li><a href="#">THỜI TRANG XIAOMI ></a></li>
                </ul>
            </div>

            <div class="slideshow-container">

                <div class="mySlides fade">
                    <a href="#"> <img src="slide show/anh1.jpg" height="500px"></a>
                </div>
                <div class="mySlides fade">
                    <a href="#"> <img src="slide show/anh2.jpg" height="500px"></a>
                </div>

                <div class="mySlides fade">
                    <a href="#"> <img src="slide show/anh3.jpg" height="500px"></a>
                </div>

                <div class="mySlides fade">
                    <a href="#"> <img src="slide show/anh4.jpg" height="500px"></a>
                </div>
                <div class="mySlides fade">
                    <a href="#"> <img src="slide show/anh5.jpg" height="500px"></a>
                </div>
                <div class="mySlides fade">
                    <a href="#"> <img src="slide show/anh6.jpg" height="500px"></a>
                </div>
                <div class="mySlides fade">
                    <a href="#"></a> <img src="slide show/anh7.jpg" height="500px"></a>
                </div>
                <div class="mySlides fade">
                    <a href="#"> <img src="slide show/anh8.jpg" height="500px"></a>
                </div>

                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
        </div>
        <section>
                <p>SẢN PHẨM</p>
            </section>
        <div class="box-tong">
            <?php foreach ($products as $item) : ?>
                <div class="box-sp">
                    <p id="anh"><img src="../QuanlySp/image/<?php echo $item['productImage']; ?>" alt="" class="anh"></p>
                    <p class="ten"><?php echo $item['productName']; ?></p>
                    <p class="gia"><?php echo number_format($item['productPrice'], 0, ".", ","); ?>đ</p>
                    <button type="submit" name="submit"><a href="cart.php?id=<?php echo $item['id'];?>">Mua hàng</a></button>
                </div>
            <?php endforeach ?>
        </div>
        <footer>
                <p>Nguyễn Thành Đạt PH13533</p>
        </footer>
    </div>

    <!-- phần script -->
    <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");

            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slides[slideIndex - 1].style.display = "block";
        }
    </script>
</body>

</html>