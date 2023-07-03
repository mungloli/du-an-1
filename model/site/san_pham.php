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
?>
