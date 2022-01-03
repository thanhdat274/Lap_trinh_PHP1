<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Dangki.css">
</head>

<body>
    <div class="wraper">
        <div class="left">
            <img src="anh/image 1.png" class="anh">
        </div>
        <div class="right">
            <div class="hop">
                <h1>Registration an account</h1>
                <form action="Thong-tin-DK.php" method="POST">
                    <label>Email</label><br>
                    <input type="email" name="Email" id="Email" placeholder="Email" required ><br>
                    <label>Passwwrd</label><br>
                    <input type="password" name="pass" id="pass" placeholder="Password" required ><br>
                    <input type="submit" name="Registration" id="Registration" value="Registration now"> 
                </form>
            </div>
        </div>
    </div>
</body>

</html>