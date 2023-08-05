<?php 
function  don_hang(){
        $user = json_decode($_COOKIE['user'],true);
        $id=$user['id'];
        $don_hang=select_don_hang($id);
        view('page/don_hang',['don_hang'=>$don_hang]);
}

    function insert_dh(){
        if(isset($_POST['btn_checkout'])){
            if(empty($_POST['kh_ten'])){
                $errors['kh_ten']="Vui lòng điền vào trường này";
            }else{
                $ten_kh=$_POST['kh_ten'];
            }

            if(empty($_POST['kh_diachi'])){
                $errors['kh_diachi']="Vui lòng điền vào trường này";
            }else{
                $dia_chi=$_POST['kh_diachi'];
            }
            if(empty($_POST['kh_dienthoai'])){
                $errors['kh_dienthoai']="Vui lòng điền vào trường này";
            }else{
                $sdt=$_POST['kh_dienthoai'];
            }

            if(empty($_POST['van_chuyen'])){
                $errors['van_chuyen']="Vui lòng điền vào trường này";
            }else{
                $van_chuyen=$_POST['van_chuyen'];
            }
            echo "<pre>";
            print_r($errors);
            print_r($_POST);
            
        }
        if(empty($errorsr)){
            $user= json_decode($_COOKIE['user'],true);
            $id_kh=$user['id'];
            $id_dh=insert_don_hang($id_kh,$dia_chi,$van_chuyen,$ten_kh,$sdt);
            if(!empty($id_dh)){
                $id_sp=$_POST['id_sp'];
                $so_luong=$_POST['so_luong'];
                $gia=$_POST['gia'];
                $id_dt=$_POST['dung_tich'];
                insert_chi_tiet_don_hang($id_sp,$id_dt,$so_luong,$gia,$id_dh);
                header('index.php?ctl=don_hang');
            }else{
                $list_cart=select_cart($id_kh);
                $van_chuyen=select_van_chuyen();
                view('/page/bill',['list_cart'=>$list_cart,'van_chuyen'=>$van_chuyen,'errors'=>$errors]);
            }
        }
    }

?>