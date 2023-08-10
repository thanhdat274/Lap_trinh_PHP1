<?php
// Validate Name
function validateName($name)
{
    // Không được bỏ trống
    if (empty($name)) {
        return "Tên không được bỏ trống!";
    } else {
        // Ktra tên có ký tự đặc biệt hoặc số hay không
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            // preg_match: ktra và lấy thông tin từ chuỗi dữ liệu
            // =>>> để so sánh với dữ liệu nhập vào
            // =>>> trả về true khi 2 dữ liệu khớp nhau, ngược lại là false
            return "Tên chỉ được là chữ cái và khoảng trắng!";
            // "/.../": biểu thị bắt đầu và kết thúc BT chính quy
            // "^": đại diện cho vị trí bắt đầu
            // "[a-zA-Z ]":đại diện cho tất cả các ký tự
            // "*": đại diện cho việc ký tự đó có thể xuất hiện bao nhiêu lần
            // "$": đại diện cho vị trí kết thúc
        }
    }
    return "";
}

function validateEmail($email)
{
    if (empty($email)) {
        return "Email phải được nhập!";
    } else {
        // KT định dạng
        // filter_var: ktra và lọc các giá trị của biến thoe 1 bộ lọc cụ thể

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Email chưa đúng định dạng!";
        }
    }

    return "";
}

function validatePhone($phone)
{
    if (empty($phone)) {
        return "SĐT phải nhập!";
    } else {
        // đủ 10 số
        if (strlen($phone) != 10) {
            return "SĐT phải là 10 số!";
        }

        if (!preg_match("/^[0-9]*$/", $phone)) {
            return "SĐT chỉ được điền số!";
        }
    }
}

function validateBirthday($date)
{
    if (empty($date)) {
        return "Ngày phải nhập";
    } else {
        $today = date("Y-m-d");
        $diff = date_diff(date_create($date), date_create($today));

        //$diff = date_diff(date_create($birthday),date_create($today));: tạo 2 đối tượng DateTime
        // từ $birthday và $today bằng hàm date_create, sau đó tính toán sự chênh lệnh giữa 2 ngày bằng
        // cách sử dụng hàm date_diff() => gán cho $diff

        if ($diff->format('%y%') < 16) {
            return "Bạn quá trẻ để đăng ký nhé!";
        }
    }
    return "";
}

function validatePass($pass)
{
    if (empty($pass)) {
        return "MK phải nhập";
    } else {
        if (strlen($pass) < 8) {
            return "MK phải có nhiều hơn 8 ký tự!";
        }
    }
    return "";
}

function validateRePass($pass, $repass)
{
    if (empty($repass)) {
        return "Xác nhận MK phải được nhập";
    } else {
        if ($pass !== $repass) {
            return "Xác nhận MK không khớp";
        }
    }
    return "";
}



// Định nghĩa các biến thành rỗng
$name = $email = $phone = $birthday = $pass = $repass = $gender = $hobby = "";
$nameErr = $emailErr = $phoneErr = $birthErr = $passErr = $repassErr = $genderErr = $hobbyErr = "";


// $_SERVER["REQUEST_METHOD"]: để kiểm tra xem có 1 phương thức nào tồn tại hay không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ktra tên
    $name = $_POST["name"];
    $nameErr = validateName($name);

    // Email
    $email = $_POST['email'];
    $emailErr = validateEmail($email);

    // Số điện thoại
    $phone = $_POST['phone'];
    $phoneErr = validatePhone($phone);

    // Ngày sinh
    $birthday = $_POST['birthday'];
    $birthErr = validateBirthday($birthday);

    // Pass
    $pass = $_POST['password'];
    $passErr = validatePass($pass);

    // Xác nhận MK
    $repass = $_POST['repass'];
    $repassErr = validateRePass($pass, $repass);

    // Giới tính
    if (empty($_POST["gender"])) {
        $genderErr = "Giới tính không được để trống";
    } else
        $gender = $_POST["gender"];

    // Sở thích
    if (empty($_POST["hobby"])) {
        $hobbyErr = "Sở thích không được để trống";
    } else
        $hobby = $_POST["hobby"];
}
?>