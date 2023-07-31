<?php
 $config['host'] = 'localhost';
 $config['dbname'] = 'du-an-1';
 $config['user'] = 'root';
 $config['password'] = '';

 $image_dir=$_SERVER['DOCUMENT_ROOT']."/du-an-1/public/img";


 function view($path, $data = [])
{
    extract($data);
    include_once "site/" . $path . ".php";
}

function location($path, $data = [])
{
    extract($data);
    include_once "page/" . $path . ".php";
}

function save_file($fieldname, $target_dir) {
    $file_uploaded = $_FILES[$fieldname]['name'];
    print_r($file_uploaded);
        for($i=0;$i < count($file_uploaded);$i++ ){
            $file_name = basename($file_uploaded[$i]);
            $target_path = $_SERVER['DOCUMENT_ROOT'].$target_dir.$file_name;
            move_uploaded_file($file_uploaded['tm p_name'], $target_path);
            $imgs[]=$file_name;
        }
        return $imgs;
}

$img_dir="public/img/";
?>