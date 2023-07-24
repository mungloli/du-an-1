<?php
    include "../model/pdo.php";
    include "../model/hang.php";
    include "../model/loai.php";
    include "../model/sanpham.php";
    include "home.php";

    if(isset($_GET['act'])){
        $act=$_GET['act'];
        switch ($act) {
            case 'addhang':
                if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
                    $tenhang=$_POST['tenhang'];
                    insert_hang($tenhang);
                    $thongbao="them thanh cong";
                }

                include "hang/add.php";
                break;
          
            case 'lishang':
                $listhang = loadall_hang();
                include "hang/list.php";
                break;

            case 'xoahg':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    delete_hang($_GET['id']);
                }
                $listhang = loadall_hang("",0);
                include "hang/list.php";
                break;

            case 'suahg':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    $hang=loadone_hang($_GET['id']);
                }
                
                include "hang/update.php";
                break;

            case 'updatehg':
                if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                    $tenhang=$_POST['tenhang'];
                    $id=$_POST['id'];
                    update_hang($id, $tenhang);
                    $thongbao="cap nhat thanh cong";
                }
                $listhang=loadall_hang();
                include "hang/list.php";
                break;

            case 'addloai':
                if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
                    $tenloai=$_POST['tenloai'];
                    insert_loai($tenloai);
                    $thongbao="them thanh cong";
                }

                include "loai/add.php";
                break;
          
            case 'lisloai':
                $listloai = loadall_loai();
                include "loai/list.php";
                break;

            case 'xoaloai':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    delete_loai($_GET['id']);
                }
                $listloai = loadall_loai("",0);
                include "loai/list.php";
                break;

            case 'sualoai':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    $loai=loadone_loai($_GET['id']);
                }
                
                include "loai/update.php";
                break;

            case 'updateloai':
                if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                    $tenloai=$_POST['tenloai'];
                    $id=$_POST['id'];
                    update_loai($id, $tenloai);
                    $thongbao="cap nhat thanh cong";
                }
                $listloai=loadall_loai();
                include "loai/list.php";
                break;
        
            case 'addsp':
                if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
                    $id_loai=$_POST['id_loai'];
                    $id_hang=$_POST['id_hang'];
                    $tensp=$_POST['tensp'];
                    $giasp=$_POST['giasp'];
                    $hinh=$_FILES['hinh']['name'];
                    $target_dir = "../upload/";
                    $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                    if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                        //echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                        } else {
                        //echo "Sorry, there was an error uploading your file.";
                        }

                    insert_sanpham($tensp, $giasp, $hinh, $id_loai, $id_hang);
                    $thongbao="them thanh cong";
                }
                $listhang = loadall_hang();
                $listloai = loadall_loai();
                include "sanpham/add.php";
                break;
              
            case 'listsp':
                // if(isset($_POST['listok'])&&($_POST['listok'])){
                //     $kyw=$_POST['kyw'];
                //     $iddm=$_POST['iddm'];
                // }else{
                //     $kyw='';
                //     $iddm=0;
                // }
                $listloai = loadall_loai();
                $listhang = loadall_hang();
                // $listsanpham = loadall_sanpham($kyw,$iddm);
                $listsanpham = loadall_sanpham();
                include "sanpham/list.php";
                break;

                case 'xoasp':
                    if(isset($_GET['id'])&&($_GET['id']>0)){
                        delete_sanpham($_GET['id']);
                    }
                    $listsanpham = loadall_sanpham("",0);
                    include "sanpham/list.php";
                    break;
    
                case 'suasp':
                    if(isset($_GET['id'])&&($_GET['id']>0)){
                        $sanpham=loadone_sanpham($_GET['id']);
                    }
                    $listhang = loadall_hang();
                    $listloai = loadall_loai();
                    include "sanpham/update.php";
                    break;
    
                case 'updatesp':
                    if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                        $id=$_POST['id'];
                        $id_hang=$_POST['id_hang'];
                        $id_loai=$_POST['id_loai'];
                        $tensp=$_POST['tensp'];
                        $giasp=$_POST['giasp'];
                        $hinh=$_FILES['hinh']['name'];
                        $target_dir = "../upload/";
                        $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                        if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                            //echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                            } else {
                            //echo "Sorry, there was an error uploading your file.";
                            }
                        update_sanpham($id, $id_hang, $id_loai, $tensp, $giasp, $hinh);
                        $thongbao="cap nhat thanh cong";
                    }
                    $listhang = loadall_hang();
                    $listloai = loadall_loai();
                    $listsanpham=loadall_sanpham("",0);
                    include "sanpham/list.php";
                    break;
        }
    }
?>