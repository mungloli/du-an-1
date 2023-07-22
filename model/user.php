<?php 

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
 
?>