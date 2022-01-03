<?php
include_once('./../connect_DB.php');
include_once("./../layout/start-admin.php");
include_once('./../functions.php');
$id = intval($_GET['id']);
$result = findByIdUser($id);
?>
<div class="content-wrapper">
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Quản Lý User</a></li>
            <li class="active">Thêm Mới User</li>
        </ol>
    </section>
    <section class="content">
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Update User</h3>
                </div>
                <form role="form" action="update.php" method="POST">
                    <input type="hidden" name = "id" value = "<?php echo $result['id'] ?>">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Tài Khoản*</label>
                            <input type="text" class="form-control" id="username" required name ="username" value="<?php echo $result['tai_khoan'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Mật Khẩu*</label>
                            <input type="password" class="form-control" id="password" required name= "password" value="<?php echo $result['mat_khau'] ?>">
                        </div>
                    </div>
                    
                    <div class="box-footer-group">
                    <div class="box-footer">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                    <div class="box-footer">
                        <a href="<?php echo $website ?>/admin/users/list-user.php" class="btn btn-primary"></i> Quay Lại</a>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<?php
  include_once("./../layout/end-admin.php");
?>