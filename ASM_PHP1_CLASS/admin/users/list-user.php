<?php
include_once("./../layout/start-admin.php");
include_once("./../functions.php");
$result = getSelectUser();
?>
<div class="content-wrapper">
    
    <section class="content-header">
        <h1>
            Thông Tin User
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Quản Lý User</a></li>
            <li class="active">Danh Sách User</li>
        </ol>
    </section>
    <section class="content">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <a href="add-user.php" class="btn btn-success">+Thêm mới User</a>

                    <div class="box-tools">
                        <form action="http://localhost/ASM_PHP1_CLASS/admin/users/find-user.php" class="input-group input-group-sm" style="width: 150px;" method="POST">
                            <input type="text" name="search-id" class="form-control pull-right"placeholder="Search ID">
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Tên</td>
                                <td>Mật Khẩu</td>
                                <td colspan="2">Thao Tác</td>
                            </tr>
                        </thead>

                        <tbody>
                            <?php for($i = 0; $i < count($result); $i++) {?>
                                <tr>
                                    <td>
                                        <br>
                                        <?php echo $result[$i]['id']?>
                                    </td>
                                
                                   
                                    <td>
                                        <br>
                                        <?php echo $result[$i]['tai_khoan']?>
                                    </td>
                                    <td>
                                        <br>
                                        <?php echo $result[$i]['mat_khau']?>
                                    </td>
                                    
                                    <td>
                                        <br>
                                        <a href="http://localhost/ASM_PHP1_CLASS/admin/users/update-user.php?id=<?php echo $result[$i]['id']?>" class="btn btn-success">Update</a>
                                        <a href="http://localhost/ASM_PHP1_CLASS/admin/users/delete-user.php?id=<?php echo $result[$i]['id']?>" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        <tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
<?php
include_once("./../layout/end-admin.php");
?>
