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
    $sql = "SELECT * FROM `don_hang` WHERE id_khach_hang=$id_kh" ;
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
 }
?>