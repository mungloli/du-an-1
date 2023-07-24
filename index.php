<?php
    session_start();
    include "model/pdo.php";
    include "model/loai.php";
    include "model/hang.php";
    include "model/sanpham.php";
    include "view/header.php";
    include "global.php";

    $dsnew=loadall_sanpham_home();
    $dsloai=loadall_loai();
    $dshang=loadall_hang();

    if((isset($_GET['act']))&&($_GET['act']!="")){
        $act=$_GET['act'];
        switch($act){
            case 'sanpham':
                if(isset($_POST['kyw'])&&($_POST['kyw']!="")){
                    $kyw=$_POST['kyw'];
                }else{
                    $kyw="";
                }
                if(isset($_GET['id_hang'])&&($_GET['id_hang']>0)){
                    $id_hang=$_GET['id_hang'];
                }else{
                    $id_hang=0;
                }
                $dsnew=loadall_sanpham($kyw,$id_hang);
                include "view/home.php";
                break;
            case 'sanphamct':
                if(isset($_GET['idsp'])&&($_GET['idsp']>0)){
                    $id=$_GET['idsp'];
                    $onesp=loadone_sanpham($id);
                    extract($onesp);
                    $sp_cung_loai=load_sanpham_cungloai($id,$id_loai);
                    include "view/sanphamct.php";
                }else{
                    include "view/home.php";
                }
                
                break;
            case 'blog';
                include "blog/home.php";
                break;
            case 'spct';
                include "blog/spct.php";
                break;
            default:
                include "view/home.php";
                break;
        }
    }else{
        include "view/home.php";
    }

    include "view/footer.php";
?>