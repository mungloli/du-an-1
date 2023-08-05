<?php 
function insert_don_hang($id_kh,$dia_chi,$id_vc,$ten_kh,$sdt){
    $connect=connection();
    $sql = "INSERT INTO `don_hang`(`id_khach_hang`, `dia_chi`, `id_vc`, `ten_kh`, `sdt`) 
    VALUES ('$id_kh','$dia_chi','$id_vc','$ten_kh','$sdt')";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    $id=$connect->lastInsertId();
    return $id;
 }

 function select_don_hang($id_kh){
    $connect=connection();
    $sql = "SELECT * FROM `don_hang` WHERE id_khach_hang=$id_kh ORDER BY don_hang.id DESC" ;
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
 }
 function select_don_hang_by_id($id){
   $connect=connection();
   $sql = "SELECT don_hang.*, van_chuyen.name as ten_vc,van_chuyen.gia as gia_vc FROM `don_hang`
   JOIN van_chuyen ON van_chuyen.id=don_hang.id_vc
   WHERE don_hang.id=$id" ;
   $stmt = $connect->prepare($sql);
   $stmt->execute();
   $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   return $result[0];
}
?>