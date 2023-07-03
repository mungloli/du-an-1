<?php
    session_start();
    function home_page(){
        view('/page/home');
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
    function user_login(){
        if(isset($_POST['btn_login'])){
            // echo "<pre>";
            // print_r($_POST);
            // echo "</pre>";
            $name=$_POST['ten'];
            $mat_khau=$_POST['mat-khau'];
            $tai_khoan=check_login($name,$mat_khau);
            if(is_array($tai_khoan)){
                $_SESSION['user']=$tai_khoan;
                $messenger['login']="Đăng nhập thành công";
                header('location:index.php');
            }else {
                $messenger['login']= "Tài khoản hoặc mật khẩu không đúng";
                
            }
        }
        
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
        $id=$_GET['id'];
        if(isset($_POST['btn_change'])){
            $mat_khau=$_POST['mat-khau'];
            $new_may_khau=$_POST['mat-khau-new'];
            $new_may_khau_2=$_POST['mat-khau-new-2'];
            update_new_pass($new_may_khau,$id);
            echo "Thay đổi thành công";
        }
    }
?>