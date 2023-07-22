<?php
    function home_page(){
        $yeu_thich=select_yeu_thich();
        view('/page/home',['yeu_thich'=>$yeu_thich]);
    }
    function login(){
        view('/page/login');
    }
    function register(){
        view('/page/register');
    }
    function change_pass(){
        view('/page/change_pass');
    }
    function don_hang(){
        view('/page/don_hang');
    }
    function user_login(){
        if(isset($_POST['btn_login'])){
            // echo "<pre>";
            // print_r($_POST);
            // echo "</pre>";
            $name=$_POST['ten'];
            $mat_khau=$_POST['mat-khau'];
            $tai_khoan=check_login($name,$mat_khau);
            if(!empty($tai_khoan)){
                // $_SESSION['user']=$tai_khoan;
                $json_tai_khoan=json_encode($tai_khoan);
                setcookie("user",$json_tai_khoan,time()+(86400*7));
                $messenger['login']="Đăng nhập thành công";
                header('location:index.php');
            }else {
                $messenger['login']= "Tài khoản hoặc mật khẩu không đúng";
                
            }
        }
    }

    function user_logout(){
        setcookie("user",'',time()-(86400*7));
        header('location:index.php');
    }
    function user_register(){
        if(isset($_POST['btn_register'])){
            $name=$_POST['ten'];
            $email=$_POST['email'];
            $mat_khau=$_POST['mat-khau'];
            new_register($name,$email,$mat_khau);
            echo "đăng kí thành công";
        }
    }
    function update_pass(){
        $user=json_decode($_COOKIE['user'],true);
        $id=$user['id'];
        if(isset($_POST['btn_change-pass'])){
            $mat_khau=$_POST['mat-khau'];
            $new_may_khau=$_POST['mat-khau-new'];
            $new_may_khau_2=$_POST['mat-khau-new-2'];
            if($user['mat_khau']==$mat_khau && $new_may_khau == $new_may_khau_2){
                update_new_pass($new_may_khau,$id);
            }else{
                echo "Không thể thay đổi tài khoản mật khẩu";
            }
        }
    }
    
    function cart(){
        if(isset($_POST['btn-add-cart']) && isset($_COOKIE['user'])){
            $id_sp=$_POST['id-sp'];
            $id_dt=$_POST['dung-tich'];
            $sl=$_POST['so-luong'];
            $chi_tiet_sp=select_by_dung_tich($id_sp,$id_dt);
            extract($chi_tiet_sp);
            print_r($_POST) ;
            if($chi_tiet_sp['so_luong']>0){
                $user = json_decode($_COOKIE['user'],true);
                $user_cart=check_cart($user['id']);
                $cart=select_cart_by_group($user['id'],$id_sp,$id_dt);
                extract($cart);
                print_r($cart);
                if(empty($user_cart)){
                    echo "Tạo giỏ hàng thành công";
                    create_cart($user['id']);
                    add_product_cart($user['id'],$id_sp,$sl,$id_dt);
                }
                else{
                    echo 'Đã có giỏ hàng';
                    if(!empty($cart)){
                        echo "đã có sp";
                        $sl_update=$cart['so_luong']+$sl;
                        echo $sl_update ;
                        update_so_luong_sp_cart($sl_update,$id_sp,$user['id'],$id_dt);
                    }else{
                        echo "san phẩm mới";
                        add_product_cart($user['id'],$id_sp,$sl,$id_dt);
                    }
                }
            }else{
                echo "sản phẩm đã hết hàng";
            }
        } else{
            header('location:index.php?ctl=login');
        }   
    }
    function search(){
        if(isset($_POST['btn-search'])){
            $keyword=$_POST['search'];
            $list=select_by_keyword($keyword);
            print_r($list);
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