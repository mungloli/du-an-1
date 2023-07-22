<?php 

function hang_all(){
    $connect=connection();
    $sql = "SELECT * FROM hang";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
 }

?>