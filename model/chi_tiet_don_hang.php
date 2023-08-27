<?php 
   

function insert_chi_tiet_don_hang($id_sp,$id_dt,$so_luong,$gia,$id_don_hang){
   $connect=connection();
    $sql = "INSERT INTO `chi_tiet_don_hang`(`id_san_pham`, `id_dung_tich`, `so_luong`, `gia`, `id_don_hang`) VALUES ";
    for ($i = 0; $i < count($id_sp); $i++) {
      $sp = $id_sp[$i];
      $dt = $id_dt[$i];
      $sl=$so_luong[$i];
      $price=$gia[$i];
      // Nếu không phải phần tử đầu tiên, thêm dấu phẩy phía trước
      if ($i > 0) {
          $sql .= ", ";
      }
      
      // Thêm giá trị vào câu lệnh SQL
      $sql .= "('$sp','$dt','$sl','$price','$id_don_hang')";
  } 
    $stmt = $connect->prepare($sql);
    $stmt->execute();
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


