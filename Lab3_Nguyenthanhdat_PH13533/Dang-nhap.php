<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Lab3.css">
</head>

<body>
    <div class="wraper">
        <div class="left">
            <img src="anh/image 1.png" class="anh">
        </div>
        <div class="right">
            <div class="hop">
                <h3>Welcome back</h3>
                <h1>Login to your account</h1>
                <form action="Thong-tin-DN.php" method="POST">
                    <label>Email</label><br>
                    <input type="email" name="Email" id="Email" placeholder="Email" ><br>
                    <label>Passwwrd</label><br>
                    <input type="password" name="pass" id="pass" placeholder="Password" ><br>
                    <div class="remember">
                        <span class="checkbox1">
                            <label class="checkbox"><input type="checkbox" name="" id="check" >Remember me</label>
                        </span>
                        <div class="forgot">
                            <h6><a href="#">Forgot Password?</a></h6>
                        </div>
                    </div>
                    <input type="submit" name="Login" id="Login" value="Login now">
                    <input type="submit" name="Login-Gmail" id="Login-Gmail" value="G Or sign-in with google">
                </form>
                <p>Don't have an account? <a href="Dang-ki.php">Join free today</a></p>
            </div>
        </div>
    </div>
</body>

</html>