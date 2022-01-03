<?php include_once "../lib/database.php"; ?>
<?php
class users_class{
    public $db;
    public function __construct(){
        $this->db = new database();
    }
    //Phương thức login
    public function login($email,$pass){
        $query = "Select * from tbl_users where adminEmail='$email' and adminPass='$pass' limit 1";
        $result = $this->db->select($query);
        if($result){
            $row = $result->fetch_assoc();
            //Thiết lập session tại đây
            $_SESSION['isLogin'] = true;
            $_SESSION['name'] = $row['adminName'];
            //------------------------
            header("Location:index.php");
        }
        else return "Sai email hoặc mật khẩu";
    }
    //Phương thức hiển thị bảng người dùng
    public function show_users(){
        $query = "Select * from tbl_users order by adminId desc";
        return $this->db->select($query);
    }
    //Phương thức xóa người dùng
    public function del_user($id){
        $query ="Delete from tbl_users where adminId = '$id'";
        $result = $this->db->exec($query);
        if($result) return "Xóa người dùng thành công";
        else return "Xóa người dùng không thành công";
    }
    //Phương thức sửa người dùng
    public function update_user($adminName,$id){
        $query ="Update tbl_users set adminName='$adminName' where adminId='$id'";
        $result = $this->db->exec($query);
        if($result) return "Cập nhật thông tin người dùng thành công";
        else return "Không cập nhật thành công";
    }
    //Phương thức thêm người dùng
    public function insert_user($adminName,$adminEmail,$adminPass){
        $query ="Insert into tbl_users(adminName,adminEmail,adminPass) values('$adminName','$adminEmail','$adminPass')";
        $result = $this->db->exec($query);
        if($result) return "Thêm người dùng thành công";
        else return "Không thêm thành công";
    }
}
?>