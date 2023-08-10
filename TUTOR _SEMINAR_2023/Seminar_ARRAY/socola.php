<?php
    $socolaBasic = [
        'red',
        'yellow',
        'green',
        'brown',
        'pink',
        'pink'
    ];

    // ăn scl -> xóa phần tử trong mảng 

    // ăn scl cuối cùng -> xóa phần tử cuối cùng
    // array_pop($socolaBasic);

    // ăn scl đầu tiên -> xóa phần tử đầu tiên
    // array_shift($socolaBasic);

    // ăn scl ở vị trí bất kì -> xóa phần tử ở vị trí bất kì
    // unset($socolaBasic[2]);
    // array_splice($socolaBasic, 2, 2);

    // Thêm socola -> Thêm phần tử vào mảng
    // Thêm vào cuối : 
    // array_push($socolaBasic, 'Aqua');

    // Thêm vào đầu:
    // array_unshift($socolaBasic, 'gray');

    // Tìm sô cô la -> Tìm phần tử
    // array_search($socolaBasic, "yellow");

    // Nhặt ra mỗi loại 1 vị
    $socolaU = array_unique($socolaBasic);

    $socolaBasic1 = [
        'yellow',
        'red',
        'pink',
        'brown',
        'green',
        'pink',
    ];

    // Hợp mảng
    $socolaM = array_merge($socolaBasic, $socolaBasic1);

    // Đếm số phần tử trong mảng
    count($socolaBasic);


    if (isset($_GET['an'])){
        if (!empty($_GET['vitri']) || $_GET['vitri'] == 0){
            if (empty($_SESSION['index']) || !isset($_SESSION['index'])) {
                $_SESSION['vitri'] = [$_GET['vitri']];
                unset($socolaBasic[$_GET['vitri']]);
            }else {
                $_SESSION['index'][] = $_GET['vitri'];
                foreach ($_SESSION['index'] as $index => $item) {
                    unset($socolaBasic[$item]);
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/socola.css">
</head>
<body>

<div class="container">
    <h1>SoCoLa</h1>
    <form action="" method="GET">
        <input type="text" name="vitri" placeholder="Nhập vị trí">
        <div class="button-group">
            <input type="submit" name="an" value="Ăn">
            <input type="submit" name="huy" value="Hủy">
        </div>
    </form>
    <div class="row">
        <?php foreach ($socolaBasic as $key => $value) { ?>
            <div class="square-container">
                <span><?php echo $key ?></span>
                <div class="square" style="<?php echo 'background-color: ' . $value ?>"></div>
            </div>
        <?php } ?>
    </div>
    <div class="row">
        <?php foreach ($socolaU as $key => $value) { ?>
            <div class="square-container">
                <span><?php echo $key ?></span>
                <div class="square" style="<?php echo 'background-color: ' . $value ?>"></div>
            </div>
        <?php } ?>
    </div>
    <div class="row">
        <?php foreach ($socolaM as $key => $value) { ?>
            <div class="square-container">
                <span><?php echo $key ?></span>
                <div class="square" style="<?php echo 'background-color: ' . $value ?>"></div>
            </div>
        <?php } ?>
    </div>
    <span> Mảng có số phần tử là: <?php echo count($socolaBasic) ?></span>
</div>
</body>
</html>
