<?php
require_once "../admin/connect.php";
$sql = "SELECT * FROM products";
$stmt = $conn->prepare($sql);
$stmt->execute();
//lấy dữ liệu
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/indexx.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <title>Home Page</title>
</head>

<body>
    <div class="container">
        <header>
            <div class="logo">
                <img src="../images/image 5.png">
            </div>
            <nav class="menu">
                <ul id="main">
                    <li><a href="">Watches</a></li>
                    <li><a href="">Eyewear</a></li>
                    <li><a href="">Accessories</a></li>
                    <li><a href="">News</a></li>
                </ul>
            </nav>
            <div class="bag">

                <a href="bag_product.php"><i class="fas fa-cart-plus"></i></a>
                <a href="login_kh.php"><i class="fas fa-user-circle"></i></a>
            </div>
        </header>
        <section class="banner">
            <div class="banner-img">
                <img src="../images/image 6.png">
            </div>
            <div class="banner-hidden">
                <div class="banner-text">
                    <div class="banner-title">
                        <a href="">WAY KAMBAS MINI EBONY</a>
                    </div>
                    <p>MATOA Way Kambas - This wood is chosen to represent the Sumatran Rhino's skin which is designed with an overlap effect on its strap to represent Rhino's skin.</p>
                    <div class="more-banner">
                        <a href="">Discover</a>
                    </div>

                </div>
                <div class="add-car-banner">
                    <a href=""><i class="fas fa-cart-plus"></i>Add to cart </a>
                </div>
            </div>
        </section>
        <main class="content">
            <section class="content-item">
                <article class="content-item-no">
                    <div class="content-title">
                        <a href="">Luxurious Eyewear</a>
                        <p>See the beauty of exotic world with the luxurious glasses</p>
                        <div class="content-more">
                            <a href="">Discover Now</a>
                            <hr>
                        </div>
                    </div>
                    <div class="content-img">
                        <img src="../images/image 7.png">
                    </div>
                </article>
                <article class="content-item-no">
                    <div class="content-title">
                        <a href="">Comfortable Watches</a>
                        <p>Feels the balancing function and beauty in our wooden watches</p>
                        <div class="content-more">
                            <a href="">Discover Now</a>
                            <hr>
                        </div>
                    </div>
                    <div class="content-img">
                        <img src="../images/image 8.png">
                    </div>
                </article>
            </section>
            <!--  -->

            <section class="title-technno">
                <h3>Monthly Deals</h3>
            </section>
            <section class="techno">
                <div class="techno-content">
                    <?php foreach ($result as $row) : ?>
                        <article class="techno-item">
                            <div class="techno-img">
                                <img src="../images_data/<?php echo $row['images'] ?>">
                            </div>
                            <div class="techno-text">
                                <a href=""><?php echo $row['name_products'] ?></a>
                                <p><?= number_format($row['hot_sale'], 0, ",", ".") ?> %</p>
                                <del><?= number_format($row['price_old'], 0, ",", ".") ?> $</del>
                                <h5><?= number_format($row['price'], 0, ",", ".") ?> $</h5>
                                <div class="add-car-techno">
                                    <a href="bag_product.php"><i class="fas fa-cart-plus"></i>Add to cart </a>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; ?>
                    <div class="nexttrang">
                        <?php
                        $product_all = $conn->query($sql);
                        $product_count = $product_all->rowCount();
                        $product_but = ceil($product_count / 4);
                        $i = 1;
                        echo '<p>Trang: </p>';
                        for ($i = 1; $i <= $product_but; $i++) {
                            echo '<a style="margin:0 5px;" href="index.php?pages=' . $i . '">' . $i . '</a>';
                        }

                        ?>

                    </div>
                </div>
                <div class="title-news">
                    <h3>Recent News</h3>
                </div>
                <div class="techno-news">
                    <div class="news-text">
                        <p>Where To Travel</p>
                        <a href="">Matoa Where To Travel? Yogyakarta</a>
                        <div class="more-news">
                            <a href="">Discover</a>
                        </div>
                    </div>
                    <div class="news-img">
                        <img src="../images/image 13.png">
                    </div>
                </div>
            </section>
        </main>
        <!--  -->
        <footer class="footer">
            <div class="footer-top">
                <section class="pay-top">
                    <img src="../images/image 25.png">
                    <img src="../images/image 26.png">
                    <img src="../images/image 27.png">
                    <img src="../images/image 28.png">
                    <img src="../images/image 29.png">
                </section>
                <section class="pay-buttom">
                    <img src="../images/image 32.png">
                    <img src="../images/image 33.png">
                    <img src="../images/image 34.png">
                    <img src="../images/image 35.png">
                    <img src="../images/image 36.png">
                </section>
            </div>
            <div class="footer-buttom">
                <div class="footer-contact">
                    <div class="footer-text">
                        <a href="" class="footer-img"><img src="../images/image 5.png"></a>
                        <p class="add">Address</p>
                        <p>Store & Office
                            Jl. Setrasari Kulon III, No. 10-12, Sukarasa, Sukasari, Bandung, Jawa Barat, Indonesia 40152</p>
                        <h4 class="title-h4">Office Hour</h4>
                        <p>Monday - Sunday
                            10.00 - 18.00</p>
                    </div>
                    <div class="footer-text">
                        <h3>Get in touch</h3>
                        <p class="text-p">Phone: 022-20277564</p>
                        <p class="text-p1">Service Center: 0811-233-8899</p>
                        <p class="text-p2">Customer Service: 0811-235-9988</p>
                        <a href=""><i class="fab fa-facebook"></i></a>
                        <a href=""><i class="fab fa-instagram"></i></a>
                        <a href=""><i class="fab fa-twitter"></i></a>
                        <a href=""><i class="fab fa-youtube"></i></a>
                    </div>
                    <div class="footer-text">
                        <h3>Useful Link</h3>
                        <div class="footer-link">
                            <a href="">Warranty & Complaints</a><br>
                            <a href="">Order & Shipping</a><br>
                            <a href="">Tracking Order</a><br>
                            <a href="">About Us</a><br>
                            <a href="">Repair</a><br>
                            <a href="">Terms</a><br>
                            <a href="">FAQ</a>
                        </div>
                    </div>
                    <div class="footer-text">
                        <h3>Campaign</h3>
                        <div class="footer-link">
                            <a href="">Mengenal Arti Cukup</a><br>
                            <a href="">Tell Your Difference</a><br>
                            <a href="">Waykambas</a><br>
                            <a href="">Rebrand</a><br>
                            <a href="">Gallery</a><br>
                            <a href="">Singo</a><br>
                            <a href="">Rakai</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>