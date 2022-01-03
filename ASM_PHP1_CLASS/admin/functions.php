<?php
include_once('connect_DB.php');
/*
    ADMIN
*/
function getSelectAdmin(){
    $conn = getConnection();
    $sql = "SELECT * FROM admin";
    $statement = $conn->prepare($sql);
    $statement->execute([]);
    $result = [];
    while(true){
        $data = $statement->fetch();
        if($data == false){
            break;
        }
        $row = [
            'id' => $data['id'],
            'tai_khoan' => $data['tai_khoan'],
            'ten' => $data['ten'],
            'anh' => $data['anh'],
            'sdt' => $data['sdt'],
            'dia_chi' => $data['dia_chi'],
        ];
        array_push($result, $row);
    }
    return $result;
}

function insertAdmin(array $data){
    $conn  = getConnection();
    $sql = "INSERT INTO admin(tai_khoan, mat_khau, mat_khau2, ten, sdt, dia_chi, anh) VALUE (:tai_khoan, :mat_khau, :mat_khau2, :ten, :sdt, :dia_chi, :anh)";
    $statement = $conn->prepare($sql);
    $statement->execute($data);
}

function findByIdAdmin(int $id){
    $conn = getConnection();
    $sql = "SELECT * FROM admin WHERE id = :id";
    $statement = $conn->prepare($sql);
    $statement->execute(['id' => $id]);
    $data = $statement->fetch();

    if ($data == false){
        return [];
    }
    return $data;
}

function updateAdmin(array $data){
    $conn = getConnection();
    $sql = "UPDATE admin SET tai_khoan = :tai_khoan, mat_khau = :mat_khau, mat_khau2 = :mat_khau2, ten = :ten, sdt = :sdt, dia_chi = :dia_chi, anh = :anh WHERE id = :id";
    $statement = $conn->prepare($sql);
    $statement->execute($data);
}

function deleteAdmin(int $id){
    $conn = getConnection();
    $sql = "DELETE FROM admin WHERE id = :id";
    $statement = $conn->prepare($sql);
    $statement->execute(['id' => $id]);
}
/*
    USER
*/
function getSelectUser(){
    $conn = getConnection();
    $sql = "SELECT * FROM khach_hang";
    $statement = $conn->prepare($sql);
    $statement->execute([]);
    $result = [];
    while(true){
        $data = $statement->fetch();
        if($data == false){
            break;
        }
        $row = [
            'id' => $data['id'],
            'tai_khoan' => $data['tai_khoan'],
            'mat_khau' => $data['mat_khau'],
        ];
        array_push($result, $row);
    }
    return $result;
}

function insertUser(array $data){
    $conn  = getConnection();
    $sql = "INSERT INTO khach_hang(tai_khoan, mat_khau) VALUE (:tai_khoan, :mat_khau)";
    $statement = $conn->prepare($sql);
    $statement->execute($data);
}

function findByIdUser(int $id){
    $conn = getConnection();
    $sql = "SELECT * FROM khach_hang WHERE id = :id";
    $statement = $conn->prepare($sql);
    $statement->execute(['id' => $id]);
    $data = $statement->fetch();

    if ($data == false){
        return [];
    }
    return $data;
}

function updateUser(array $data){
    $conn = getConnection();
    $sql = "UPDATE khach_hang SET tai_khoan = :tai_khoan, mat_khau = :mat_khau WHERE id = :id";
    $statement = $conn->prepare($sql);
    $statement->execute($data);
}

function deleteUser(int $id){
    $conn = getConnection();
    $sql = "DELETE FROM khach_hang WHERE id = :id";
    $statement = $conn->prepare($sql);
    $statement->execute(['id' => $id]);
}
/*
    PRODUCT
*/
function getSelectProduct(){
    $conn = getConnection();
    $sql = "SELECT * FROM san_pham";
    $statement = $conn->prepare($sql);
    $statement->execute([]);
    $result = [];
    while(true){
        $data = $statement->fetch();
        if($data == false){
            break;
        }
        $row = [
            'id' => $data['id'],
            'ten' => $data['ten'],
            'so_luong' => $data['so_luong'],
            'gia' => $data['gia'],
            'anh' => $data['anh'],
            'trang_thai' => $data['trang_thai'],
        ];
        array_push($result, $row);
    }
    return $result;
}

function insertProduct(array $data){
    $conn  = getConnection();
    $sql = "INSERT INTO san_pham(ten, so_luong, gia, anh, trang_thai) VALUE (:ten, :so_luong, :gia, :anh, :trang_thai)";
    $statement = $conn->prepare($sql);
    $statement->execute($data);
}

function findByIdProduct(int $id){
    $conn = getConnection();
    $sql = "SELECT * FROM san_pham WHERE id = :id";
    $statement = $conn->prepare($sql);
    $statement->execute(['id' => $id]);
    $data = $statement->fetch();

    if ($data == false){
        return [];
    }
    return $data;
}

function updateProduct(array $data){
    $conn = getConnection();
    $sql = "UPDATE san_pham SET ten = :ten, so_luong = :so_luong, gia = :gia, anh = :anh, trang_thai = :trang_thai WHERE id = :id";
    $statement = $conn->prepare($sql);
    $statement->execute($data);
}

function deleteProduct(int $id){
    $conn = getConnection();
    $sql = "DELETE FROM san_pham WHERE id = :id";
    $statement = $conn->prepare($sql);
    $statement->execute(['id' => $id]);
}
/*
    LOGIN
*/
function loginAdmin($tk, $mk, $mk2){
    $conn = getConnection();
    $sql = "select * from admin where tai_khoan = :tai_khoan and mat_khau = :mat_khau and mat_khau2 = :mat_khau2";
    $data = [
        'tai_khoan' => $tk,
        'mat_khau' => $mk,
        'mat_khau2' => $mk2,
    ];
    $statement = $conn->prepare($sql);
    $statement->execute($data);
    $row = $statement->fetch();
    if($row == false){
        return [];
    }
    $admin = [
        'id' => $row['id'],
        'tai_khoan' => $row['tai_khoan'],
        'mat_khau' => $row['mat_khau'],
        'mat_khau2' => $row['mat_khau2'],
        'ten' => $row['ten'],
        'anh' => $row['anh']
    ];
    return $admin;
}

/* check data user */
function checkDataUser($tk, $mk){
    $conn = getConnection();
    $sql = "select * from khach_hang where tai_khoan = :tai_khoan and mat_khau = :mat_khau";
    $checkUser = [
        'tai_khoan' => $tk,
        'mat_khau' => $mk
    ];
    
    $statement = $conn->prepare($sql);
    $statement->execute($checkUser);

    $check= $statement ->fetch();
    if($check == false){
        return [];
    }
    
    $dataUser= [
        'id' => $check['id'],
        'tai_khoan' =>$check['tai_khoan'],
        'mat_khau' => $check['mat_khau']
    ];
    return $dataUser;
}

/*
    CART
*/
function cart(int $id){
    $conn = getConnection();
    $sql = "select count(id_san_pham) as 'so_luong' from don_hang where id_khach_hang = :id_khach_hang";
    $statement = $conn->prepare($sql);
    $statement->execute(['id_khach_hang' => $id]);
    $id_khach_hang = $statement->fetch();
    return $id_khach_hang;
}
function addCart($data){
    $conn = getConnection();
    $sql = "insert into don_hang(id_khach_hang, id_san_pham) value (:id_khach_hang, :id_san_pham)";
    $statement = $conn->prepare($sql);
    $statement->execute($data);
}
?>
