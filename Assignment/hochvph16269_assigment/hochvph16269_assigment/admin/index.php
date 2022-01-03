<?php
    include_once "../lib/session.php";
    session::checkSession();
?>
<style>
    a{
        text-decoration: none;
        color: black;
    }
    a:hover{
        text-decoration: underline;
        color: red;
    }
</style>
<h3>
    Xin chào, <?php echo $_SESSION['name']; ?> | 
    <?php
        if(isset($_GET['action']) && $_GET['action']=='logout'){
            session_destroy();
            header('Location:login.php');
        }
    ?>
    <a href="?action=logout">Đăng xuất</a>
</h3>
<h3><a href="userlist.php">Danh sách người dùng</a></h3>