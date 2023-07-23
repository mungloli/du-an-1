<?php 

function select_san_pham_by_loai_limit_10($id_loai){
    $connect=connection();
    $sql = "SELECT * FROM `san_pham` WHERE id_loai=$id_loai LIMIT 10";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
 }

 function select_san_pham_by_hang($id_hang){
    $connect=connection();
    $sql = "SELECT * FROM `san_pham` WHERE id_hang=$id_hang";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
 }

 function select_san_pham_by_loai($id_loai){
   $connect=connection();
   $sql = "SELECT * FROM `san_pham` WHERE id_loai=$id_loai";
   $stmt = $connect->prepare($sql);
   $stmt->execute();
   $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   return $result;
}
 function select_gia_min_max_san_pham($id){
    $connect=connection();
    $sql = "SELECT min(`gia_chi_tiet`.`gia`) gia_min ,max(`gia_chi_tiet`.`gia`) gia_max FROM `san_pham` JOIN gia_chi_tiet ON gia_chi_tiet.id_sanPham=san_pham.id WHERE san_pham.id=$id";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result[0];
 }

 function select_by_keyword($keyword){
    $connect=connection();
    $sql = "SELECT * FROM san_pham WHERE san_pham.name LIKE '%$keyword%'";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
 }

 function select_san_pham_by_id($id){
    $connect=connection();
    $sql = "SELECT san_pham.* ,loai.name as ten_loai FROM `san_pham` JOIN loai ON san_pham.id_loai=loai.id WHERE san_pham.id=$id";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result[0];
 }

 function select_gioi_tinh($id_sp){
    $connect=connection();
    $sql = "SELECT `loai`.`name` as name FROM san_pham JOIN loai ON san_pham.id_loai=loai.id WHERE san_pham.id=$id_sp;";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result[0];
 };
?>