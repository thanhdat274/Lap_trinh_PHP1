<?php
include_once('./start-user.php');
include_once('./../admin/functions.php');
$result = getSelectProduct();
?>


<section class="home" id="home"><section class="home" id="home">

<div class="slide-container active">
    <div class="slide">
        <div class="content">
            <h3>Giày nike metcon</h3>
            <span>màu đỏ</span><br>
        </div>
        <div class="image">
            <img src="images/home-shoe-1.png" class="shoe" alt="">
            <img src="images/home-text-1.png" class="text" alt="">
        </div>
    </div>
</div>

<div class="slide-container">
    <div class="slide">
        <div class="content">
            <h3>Giày nike metcon</h3>
            <span>màu xanh</span><br>
        </div>
        <div class="image">
            <img src="images/home-shoe-2.png" class="shoe" alt="">
            <img src="images/home-text-2.png" class="text" alt="">
        </div>
    </div>
</div>

<div class="slide-container">
    <div class="slide">
        <div class="content">
            <h3>Giày nike metcon</h3>
            <span>màu vàng</span><br>
        </div>
        <div class="image">
            <img src="images/home-shoe-3.png" class="shoe" alt="">
            <img src="images/home-text-3.png" class="text" alt="">
        </div>
    </div>
</div>

<div id="prev" class="fas fa-chevron-left" onclick="prev()"></div>
<div id="next" class="fas fa-chevron-right" onclick="next()"></div>

</section>

<section class="service">

    <div class="box-container">

        <div class="box">
            <i class="fas fa-shipping-fast"></i>
            <h3>Giao hàng nhanh</h3>
            <p>Bảng Giá Liên Vùng và Liên Vùng Tỉnh, Cước Phí Ưu Đãi</p>
        </div>

        <div class="box">
            <i class="fas fa-undo"></i>
            <h3>Hỗ trợ đổi trả</h3>
            <p>Hỗ Trợ Đổi Trả Miễn Phí Trong Vòng 10 Ngày Kể Từ Khi Nhận Hàng</p>
        </div>

        <div class="box">
            <i class="fas fa-headset"></i>
            <h3>tư vấn 24/7</h3>
            <p>Hệ Thống Tư Vấn, Hỗ Trợ Khách Hàng Miễn Phí 24/7</p>
        </div>

    </div>

</section>

<section class="products" id="products">

    <h1 class="heading"> Sản Phẩm <span>Mới Nhất</span> </h1>

    <div class="box-container">
        <?php if (empty($result)){
        } else {
            for($i = 0; $i < count($result); $i++){
                if($result[$i]['trang_thai'] == 1 && $result[$i]['so_luong'] > 0){

        ?>
        <div class="box">
            <img src="<?php echo $result[$i]['anh'] ?>" class="shoe" alt="">
            <div class="content">
                <h3><?php echo $result[$i]['ten'] ?></h3>
                <div class="price"><?php echo $result[$i]['gia'] ?>VNĐ</div>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <a href="./../layout/cart.php?id=<?php echo $result[$i]['id']?>" class="btn" style="border: 2px solid #000;padding: 10px">Thêm vào giỏ Hàng</a>
            </div>
        </div>
        <?php
                } else {

                }
            }
        }
        ?>  
    </div>

</section>

<section class="featured" id="featured">

        <h1 class="heading"> <span> Sản Phẩm </span> Nổi Bật </h1>

        <div class="row">
            <div class="image-container">
                <div class="small-image">
                    <img src="images/f-img-1.1.png" class="featured-image-1" alt="">
                    <img src="images/f-img-1.2.png" class="featured-image-1" alt="">
                    <img src="images/f-img-1.3.png" class="featured-image-1" alt="">
                    <img src="images/f-img-1.4.png" class="featured-image-1" alt="">
                </div>
                <div class="big-image">
                    <img src="images/f-img-1.1.png" class="big-image-1" alt="">
                </div>
            </div>
            <div class="content">
                <h3>Giày Nike</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta facilis praesentium odit voluptas illum iure libero quis fuga commodi. Autem.</p>
                <div class="price">2.499.000 <span>3.040.000</span></div>
            </div>
        </div>

        <div class="row">
            <div class="image-container">
                <div class="small-image">
                    <img src="images/f-img-2.1.png" class="featured-image-2" alt="">
                    <img src="images/f-img-2.2.png" class="featured-image-2" alt="">
                    <img src="images/f-img-2.3.png" class="featured-image-2" alt="">
                    <img src="images/f-img-2.4.png" class="featured-image-2" alt="">
                </div>
                <div class="big-image">
                    <img src="images/f-img-2.1.png" class="big-image-2" alt="">
                </div>
            </div>
            <div class="content">
                <h3>Giày Nike</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta facilis praesentium odit voluptas illum iure libero quis fuga commodi. Autem.</p>
                <div class="price">1.399.000 <span>2.099.000</span></div>
            </div>
        </div>

        <div class="row">
            <div class="image-container">
                <div class="small-image">
                    <img src="images/f-img-3.1.png" class="featured-image-3" alt="">
                    <img src="images/f-img-3.2.png" class="featured-image-3" alt="">
                    <img src="images/f-img-3.3.png" class="featured-image-3" alt="">
                    <img src="images/f-img-3.4.png" class="featured-image-3" alt="">
                </div>
                <div class="big-image">
                    <img src="images/f-img-3.1.png" class="big-image-3" alt="">
                </div>
            </div>
            <div class="content">
                <h3>Giày Nike</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta facilis praesentium odit voluptas illum iure libero quis fuga commodi. Autem.</p>
                <div class="price">1.599.000 <span>2.240.000</span></div>
            </div>
        </div>

    </section>


<?php
include_once('./end-user.php');
?>