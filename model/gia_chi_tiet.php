<?php 

function gia_chi_tiet_by_sp($id){
    $connect=connection();
    $sql = "SELECT gia_chi_tiet.*, dung_tich.dungTichThuc as dung_tich FROM `gia_chi_tiet`
    JOIN dung_tich ON gia_chi_tiet.id_theTich=dung_tich.id
    WHERE gia_chi_tiet.id_sanPham=$id";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
 }

?>