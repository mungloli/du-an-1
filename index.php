<?php
require "config.php";
require "model/connection.php";
require "model/site/san_pham.php";
require "controllers/site/home.php";

 $ctl= $_GET['ctl'] ?? '';
 switch($ctl){
  case '':
  case 'home':
    home_page();
    break;
  case 'login':
    login();
  default: echo "Page not pound";
 }
?>