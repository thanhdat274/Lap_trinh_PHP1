<?php
require_once ('./../functions.php');
$id = intval($_GET['id']);
deleteProduct($id);

header("Location: http://localhost:81/ASM_PHP1_CLASS/admin/goods/list-product.php");
?>