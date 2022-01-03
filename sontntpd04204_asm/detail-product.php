<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="CSS/detail-product.css" />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"
    />
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  </head>
  <body>
    <!-- Start Product  -->
      <?php
        require_once ('connect.php');
        require_once ('category.php');
        require_once ('detail.php');
        
        $sql = "SELECT * FROM sanpham WHERE maPhanLoai = 'DT' ORDER BY maSP DESC ";
        $result = $db ->query($sql);
      ?>
    
    <!-- End Product -->

    <div class="container">
      <header>
        <div class="top-container">
          <div class="logo"><img src="image/logo.jpg" /></div>
          <div class="input">
            <form action="">
              <input type="text" placeholder="&nbsp;&nbsp;Tìm kiếm sản phẩm ..." />
              <i class="fa fa-search fa-lg" aria-hidden="true"></i>
            </form>
          </div>
          <div class="login">
            <a href="#"
              ><i class="far fa-bell"></i> Thông báo</a
            >
            <a href="#">
            <i class="far fa-question-circle"></i> Trợ
              giúp</a
            >
            <!--
              Check đăng nhập
             -->
            <?php
              session_start();
              if(!isset($_SESSION['username'])){
            ?>
            <a href="add-kh.php">Đăng ký</a> |
            <a href="login.php">Đăng nhập</a>
              <?php } else { ?>
            <a href="add-kh.php" style = "display:none">Đăng ký</a> |
            <a href="login.php" style = "display:none">Đăng nhập</a>
            <a href="#"><i class="far fa-smile-beam"></i> Xin chào: <span style = "font-size: 17px"><?php echo $_SESSION['username'] ?></span></a>
            <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
            <a href="list-cart.php"><i class="fas fa-shopping-cart fa-lg"></i></a>
              <?php } ?>
          </div>
        </div>
        <div class="menu">
          <ul>
            <li><a href="index.php">TRANG CHỦ</a></li>
            <li><a href="#">GIỚI THIỆU</a></li>
            <li><a href="#">SẢN PHẨM</a></li>
            <li><a href="#">TIN TỨC</a></li>
            <li><a href="#">LIÊN HỆ</a></li>
          </ul>
        </div>
      </header>
      <nav>
        <div class="slide">
          <div class="dieuhuong">
            <i
              class="fa fa-chevron-circle-left"
              aria-hidden="true"
              onclick="Back()"
            ></i>
            <i
              class="fa fa-chevron-circle-right"
              aria-hidden="true"
              onclick="Next()"
            ></i>
          </div>
          <div class="chuyen-slide">
            <img src="image/banner1.png" alt="nav" width="100%" />
            <img src="image/banner2.png" alt="nav" width="100%" />
            <img src="image/banner3.png" alt="nav" width="100%" />
          </div>
        </div>
      </nav>
      <main>
        <div class="grid-container">
        <div class="vmenu">
            <p>DANH MỤC</p>
              <div class="div">
                <ul>
                  <?php
                    $count1 = 0;
                    while($rs1 = $result1 ->fetch()){
                      $count1++;
                  ?>
                    <li><a href="index.php?maPhanLoai=<?php echo $rs1['maPhanLoai'] ?>"><?php echo $rs1['tenPhanLoai'] ?></a></li>
                  <?php } ?>
                </ul>
                </div>
            </div>
            <article>
              <p class="tilte">CHI TIẾT SẢN PHẨM</p>
              <div class="container-grid">
                <!--Hình ảnh -->
                <div class="img">
                  <img src="images/<?php echo $rs['hinhAnh'] ?>" width = "100%">
                </div>
                <!-- Thông tin sản phẩm -->
                <div class ="info-product">
                <form action="" method ="post">
                 <!--  Gía sản phẩm -->
                  <p class = "price-product">
                    GIÁ ĐẶC BIỆT <br>
                    <?php echo number_format($rs['donGia']) ?> đ
                  </p>
                 <!--  Giao hàng  -->
                  <p class="delivery">
                  <i class="fas fa-truck"></i>&nbsp;&nbsp;GIAO HÀNG TRONG 1 GIỜ 63 TỈNH THÀNH
                  </p>
                    <!-- Khuyến mãi -->
                  <p class="promotion">
                    Khuyến mãi đặc biệt (SL có hạn)
                  </p>
                 <!--  Thông tin khuyến mãi -->
                  <p class="info-promotion">
                      <span style= "color: #cc0000; font-weight:bolder">Giá đặc biệt đến ngày 01/09/2020: <?php echo number_format($rs['donGia']) ?> đ</span><br><br>
                      <span style = "line-height: 25px">+ Trả góp 0%, trả trước 0% thẻ tín dụng <br>
                            + Tặng phiếu mua hàng 100.000đ khi mua phụ kiện <br>
                            + Ưu đãi phòng chờ hạng thương gia <br>
                            + Giảm 40% cho lần mua hàng tiếp theo <br>
                            <span style="font-weight: bolder">Bảo hành mở rộng</span><br>
                            + Giảm ngay 10% khi mua gói bảo hành chính hãng mở rộng 24 tháng chỉ còn 1,155,000 đ
                    </span>
                    </p>
                    <!-- Nút mua hàng -->
                    <p class="buynow">
                      <a href="addCart.php?maSP=<?php echo $rs['maSP'] ?>">MUA NGAY <br>
                      <span style = "font-size: 14px; font-weight: lighter">Giao hàng trong 1 giờ hoặc nhận tại Shop</span>
                    </a>
                </p>
                <p style= "text-align: center">Gọi <span style = "color: #d0021b">1800-0909</span> để được tư vấn mua hàng ( Miễn phí )</p>
                </div>
                </form>
              </div>
            </article>
        </div>
            <div class="quangcao">
              <img src="image/bannergiamgia.jpg" alt="" width="100%"> <br>
              <img src="../ASS/image/banner.jpg" alt="" width="100%">
            </div>
      </main>
