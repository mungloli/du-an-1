<?php 

function loai_all(){
    $connect=connection();
    $sql = "SELECT * FROM loai";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
 }

?>