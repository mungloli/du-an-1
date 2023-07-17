<?php
 function loai_all(){
    $connect=connection();
    $sql = "SELECT * FROM loai";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
 }
 function hang_all(){
   $connect=connection();
   $sql = "SELECT * FROM hang";
   $stmt = $connect->prepare($sql);
   $stmt->execute();
   $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   return $result;
}
function select_san_pham_by_loai($id_loai){
   $connect=connection();
   $sql = "SELECT * FROM `san_pham` WHERE id_loai=$id_loai";
   $stmt = $connect->prepare($sql);
   $stmt->execute();
   $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   return $result;
}
function select_san_pham_by_hang($id_hang){
   $connect=connection();
   $sql = "SELECT * FROM `san_pham` WHERE id_loai=$id_hang";
   $stmt = $connect->prepare($sql);
   $stmt->execute();
   $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   return $result;
}
function check_login($name,$mat_khau){
   $connect=connection();
   $sql = "SELECT * FROM `tai_khoan` WHERE `user_name`='".$name."' AND `mat_khau`='".$mat_khau."'";
   $stmt = $connect->prepare($sql);
   $stmt->execute();
   $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   return $result[0];
}
function new_register($name,$email,$mat_khau){
   $connect=connection();
   $sql = "INSERT INTO `tai_khoan`(user_name, email, vai_tro, mat_khau) VALUES ('$name','$email',0,'$mat_khau')";
   $stmt = $connect->prepare($sql);
   $stmt->execute();
}
function update_new_pass($new_pass,$id_user){
   $connect=connection();
   $sql = "UPDATE `tai_khoan` SET `mat_khau`='$new_pass' WHERE id=$id_user";
   $stmt = $connect->prepare($sql);
   $stmt->execute();
}
function select_gia_min_max_san_pham($id){
   $connect=connection();
   $sql = "SELECT min(`gia_chi_tiet`.`gia`) gia_min ,max(`gia_chi_tiet`.`gia`) gia_max FROM `san_pham` JOIN gia_chi_tiet ON gia_chi_tiet.id_sanPham=san_pham.id WHERE san_pham.id=$id";
   $stmt = $connect->prepare($sql);
   $stmt->execute();
   $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   return $result[0];
}
function select_san_pham_by_id($id){
   $connect=connection();
   $sql = "SELECT * FROM `san_pham` WHERE id=$id";
   $stmt = $connect->prepare($sql);
   $stmt->execute();
   $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   return $result[0];
}

function select_dung_tich(){
   $connect=connection();
   $sql = "SELECT * FROM `dung_tich`";
   $stmt = $connect->prepare($sql);
   $stmt->execute();
   $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   return $result;
}

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
function select_gioi_tinh($id_sp){
   $connect=connection();
   $sql = "SELECT `loai`.`name` as name FROM san_pham JOIN loai ON san_pham.id_loai=loai.id WHERE san_pham.id=$id_sp;";
   $stmt = $connect->prepare($sql);
   $stmt->execute();
   $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   return $result[0];
}
function select_by_keyword($keyword){
   $connect=connection();
   $sql = "SELECT * FROM san_pham WHERE san_pham.name LIKE '%$keyword%'";
   $stmt = $connect->prepare($sql);
   $stmt->execute();
   $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   return $result;
}
function insert_yeu_thich($id_sp,$id_kh){
   $connect=connection();
   $sql = "INSERT INTO `yeu_thich`(`id_san_pham`, `id_khach_hang`) VALUES ('$id_sp','$id_kh')";
   $stmt = $connect->prepare($sql);
   $stmt->execute();
}
function select_yeu_tich($keyword){
   $connect=connection();
   $sql = "SELECT * FROM `yeu_thich` WHERE id_khach_hang=$keyword";
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
function select_cart_by_group($id_kh,$id_sp,$id_dt){
   $sql = "SELECT * FROM `chi_tiet_gio_hang` WHERE id_khach_hang=$id_kh AND id_sp=$id_sp AND id_dt=$id_dt";
   $connect=connection();
   $stmt = $connect->prepare($sql);
   $stmt->execute();
   $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   return $result[0];
}
function update_so_luong_sp_cart($so_luong,$id_sp,$id_kh,$id_dt){
   $connect=connection();
   $sql = "UPDATE `chi_tiet_gio_hang` SET `so_luong`='$so_luong' WHERE id_khach_hang=$id_kh AND id_sp=$id_sp AND id_dt=$id_dt";
   $stmt = $connect->prepare($sql);
   $stmt->execute();
}
?>
