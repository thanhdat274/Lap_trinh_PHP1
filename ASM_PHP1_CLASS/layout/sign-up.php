
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>

    <div class="auth-wrapper">
        <div class="auth-background"></div>
        <div class="auth-container">
            <form class="auth-form" action="sign.php" method="post">
                <div class="auth-form--title">
                    <h1>Đăng Kí Tài Khoản Mới</h1>
                </div>
                <div class="auth-form--body">
        
                    <div class="mb-3">
                        <label for="name">Tài Khoản</label>
                        <input type="text" class="form-control" name="tai_khoan" required id="name" placeholder="John Snowwhite">
                    </div>
                    <div class="mb-3">
                        <label for="password">Mật Khẩu</label>
                        <input type="password" class="form-control" name="mat_khau" required id="password1" placeholder="******">
                    </div>
                    <button type="submit" class="btn btn-blue mb-3" name="register">Đăng Kí</button>
                    <a href="login.php" class="btn btn-dark">
                        Đăng Nhập
                        <img src="https://www.nicepng.com/png/full/9-97633_right-arrow-white-png-right-arrow-png-white.png" class="btn-icon" style="margin-left: 1rem;width: 20px;height: 18px;"/>
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>