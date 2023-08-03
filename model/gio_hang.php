<?php 

function insert_cart($id_kh,$is_sp,$so_luong,$id_dt){
    $connect=connection();
    $sql = "INSERT INTO `gio_hang`(`id_khach_hang`, `id_san_pham`, `so_luong`, `id_dt`) VALUES ('$id_kh','$is_sp','$so_luong','$id_dt')";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
 }
 function add_product_cart($id_kh,$id_sp,$so_luong,$id_dt){
    $connect=connection();
    $sql = "INSERT INTO `chi_tiet_gio_hang`(`id_khach_hang`, `id_sp`, `so_luong`, `id_dt`) VALUES ('$id_kh','$id_sp','$so_luong','$id_dt')";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
 }
 function check_cart($id_kh){
    $connect=connection();
    $sql = "SELECT * FROM `gio_hang` WHERE id_khach_hang=$id_kh";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
 }
 function select_cart($id_kh){
   $connect=connection();
   $sql = "SELECT gio_hang.*, san_pham.name as ten_sp, loai.name as ten_loai, 
   hang.name as ten_hang, dung_tich.dungTichThuc as dung_tich,
   chi_tiet_sp.gia as gia ,anh_san_pham.img as img FROM `gio_hang`
   JOIN san_pham ON san_pham.id = gio_hang.id_san_pham
   JOIN loai ON loai.id = san_pham.id_loai
   JOIN hang ON hang.id = san_pham.id_hang
   JOIN dung_tich ON dung_tich.id = gio_hang.id_dt
   JOIN chi_tiet_sp ON chi_tiet_sp.id_sanPham=san_pham.id  
   AND  chi_tiet_sp.id_theTich=dung_tich.id
   JOIN anh_san_pham ON anh_san_pham.id_san_pham=san_pham.id 
   WHERE gio_hang.id_khach_hang=$id_kh GROUP BY gio_hang.id";
   $stmt = $connect->prepare($sql);
   $stmt->execute();
   $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   return $result;
}

function count_cart($id_kh){
   $sql = "SELECT COUNT(chi_tiet_gio_hang.id_sp) as count FROM `gio_hang` WHERE gio_hang.id_khach_hang=$id_kh";
   $connect=connection();
   $stmt = $connect->prepare($sql);
   $stmt->execute();
   $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   return $result[0];
}

//  SELECT don_hang.*,chi_tiet_don_hang.id_san_pham,chi_tiet_don_hang.id_dung_tich,chi_tiet_don_hang.so_luong,chi_tiet_don_hang.gia FROM `don_hang` JOIN chi_tiet_don_hang ON don_hang.id = chi_tiet_don_hang.id_don_hang WHERE don_hang.id=1;
?>