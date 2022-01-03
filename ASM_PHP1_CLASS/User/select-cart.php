<?php
session_start();
require_once('./../admin/connect_DB.php');
function selectIdSp(){
    if (isset($_SESSION['user']['id'])){
        $id_kh = ($_SESSION['user']['id']);

    } else {
        return null;
        die;
    }
    $conn = getConnection();
    $sql = "select id_san_pham from don_hang where id_khach_hang = :id_khach_hang";
    $statement = $conn->prepare($sql);
    $statement->execute(['id_khach_hang' => $id_kh]);
    $id_sp = [];
    while(true){
        $data = $statement->fetch();
        if($data == false){
            break;
        }
        $row = [
            'id_san_pham' => $data['id_san_pham'],
        ];
        array_push($id_sp, $row);
    }
    return $id_sp;
}

function selectSp(){
    $conn = getConnection();
    $sql = "select id, ten, anh, gia from san_pham where id = :id";
    $statement = $conn->prepare($sql);
    $id_sp = selectIdSp();
    if ($id_sp == null){
        return [];
        die;
    } else {
        $sp = [];
        for($i = 0; $i < count($id_sp); $i++){
            $statement->execute(['id' => $id_sp[$i]['id_san_pham']]);
            $data = $statement->fetch();
            if($data == false){
                break;
            }
            $row = [
                'id' => $data['id'],
                'ten' => $data['ten'],
                'anh' => $data['anh'],
                'gia' => $data['gia'],
            ];
            array_push($sp, $row);
        }
        return $sp;
    }
    
}

?>