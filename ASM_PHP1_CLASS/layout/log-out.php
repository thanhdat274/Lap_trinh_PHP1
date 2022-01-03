<?php
session_start();
$_SESSION['cart'] = 0;
unset($_SESSION['user']);
header("Location: http://localhost:81/ASM_PHP1_CLASS/User/home-user.php");
?>