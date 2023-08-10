<?php
    // Hủy cookie
    setcookie('username', '', time() - 3600);
    header('location: login.php');
?>