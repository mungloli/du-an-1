<?php 
require "../global.php";
require "../model/connection.php";
require "../model/loai.php";
require "../model/hang.php";
require "../model/user.php";
require "../model/anh_san_pham.php";
require "../model/san_pham.php";
require "../model/dung_tich.php";
require "../model/gia_chi_tiet.php";
require "../controllers/admin/doashboard.php";
require "../controllers/admin/loai.php";
require "../controllers/admin/hang.php";
require "../controllers/admin/user.php";
require "../controllers/admin/san_pham.php";

$ctl= $_GET['ctl'] ?? '';
switch($ctl){
    case "":
    case "dashboard":
        dashboard();
        break;
    case "loai":
        list_loai();
        break;
    case "add_loai":
        add_loai_page();
        break;
    case "add_new_loai":
        add_loai_new();
        break;
    case "edit_loai":
        edit_loai();
        break;
    case "update_loai":
        update_loai_by_id();
        break;
    case "delete_loai":
        delete_loai_by_id();
        break;
    case "hang":
        list_hang();
        break;
    case "add_hang":
        add_hang_page();
        break;
    case "add_new_hang":
        add_hang_new();
        break;
    case "edit_hang":
        edit_hang();
        break;
    case "update_hang":
        update_hang_by_id();
        break;
    case "delete_hang":
        delete_hang_by_id();
        break;
    case "user":
        list_user();
        break;
    case "add_user":
        add_user_page();
        break;
    case "add_new_user":
        add_user_new();
        break;
    case "edit_user":
        edit_user();
        break;
    case "update_user":
        update_user_by_id();
        break;
    case "delete_user":
        delete_user_by_id();
        break;
    case "san_pham":
        list_san_pham();
        break;
    case "detail_sp":
        detail_san_pham_by_id();
        break;
    case "add_sp":
        add_sp_page();
        break;
    case "add_new_sp":
        add_sp_new();
        break;
    }
    
    
?>