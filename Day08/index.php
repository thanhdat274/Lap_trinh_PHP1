<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        /* Xử lý form */ 
        /*
            Dữ liệu truyền lên server thông qua 2 phương thức
            - GET
            - POST
        */ 
        /* 1. Phương thức GET
            dữ liệu được gửi lên server thông qua phương thức GET bằng cách bổ sung các tham số đằng sau URL
            server sẽ nhận URL sau đó phân tích và trả lại kết quả
            đối với dữ liệu cần bảo mật thì không nên sử dụng GET vì nó hiển thị dữ liệu lên URL
            thông thường những hành động nào làm thay đổi Database cũng không nên sử dụng GET

           2. Lấy dữ liệu từ phương thức GET
           - để lấy dữ liệu thì ta sử dụng biến $_GET
           - $_GET : là biến toàn cục lưu trữ tất cả dữ liệu từ Client gửi lên Server
           - $_GET là một mảng định danh
           - Lưu ý: trước khi lấy dữ liệu thì phải kiểm tra xem nó có tồn tại hay không
           - để kiểm tra dữ liệu thì dùng hàm isset(dữ liệu cần kiểm tra)

           3. Phương thức POST
           - là hình thức gửi dữ liệu từ Client lên Server giống phương thức GET
           - dữ liệu gửi đi bằng phương thức POST được ẩn đi
        */ 
        echo '<pre>';
        // var_dump($_GET);
        // if(isset($_GET['product-name'])){
        //     echo $_GET['product-name'];
        // }
        // echo '<br>';
        // if(isset($_GET['quantity'])){
        //     echo $_GET['quantity'];
        // }

        var_dump($_POST);

        /*
            Tổng kết:
            - giống nhau: đều là phương thức truyền dữ liệu từ Client lên Server
            - khác nhau: 
                - dữ liệu sử dụng phương thức POST để gửi đi bảo mật hơn so với GET
                - dữ liệu gửi bằng GET rõ ràng hơn 
                - GET luôn luôn nhanh hơn POST
                    - với POST: dữ liệu luôn gửi lên server để xử lý, sau đó mới trả về
                    - với GET: browser sẽ kiểm tra trong cache xem có chưa, nếu có thì trả về luôn, không cần gửi lên server nữa
            - nên sử dụng GET khi muốn SEO website
            - nếu dữ liệu cần bảo mật thì nên sử dụng POST
            - khi sử dụng các câu lệnh trong database
                - nếu là select thì có thể dùng GET
                - nếu là các câu lệnh tác động và thay đổi dữ liệu trong Database thì dùng POST
        */ 

    ?>
    <form action="info.php" method="POST">
            <input type="text" name="product-name" id="product-name" placeholder="Product Name">
            <input type="text" name="quantity" id="quantity" placeholder="Quantity">
            <input type="submit" name="btnSubmit" id="btn-submit" value="Thêm">
    </form>
</body>
</html>