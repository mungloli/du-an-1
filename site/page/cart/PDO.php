<?php

function pdo_get_connection(){
    // Thông tin cấu hình kết nối cơ sở dữ liệu
    $host = 'localhost';
    $db_name = 'duanmau-ph30121';
    $username = 'root';
    $password = '';
    
    try {
        // Tạo kết nối PDO
        $conn = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password);
    
        // Thiết lập chế độ báo lỗi và chế độ ngoại lệ cho PDO
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Thực hiện các thao tác với cơ sở dữ liệu ở đây...
        //  echo "ket noi thanh cong";
        return $conn;
    } catch (PDOException $e) {
        echo 'Lỗi kết nối cơ sở dữ liệu: ' . $e->getMessage();
    }
    
}
/// insert update delete edit
function pdo_execute($sql){
    $sql_args = array_slice(func_get_args(), 1);
    try{
    $conn = pdo_get_connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute($sql_args);
    }
    catch(PDOException $e){
    throw $e;
    }
    finally{
    unset($conn);
    }
    }
/// truy vấn nhiều dữ liệu
    function pdo_query($sql){
        $sql_args = array_slice(func_get_args(), 1);
        try{
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $rows = $stmt->fetchAll();
        return $rows;
        }
        catch(PDOException $e){
        throw $e;
        }
        finally{
        unset($conn);
        }
        }
       // truyên vấn 1 dữ liệu
        function pdo_query_one($sql){
            $sql_args = array_slice(func_get_args(), 1);
            try{
            $conn = pdo_get_connection();
            $stmt = $conn->prepare($sql);
            $stmt->execute($sql_args);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row;
            }
            catch(PDOException $e){
            throw $e;
            }
            finally{
            unset($conn);
            }
            }
// truy vấn 1 giá trị
            function pdo_query_value($sql){
                $sql_args = array_slice(func_get_args(), 1);
                try{
                $conn = pdo_get_connection();
                $stmt = $conn->prepare($sql);
                $stmt->execute($sql_args);
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                return array_values($row)[0];
                }
                catch(PDOException $e){
                throw $e;
                }
                finally{
                unset($conn);
                }
                }        
?>