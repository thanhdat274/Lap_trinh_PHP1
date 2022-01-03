<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- <?php
    // if (isset($_POST['gender'])) {
    //     echo $_POST['gender'];
    // }
    // if(isset($_POST['thach'])){
    //     echo $_POST['thach'];
    //     if(isset($_POST['tran-chau'])){
    //         echo $_POST['tran-chau'];
    //         if(isset($_POST['duong-den'])){
    //             echo $_POST['duong-den'];
    //         }
    //     }
    // }
    // if(isset($_POST['topping'])){
    //     $toppings = $_POST['topping'];
    //     foreach($toppings as $item){
    //         echo '<br>';
    //         echo $item;
    //     }
    // }
    // if(isset($_POST['car'])){
    //     echo $_POST['car'];
    // }
    ?> -->
    <!-- <form action="" method="POST">
        <div>
            <input type="text" name="fullname" id="" placeholder="Fullname">
        </div>
        <div>
            <input type="radio" name="gender" id="" value="Nam">Nam
            <input type="radio" name="gender" id="" value="Nu">Nu
        </div>
        <div>
            <input type="checkbox" name="topping[]" id="" value="Thach">Thach
            <input type="checkbox" name="topping[]" id="" value="Tran chau">Tran chau
            <input type="checkbox" name="topping[]" id="" value="Duong den">Duong den
        </div>
        <div>
            <select name="car" id="">
                <option value="Toyota">Toyota</option>
                <option value="Audi">Audi</option>
                <option value="Vinfast">Vinfast</option>
            </select>
        </div>
        <input type="submit" name="btn-submit" id="" value="Submit">
    </form> -->


    <?php
    $admins = array(
        'username' => 'abc',
        'password' => 'abc'
    );
    $errorMessage = array(); //khai báo mảng chứa thông báo lỗi 
    $users = array();   //  khai báo mảng để chứa thông tin của user
    if (isset($_POST['btn-submit'])) {    //kiểm tra xem form đã được submit hay chưa
        $users['username'] = isset($_POST['username']) ? $_POST['username'] : '';
        /*
                sử dụng toán tử 3 ngôi kiểm tra xem username đã được nhập hay chưa
                nếu đúng thì trả về giá trị của username
                nếu sai thì trả về chuỗi rỗng
                sau đó gán kết quả trả về cho $users['username']
           */
        $users['password'] = isset($_POST['password']) ? $_POST['password'] : '';
        /*
                sử dụng toán tử 3 ngôi kiểm tra xem password đã được nhập hay chưa
                nếu đúng thì trả về giá trị của password
                nếu sai thì trả về chuỗi rỗng
                sau đó gán kết quả trả về cho $users['password']
           */
        if ($users['username'] == '') {    //kiểm tra xem username có trống hay không
            $errorMessage['username'] = 'Ban khong duoc de trong Username';
            //thêm thông báo lỗi cho key username
        }
        if ($users['password'] == '') { // kiểm tra xem password có trống hay không
            $errorMessage['password'] = 'Ban khong duoc de trong Password';
            //thêm thông báo lỗi cho key password
        }
    }
    ?>
    <form action="index.php" method="POST">
        <div>
            <input type="text" name="username" id="" placeholder="Username">
            <div>
                <?php echo isset($errorMessage['username']) ? $errorMessage['username'] : ''; ?>
                <!-- kiểm tra thông báo lỗi cho username có tồn tại hay không
                    nếu có thì hiển thị thông báo, ngược lại thì không hiển thị gì
                -->
            </div>
        </div>
        <div>
            <input type="password" name="password" id="" placeholder="Password">
            <div>
                <?php echo isset($errorMessage['password']) ? $errorMessage['password'] : ''; ?>
                <!-- kiểm tra thông báo lỗi cho password có tồn tại hay không
                    nếu có thì hiển thị thông báo, ngược lại thì không hiển thị gì
                -->
            </div>
        </div>
        <div>
            <input type="submit" name="btn-submit" id="" value="Đăng nhập">
        </div>
    </form>
</body>

</html>