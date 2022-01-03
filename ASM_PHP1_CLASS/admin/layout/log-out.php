<?php
session_start();
unset($_SESSION['admin']);
header("Location: http://localhost:81/ASM_PHP1_CLASS/User/home-user.php");
?>