<?php include_once "../config/config.php"; ?>
<?php
class database{
    public $host = DB_HOST;
    public $user = DB_USER;
    public $pass = DB_PASS;
    public $dbname = DB_NAME;

    public $link;
    public $error;
    public function __construct(){
        $this->connectDB();
    }
    //Phương thức kết nối CSDL
    public function connectDB(){
        $this->link = new mysqli($this->host,$this->user,$this->pass,$this->dbname);
        mysqli_set_charset($this->link,'UTF8');
        if(!$this->link){
            $this->error = "Lỗi kết nối: " .$this->link->connect_error;
            return false;
        }
    }
    //Phương thức dùng để Select dữ liệu
    public function select($query){
        $result = $this->link->query($query);
        if($result->num_rows > 0) return $result;
        else return false;
    }
    //Phương thức dùng để Insert, Update, Delete dữ liệu
    public function exec($query){
        $result = $this->link->query($query);
        if($result) return $result;
        else false;
    }
}
?>