<?php
include_once('./../connect_DB.php');
include_once('./../layout/start-admin.php');
include_once('./../functions.php');
$id = intval($_GET['id']);
$result = findByIdProduct($id);
?>
<div class="content-wrapper">
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Quản Lí Sản Phẩm</a></li>
            <li class="active">Update Sản Phẩm</li>
        </ol>
    </section>
    <section class="content">
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Thêm mới Sản Phẩm</h3>
                    <span style="color: red">
                        <?php
                            if(isset($_SESSION['error'])){
                                echo $_SESSION['error'];
                                unset($_SESSION['error']);
                            }
                        ?>
                    </span>
                </div>
                <form role="form" action="update.php" enctype="multipart/form-data" method="POST">
                    <input type="hidden" name = "id" value = "<?php echo $result['id'] ?>">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên*</label>
                            <input type="text" class="form-control" name="ten" required value="<?php echo $result['ten'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số Lượng*</label>
                            <input type="number" class="form-control" name="so_luong" required value="<?php echo $result['so_luong'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá Bán*</label>
                            <input type="number" class="form-control" name="gia" required value="<?php echo $result['gia'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">File Ảnh*</label><br>
                            <input type="image" src="<?php echo $result['anh'] ?>" alt="" width="50"height="60">
                            <input type="file" class="form-control" name="anh" id="" required accept="image/png, image/jpg">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Trạng Thái*</label>
                            <select class="custom-select custom-select-lg mb-3" name="trang_thai">
                                <option value="1" <?php echo $result['trang_thai'] == 1 ? "selected" : "" ?>>Còn Hàng</option>
                                <option value="2" <?php echo $result['trang_thai'] == 2 ? "selected" : "" ?>>Hết Hàng</option>
                            </select>
                        </div>
                        <div class="box-footer-group">
                            <div class="box-footer">
                                <input type="submit" name="btn-add" class="btn btn-primary" value="Update">
                            </div>
                            <div class="box-footer">
                            <a href="<?php echo $website ?>/admin/home/home-admin.php" class="btn btn-primary"><i class="glyphicon glyphicon-home"></i> Trang chủ</a>                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<?php
include_once('./../layout/end-admin.php');
?>