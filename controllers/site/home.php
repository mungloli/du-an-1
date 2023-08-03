<?php
    function home_page(){
        if(!empty($_COOKIE['user'])){
            $user=json_decode($_COOKIE['user'],true);
            $yeu_thich=select_yeu_thich($user['id']);
            view('/page/home',['yeu_thich'=>$yeu_thich]);
        }else{
            view('/page/home');
        }
    }
    
    // function cart(){
    //     if(isset($_POST['btn-add-cart'])){

    //         $id_sp=$_POST['id-sp'];
    //         $id_dt=$_POST['dung-tich'];
    //         $sl=$_POST['so-luong'];
    //         $chi_tiet_sp=select_by_dung_tich($id_sp,$id_dt);
    //         extract($chi_tiet_sp);
    //         print_r($_POST) ;
    //         if($chi_tiet_sp['so_luong']>0){
    //             $user = json_decode($_COOKIE['user'],true);
    //             // $user_cart=check_cart($user['id']);
    //             // $cart=select_cart_by_group($user['id'],$id_sp,$id_dt);
    //             extract($cart);
    //             print_r($cart);
    //             // if(empty($user_cart)){
    //             //     echo "Tạo giỏ hàng thành công";
    //             //         create_cart($user['id']);
    //             //         add_product_cart($user['id'],$id_sp,$sl,$id_dt);
    //             // }
    //             // else{
    //             //     echo 'Đã có giỏ hàng';
    //                 if(!empty($cart)){
    //                     echo "đã có sp";
    //                     $sl_update=$cart['so_luong']+$sl;
    //                     echo $sl_update ;
    //                     update_so_luong_sp_cart($sl_update,$id_sp,$user['id'],$id_dt);
    //                 }else{
    //                     echo "san phẩm mới";
    //                     add_product_cart($user['id'],$id_sp,$sl,$id_dt);
    //                 }
    //             }
    //         }else{
    //             echo "sản phẩm đã hết hàng";
    //         }
    //     } else{
    //         header('location:index.php?ctl=login');
    //     }   
    // }
    
    function search(){
        if(isset($_POST['btn-search'])){
            $keyword=$_POST['search'];
            $list=select_by_keyword($keyword);
            view('/page/san_pham',['dsnew' => $list]);
        }
    }
    function select_sp_by_loai(){
        if(isset($_GET['id-loai'])){
            $id_loai=$_GET['id-loai'];
            $list=select_san_pham_by_loai($id_loai);
            print_r($list);
        }
    }
    function select_sp_by_hang(){
        if(isset($_GET['id-hang'])){
            $id_hang=$_GET['id-hang'];
            $list=select_san_pham_by_hang($id_hang);
            print_r($list);
        }
    }
?>