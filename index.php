<?php
require "global.php";
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
    break;
  case 'register':
    register();
    break;
  case "btn_login":
    user_login();
    break;
  case "btn_register":
    user_register();
    break;
  case 'change_pass':
    change_pass();
    break;
  default: echo "Page not pound";
 }
?>