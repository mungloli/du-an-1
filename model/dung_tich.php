<?php 



 function select_dung_tich(){
    $connect=connection();
    $sql = "SELECT * FROM `dung_tich`";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
 }
 
 function select_by_dung_tich($id_san_pham,$id_dung_tich){
   $sql = "SELECT * FROM `gia_chi_tiet` WHERE id_sanPham=$id_san_pham AND id_theTich =$id_dung_tich";
   $connect=connection();
   $stmt = $connect->prepare($sql);
   $stmt->execute();
   $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   return $result[0];
}


?>