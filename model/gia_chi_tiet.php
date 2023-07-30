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

 function insert_gia_chi_tiet($id_sp,$id_dt,$gia,$so_luong){
    $connect=connection();
    $sql = "INSERT INTO `gia_chi_tiet`(`id_sanPham`, `id_theTich`, `gia`, `so_luong`) VALUES ";
    for ($i = 0; $i < count($id_dt); $i++) {
        $value_dt = $id_dt[$i];
        $value_gia = $gia[$i];
        $value_sl = $so_luong[$i];
        // Nếu không phải phần tử đầu tiên, thêm dấu phẩy phía trước
        if ($i > 0) {
            $sql .= ", ";
        }
        
        // Thêm giá trị vào câu lệnh SQL
        $sql .= "('$id_sp','$value_dt','$value_gia','$value_sl')";
    }
    $stmt = $connect->prepare($sql);
    $stmt->execute();
 }
?>