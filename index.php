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
  case 'logout':
    user_logout();
    break;
  case 'btn_change':
    update_pass();
    break;
  case 'product_datail':
    chi_tiet_san_pham();
    break;
  case 'add_to_cart':
    cart();
    break;
  case 'search':
    search();
    break;
  case 'by-loai':
    select_sp_by_loai();
    break;
  case 'by-hang':
    select_sp_by_hang();
    break;
  default: echo "Page not pound";
  
 }
?>