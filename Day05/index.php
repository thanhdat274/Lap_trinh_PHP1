<?php
    $val = 'abc';
    $string = " \"hello\" cac ban";
    $string2= ' "hello" cac ban';
    echo $string.'<br>';
    echo $string2.'<br>';
    echo "Toi dang $val";
    /* Lưu ý khi sử dụng chuỗi
        - nếu chuỗi được đặt trong dấu nháy kép thì các ký tự nháy kép phải thêm dấu \ ở trước nó 
        - trong chuỗi ta có thể truyền biến vào mà không cần dùng nối chuỗi (lưu ý chỉ sử dụng với chuỗi dùng dấu "")
    */ 

    /* Các hàm xử lý chuỗi thông dụng */ 
    /* explode(tham số 1, tham số 2): tách 1 chuỗi thành 1 mảng
        - tham số 1: ký tự tách mảng
        - tham số 2: tên của chuỗi muốn tách
        hàm var_dump: hiển thị thông tin của biến, mảng... bao gồm kiểu dữ liệu và giá trị
    */ 
    $string3 = "Toi la Son";
    echo '<br>';
    echo $string3;
    echo '<br>';
    var_dump(explode(' ',$string3));

    /* implode(tham số 1, tham số 2): gộp các phần tử trong 1 mảng thành 1 chuỗi
        - tham số 1: ký tự giữa các phần tử
        - tham số 2: mảng muốn gộp lại thành chuỗi
    
    */ 
    echo '<br>';
    var_dump(implode(' ',array('xin','chao','cac','ban'))) ;

    /* strlen(chuỗi): trả về độ dài của chuỗi */ 
    echo '<br>';
    echo strlen($string3);

    /* str_word_count(chuỗi): đếm số từ có trong 1 chuỗi*/ 
    echo '<br>';
    echo str_word_count($string3);

    /* str_replace(chuỗi cần tìm, chuỗi thay thế, chuỗi gốc) */ 
    echo '<br>';
    echo str_replace('Son','Thien',$string3);

    /* htmlentities(chuỗi): chuyển các thẻ html trong chuỗi sang dạng chuỗi */ 
    echo '<br>';
    $newString = htmlentities("<p>Hello</p>");
    echo $newString;

    /* html_entity_decode(chuỗi) */ 
    echo '<br>';
    echo html_entity_decode($newString);

    /* strstr(chuỗi gốc, ký tự muốn tách, true/false): tách một chuỗi bắt đầu từ ký tự muốn tách 
        - true: tách từ ký tự đầu tiên của chuỗi đến ký tự muốn tách
        - false: tách từ ký tự muốn tách đến cuối chuỗi
    */ 
    $string4 = "abcd#efgh";
    echo '<br>';
    echo strstr($string4,'#',true);
    echo '<br>';
    echo strstr($string4,'#',false);
    /* strtolower(chuỗi gốc): chuyển tất cả các ký tự trong chuỗi sang dạng chữ thường */ 
    /* strtoupper(chuỗi gốc): chuyển tất cả các ký tự trong chuỗi sang dạng chữ hoa*/ 

    /* strpos(chuỗi gốc, chuỗi muốn tìm): trả về vị trí của chuỗi muốn tìm
        nếu chuỗi muốn tìm có trong chuỗi gốc thì trả về vị trí của nó
        nếu chuỗi muốn tìm không có trong chuỗi gốc thì trả về false
    */ 
    $string5 = "Chi hang xom xinh the nhi";
    echo '<br>';
    var_dump(strpos($string5,'Chi hang xom')) ;
    echo '<br>';
    var_dump(strpos($string5,'he he')) ;

    /* trim(chuỗi gốc, ký tự muốn xóa) */ 
    $string6 = "%abcd";
    echo '<br>';
    echo trim($string6,'d');
    $string7 = "   he he     ";
    echo '<br>';
    echo trim($string7);
?>