<?php
require_once ('./../functions.php');
$id = intval($_GET['id']);
deleteAdmin($id);

header("Location: http://localhost:81/ASM_PHP1_CLASS/admin/admins/list-admin.php");
?>