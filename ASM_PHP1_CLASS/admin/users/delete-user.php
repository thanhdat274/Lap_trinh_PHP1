<?php
require_once ('./../functions.php');
$id = intval($_GET['id']);
deleteUser($id);

header("Location: http://localhost/ASM_PHP1_CLASS/admin/users/list-user.php");
?>