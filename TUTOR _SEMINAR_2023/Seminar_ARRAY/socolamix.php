<?php
    $socolaMix = [
        [
            'vi' => 'matcha',
            'mau' => 'green',
            'duong' => ['gray', 20],
            'cacao' => ['brown', 30]
        ],
        [
            'vi' => 'dau',
            'mau' => 'pink',
            'duong' => ['gray', 40],
            'cacao' => ['brown', 30]
        ]
        ];

    if (isset($_GET['capnhap'])){
        $type = $_GET['type'];
        $giatri = $_GET['giatri'];
        $vitri = $_GET['vitri'];

        $socolaMix[$vitri][$type][1] = $giatri;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh Sô-cô-la</title>
    <link rel="stylesheet" href="css/cocolamix.css">
</head>
<body>
<div class="container">
    <h1>SoCoLa Mix</h1>
    <form action="" method="GET" class="chocolate-form">
        <div class="form-group">
            <label for="vitri">Vị trí:</label>
            <input type="number" id="vitri" name="vitri">
        </div>
        <div class="form-group">
            <label for="giatri">Giá trị:</label>
            <input type="text" id="giatri" name="giatri">
        </div>
        <div class="form-group">
            <label for="type">Loại:</label>
            <select id="type" name="type">
                <option value="duong">Đường</option>
                <option value="cacao">cacao</option>
            </select>
        </div>
        <input type="submit" name="capnhap" value="Cập Nhập">
    </form>

    <div class="chocolate-bar">
        <?php foreach ($socolaMix as $key => $value) { ?>
        <div class="chocolate-piece">
            <span class="number"><h1><?php echo $key ?></h1></span>
            <div class="chocolate-color"><?php echo $value['vi'] ?></div>
            <div class="chocolate-color" style="height: 100%; background: <?php echo $value['mau'] ?>"> Màu: <?php echo $value['mau'] ?></div>
            <div class="chocolate-color" style="height: <?php echo $value['duong'][1] . "%"; ?>; background: <?php echo $value['duong'][0] ?>">Đường: <?php echo $value['duong'][1] . "%" ?></div>
            <div class="chocolate-color" style="height: <?php echo $value['cacao'][1] . "%"; ?>; background: <?php echo $value['cacao'][0] ?>">Cacao: <?php echo $value['cacao'][1] . "%" ?></div>
        </div>
        <?php } ?>
    </div>
</body>
</html>