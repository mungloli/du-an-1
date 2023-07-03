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
$messenger=[];
?>