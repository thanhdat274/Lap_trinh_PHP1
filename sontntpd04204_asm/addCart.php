<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="CSS/index.css" />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"
    />
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">  
  </head>
  <body>
    <!-- Start Product  -->
      <?php
        require_once ('connect.php');
        
        $sql = "SELECT * FROM sanpham WHERE maPhanLoai = 'DT' ORDER BY maSP DESC ";
        $result = $db ->query($sql);

        // danh mục phân loại
        $sql1 = "SELECT * FROM phanloai";
        $result1 = $db ->query($sql1);

        // Điều kiện hiển thị
        if(isset($_GET['maPhanLoai'])){
          $maPhanLoai = $_GET['maPhanLoai'];
          $sql = "SELECT * FROM sanpham JOIN phanloai ON sanpham.maPhanLoai = phanloai.maPhanLoai WHERE phanloai.maPhanLoai = '".$maPhanLoai."' ORDER BY sanpham.maSP DESC ";
          $result = $db ->query($sql);
          }
      ?>
    <!-- End Product -->
        
    <!-- Shopping cart -->
    <?php
    session_start();
        require_once ('connect.php');
        if(isset($_GET['maSP'])){
            $maSP = $_GET['maSP'];
            
            $sql = "SELECT * FROM sanpham WHERE maSP = '".$maSP."' ";
            $result = $db ->query($sql);
            $rs = $result->fetch();

            if(!empty($_SESSION['cart'])){
                $cart = $_SESSION['cart'];
                // Kiểm tra lần thứ 2 mua hàng đã có id phần tử mảng hay chưa dùng hàm array_key_exists
                    if(array_key_exists($maSP,$cart)){
                        $cart[$maSP] = array(
                            "sl" => (int)$cart[$maSP]["sl"]+1,
                            "price" =>$rs[4],
                            "name" =>$rs[1]
                            
                        );
                    }else{
                        $cart[$maSP] = array(
                            "sl" =>1,
                            "price" =>$rs[4],
                            "name" =>$rs[1]
                            
                        );
                    }
            }else{
                // Lần đầu tiên mua hàng
                $cart[$maSP] = array(
                    "sl" =>1,
                    "price" =>$rs[4],
                    "name" =>$rs[1]
                    
                );
            }
            $_SESSION['cart'] = $cart;

        }else{
            
        }
        header('location: list-cart.php');
    ?>
    <!-- End Shopping cart -->
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
              if(!isset($_SESSION['username'])){
            ?>
            <a href="add-kh.php">Đăng ký</a> |
            <a href="login.php">Đăng nhập</a>
              <?php } else { ?>
            <a href="add-kh.php" style = "display:none">Đăng ký</a> |
            <a href="login.php" style = "display:none">Đăng nhập</a>
            <a href="#"><i class="far fa-smile-beam"></i> Xin chào: <span style = "font-size: 17px"><?php echo $_SESSION['username'] ?></span></a>
            <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
            <a href="list-product.php"><i class="fas fa-shopping-cart fa-lg"></i></a>
              <?php } ?>
          </div>
        </div>
        <div class="menu">
          <ul>
            <li><a href="#">TRANG CHỦ</a></li>
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
                <hr style="margin-top: -18px; background-color: #cc0000; height: 1px; border:none;">
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
            <article>
              <p class="tilte">THÔNG TIN SẢN PHẨM</p>
                <div class="container-grid">
                <?php 
                  $count = 0;
                  while($rs = $result->fetch()){
                    $count++;
                ?>
                  <div class="item-product">
                    <img src="images/<?php echo $rs['hinhAnh'] ?>" width="250px">
                    <span class="name-product"><?php echo $rs['tenSP'] ?></span> <br>
                    <span class="price-product" ><?php echo number_format($rs['donGia']) ?> đ</span> <br>
                    <span class="mota"><?php echo $rs['moTa'] ?></span><br>
                    <button class="buy"><a href="detail-product.php?id=<?php echo $rs['maSP'] ?>">MUA NGAY</a></button>
                    <button class="sosanh"><a href="detail-product.php?id=<?php echo $rs['maSP'] ?>">CHI TIẾT</a></button>
                  </div>
                  <?php } ?>
                </div>
            </article>
        </div>
            <div class="quangcao">
              <img src="image/bannergiamgia.jpg" alt="" width="100%">
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
