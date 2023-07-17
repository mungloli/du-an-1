<?php
    // global $config;
    $config['host'] = 'localhost';
    $config['dbname'] = 'du-an-1';
    $config['user'] = 'root';
    $config['password'] = '';
    try {
        $conn = new PDO("mysql:host=$config[host]; dbname=$config[dbname]; charset=utf8", $config['user'], $config['password']);
        // echo "kết nối thành công";
    } catch (PDOException $e) {
        echo "Lỗi kết nối cơ sở dữ liệu<br />" . $e->getMessage();
    }

    $jsonData = file_get_contents('php://input');
    $data = json_decode($jsonData, true);
    $id_dt=$data['id_dt'];    
    $id_sp=$data['id_sp'];

    function select_gia_san_pham_by_dung_tich($id_san_pham,$id_dung_tich){
        global $conn;
        $sql = "SELECT * FROM `gia_chi_tiet` WHERE id_sanPham=$id_san_pham AND id_theTich =$id_dung_tich";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result[0];
     }
     $gia=select_gia_san_pham_by_dung_tich($id_sp,$id_dt);
     echo json_encode($gia);
        
    
    
?>