<footer>
    <div class="infomation">
        <div>
            <ul>
                <li><a href="#">Giới thiệu về công ty</a></li>
                <li><a href="#">Câu hỏi thường gặp khi mua hàng</a></li>
                <li><a href="#">Chính sách bảo mật</a></li>
                <li><a href="#">Quy chế hoạt động</a></li>
                <li><a href="#">Kiểm tra hóa đơn điện tử</a></li>
                <li><a href="#">Tra cứu thông tin bảo hành</a></li>
            </ul>
        </div>
        <div>
            <ul>
                <li><a href="#">Tin tuyển dụng</a></li>
                <li><a href="#">Tin khuyến mãi</a></li>
                <li><a href="#">Hướng dẫn mua online</a></li>
                <li><a href="#">Hướng dẫn mua trả góp</a></li>
                <li><a href="#">Chính sách trả góp</a></li>
            </ul>
        </div>
        <div>
            <ul>
                <li><a href="#">Hệ thống cửa hàng</a></li>
                <li><a href="#">Hệ thống bảo hành</a></li>
                <li><a href="#">Kiểm tra hàng Apple chính hãng</a></li>
                <li><a href="#">Giới thiệu máy đổi trả</a></li>
                <li><a href="#">Chính sách đổi trả</a></li>
            </ul>
        </div>
        <div>
            <ul>
                <li><a href="#" style="color: black;">Tư vấn mua hàng miễn phí</a></li>
                <li><a href="#" style="color: #cc0000;">0909109109</a></li>
                <li><a href="#" style="color: black;">Hỗ trợ thanh toán</a></li>
                <li>
                    <a href="#">
                        <img src="image/visa.png" width="30%" height="45px">
                        <img src="image/master.jpg" width="30%" height = "45px">
                        <img src="image/JCB.jpg" width="30%" height="50px">
                    </a>
                </li>
            </ul>
        </div>
    </div>
</footer>
<div class="end-container">
    <p>© 2007 - 2020 Công Ty Cổ Phần Bán Lẻ Kỹ Thuật Số BiShop / Địa chỉ: 82 Nguyễn Lương Bằng - Liên Chiểu - Đà Nẵng / GPĐKKD số 0311609355 do Sở KHĐT ĐN cấp ngày 08/03/2012. GP số 47/GP-TTĐT do sở TTTT TP ĐN cấp ngày 02/07/2018. Điện thoại: 0909109109. Email: bishop@gmail.com.vn. Chịu trách nhiệm nội dung: Phan Văn Phong.</p>
</div>
    </div>
    <script src="JS/sildeshow.js"></script>
  </body>
</html>
