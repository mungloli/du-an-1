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
?>