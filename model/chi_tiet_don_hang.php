<?php 
   function select_don_hang($id_kh){
    $connect=connection();
    $sql = "SELECT * FROM `don_hang` WHERE id_khach_hang=$id_kh" ;
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
 }


 function select_chi_tiet_don_hang($id_don_hang){
   $connect=connection();
   $sql = 
   "SELECT chi_tiet_don_hang.id_san_pham AS id_san_pham, chi_tiet_don_hang.so_luong AS so_luong, 
   chi_tiet_don_hang.gia as gia , anh_san_pham.img as img, san_pham.name as name, dung_tich.dungTichThuc AS dung_tich 
   FROM `chi_tiet_don_hang` JOIN anh_san_pham ON chi_tiet_don_hang.id_san_pham=anh_san_pham.id_san_pham 
   JOIN san_pham ON chi_tiet_don_hang.id_san_pham=san_pham.id 
   JOIN dung_tich ON chi_tiet_don_hang.id_dung_tich=dung_tich.id 
   WHERE chi_tiet_don_hang.id_don_hang=$id_don_hang GROUP BY id_san_pham";

   $stmt = $connect->prepare($sql);
   $stmt->execute();
   $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   return $result;
}
?>


