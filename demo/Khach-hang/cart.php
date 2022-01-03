<?php
session_start();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$action = (isset($_GET['action'])) ? $_GET['action'] : 'vg';
//    echo "<pre>";
//    var_dump($action);
//    die();
//    session_destroy();
$connection = new PDO("mysql:host=127.0.0.1;dbname=asm_php1;charset=utf8", "root", "");
$query = "select * from product where id=$id";
$stmt = $connection->prepare($query);
$stmt->execute();
$product = $stmt->fetch();
//    echo "<pre>";
//    var_dump($product);
$item = [
    'id' => $product['id'],
    'productName' => $product['productName'],
    'productPrice' => $product['productPrice'],
    'productImage' => $product['productImage'],
    'quantity' => 1
];
if (isset($_SESSION['cart'][$id])) {
    $_SESSION['cart'][$id]['quantity'] == 1;
} else {
    $_SESSION['cart'][$id] = $item;
}
if ($action == 'delete') {
    unset($_SESSION['cart'][$id]);
}
// $_SESSION['cart'][$id]=$item;
// echo "<pre>";
// print_r( $_SESSION['cart']);
?>
<?php
$cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
</head>

<body>
    <h1>GIỎ HÀNG CỦA BẠN</h1>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Ảnh sản phẩm</th>
                    <th>Giá</th>
                    <th>Thành tiền</th>
                    <th>Số lượng</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                <?php $tongtien = 0; ?>
                <?php foreach ($cart as $value) : $tongtien += ($value['productPrice'] * $value['quantity']) ?>
                    <tr>
                        <td class="name"><?php echo $value['productName']; ?></td>
                        <td id="anh"><img src="image/<?php echo $value['productImage']; ?>" alt="" width="100px" height="100px"></td>
                        <td class="sl"><?php echo number_format($value['productPrice']); ?>VNĐ</td>
                        <td class="gia"><?php echo number_format($value['productPrice'] * $value['quantity']); ?>VNĐ</td>
                        <td class="sua"><input type="text" name="" id="" value="<?php echo $value['quantity']?>"></td>
                        <td style="background: red; color: white"><a href="cart.php?id=<?php echo $value['id']; ?>$action-delete">Xóa</a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</body>

</html>