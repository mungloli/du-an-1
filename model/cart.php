<?php 

function create_cart($id_kh){
    $connect=connection();
    $sql = "INSERT INTO `gio_hang`(`id_khach_hang`) VALUES ($id_kh)";
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
//  SELECT don_hang.*,chi_tiet_don_hang.id_san_pham,chi_tiet_don_hang.id_dung_tich,chi_tiet_don_hang.so_luong,chi_tiet_don_hang.gia FROM `don_hang` JOIN chi_tiet_don_hang ON don_hang.id = chi_tiet_don_hang.id_don_hang WHERE don_hang.id=1;
?>