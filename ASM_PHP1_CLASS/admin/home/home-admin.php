<?php
include_once('./../layout/start-admin.php');
include_once('./../functions.php');
$admin = getSelectAdmin();
$user = getSelectUser();
$product = getSelectProduct();
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1 style="text-align: center; font-size: 30px; margin: 30px;">
            Thông Tin
        </h1>
    </section>

    <section style="margin: 0 auto; max-width: 1000px">
    <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; grid-gap: 30px">
        <a href="./../admins/list-admin.php" class="btn btn-default"><span style="font-size: 20px;">Có <br> <?php echo count($admin)?> Quản Trị Viên</span></a>
        <a href="./../users/list-user.php" class="btn btn-default"><span style="font-size: 20px;">Có <br> <?php echo count($user)?> Quản Khách Hàng</span></a>
        <a href="./../goods/list-product.php" class="btn btn-default"><span style="font-size: 20px;">Có <br> <?php echo count($product)?> Sản Phẩm</span></a>
    </div>
    

    </section>
</div>

<?php
include_once('./../layout/end-admin.php');
?>