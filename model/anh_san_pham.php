<?php 
   function select_anh($id_sp){
    $connect=connection();
    $sql = "SELECT * FROM `anh_san_pham` WHERE id_san_pham=$id_sp";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
 }

?>