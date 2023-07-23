<?php
 $config['host'] = 'localhost';
 $config['dbname'] = 'du-an-1';
 $config['user'] = 'root';
 $config['password'] = '';

 function view($path, $data = [])
{
    extract($data);
    include_once "site/" . $path . ".php";
}

function uploadt_img($fieldname,$target_dir){
    $file_uploaded = $_FILES[$fieldname];
    $file_name = basename($file_uploaded['name']);
    $target_path = $target_dir.$file_name;
    move_uploaded_file($file_uploaded['tmp_name'], $target_path);
    return $file_name;
}
$messenger=[];

$img_dir="public/img/";
?>