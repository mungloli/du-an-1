
<?php 


    function select_yeu_thich(){
        $connect=connection();
        $sql = "SELECT * FROM `yeu_thich`";
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
     }
     function select_yeu_thich_by_sp($id_sp){
        $connect=connection();
        $sql = "SELECT * FROM `yeu_thich` WHERE id_san_pham=$id_sp";
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
     }
     function count_wishlist($id_kh){
      $connect=connection();
      $sql = "SELECT COUNT(yeu_thich.id_san_pham) as count FROM `yeu_thich` WHERE yeu_thich.id_khach_hang=$id_kh";
      $stmt = $connect->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $result[0];
   }


//  if(!empty($_COOKIE['user'])){
//     $jsonData = file_get_contents('php://input');
//     $user = json_decode($_COOKIE['user'],true);
//     $id_sp = $jsonData;
//     $id_kh=$user['id'];
//     $yeu_thich=select_by_yeu_thich($id_sp,$id_kh);
//     // print_r($yeu_thich);
//     if(!empty($yeu_thich)){
//         // add_wishlist($id_sp,$id_kh);
//         echo "1";
//     }else{
//         echo "2";
//     }
// }
// else{
//     echo "http://localhost/du-an-1/index.php?ctl=login";
// }
 
?>
    