<?php
    function connection()
    {
        global $config;
        try {
            $conn = new PDO("mysql:host=$config[host]; dbname=$config[dbname]; charset=utf8", $config['user'], $config['password']);
            return $conn;
        } catch (PDOException $e) {
            echo "Lỗi kết nối cơ sở dữ liệu<br />" . $e->getMessage();
        }
    }
?>