<?php
    /* include, include one , require , require one
        - include và require có thể import file được nhiều lần
        - include_one và require_one chỉ có thể import file dc 1 lần
        - Cú pháp : include 'path_file.php' or include ('path_file.php');
    
        - Đường dẫn ( Path ) : 
    */

    echo __FILE__ . "<br>"; // 
    echo __DIR__ ; // đường dẫn thư mục php ( tuyệt đối )
    echo "<hr>";

    $path_file = __DIR__.'/view';
    echo $path_file;

    include $path_file.'/header.php';
    include $path_file.'/header.php';
    include $path_file.'/content.php';

    echo "<div style = 'text-align: center'> Đây là nội dung </div>";

    include $path_file.'/footer.php';

    include '../view/test.php'; // đường dẫn tương đối


?>