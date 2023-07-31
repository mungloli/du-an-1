<?php 

function list_san_pham(){
    $list_sp=select_sp();
    
    location('/san_pham/san_pham',['list_sp'=>$list_sp]);
}

function detail_san_pham_by_id(){
    $id=$_GET['id'];
    $detail_sp=detail_sanpham($id);
    $gia_chi_tiet=chi_tiet_by_sp($id);
    $imgs_sp=select_anh($id);
    location('/san_pham/detail_sp',['detail_sp'=>$detail_sp, 'gia_chi_tiet'=>$gia_chi_tiet, 'imgs_sp'=>$imgs_sp]);
}

function add_sp_page(){
    $list_loai=loai_all();
    $list_hang=hang_all();
    $list_dt=select_dung_tich();
    location('/san_pham/add_sp',['list_loai'=>$list_loai,'list_hang'=>$list_hang,'list_dt'=>$list_dt]);
}
function add_sp_new(){
    if(isset($_POST['btn_add_sp'])){
        $ten_sp=$_POST['ten_sp'];
        $id_hang=$_POST['hang'];
        $id_loai=$_POST['loai'];
        $imgs=$_FILES['img']['name'];
        $mo_ta=$_POST['mo_ta'];
        $id_dt=$_POST['dt'];
        $gia=$_POST['gia'];
        $so_luong=$_POST['so_luong'];
        $hinh=save_files('img','/du-an-1/public/img/');
        $id=insert_san_pham($ten_sp,$mo_ta,$id_loai,$id_hang);
        insert_imgs($id,$imgs);
        insert_chi_tiet_sp($id,$id_dt,$gia,$so_luong);
        header('location: index.php?ctl=san_pham');
    }
}

function edit_sp_page(){
    $id = $_GET['id'];
    $sp=select_sp_by_id_sp($id);
    $list_loai=loai_all();
    $list_hang=hang_all();
    location('san_pham/edit_sp',['sp'=>$sp,'list_hang'=>$list_hang,'list_loai'=>$list_loai]);
}
    function delete_sp(){
        $id = $_GET['id'];
        delete_san_pham($id);
        header('location: index.php?ctl=san_pham');
    }
    function update_sp(){
        if(isset($_POST['btn_update_sp'])){
        $id=$_POST['id'];
        $name=$_POST['ten_sp'];
        $id_hang=$_POST['hang'];
        $id_loai=$_POST['loai'];
        $mo_ta=$_POST['mo_ta'];
        update_san_pham($id,$name,$mo_ta,$id_loai,$id_hang);
        header('location: index.php?ctl=san_pham');
        }
    }

    function delete_anh_by_id(){
        $id=$_GET['id'];
        $id_sp=$_GET['sp'];
        delete_anh($id);
        header("location:index.php?ctl=detail_sp&id=$id_sp");

    }
    function add_img(){
        $id_sp=$_GET['id'];
        $img=save_file('img','/du-an-1/public/img/');
        echo $img;
        insert_anh($id_sp,$img);
        header("location:index.php?ctl=detail_sp&id=$id_sp");
    }
    function delete_gia_chi_tiet_by_id(){
        $id=$_GET['id'];
        $id_sp=$_GET['id_sp'];
        delete_chi_tiet_sp($id);
        header("location:index.php?ctl=detail_sp&id=$id_sp");
    }
    function chi_tiet_sp_adit_page(){
        $id=$_GET['id'];
        $chi_tiet_sp=select_chi_tiet_sp_by_id($id);
        location('san_pham/edit_chi_tiet_sp',['chi_tiet_sp'=>$chi_tiet_sp]);
    }
    function update_chi_tiet_sp_by_id(){
        if(isset($_POST['btn_update_ctsp'])){
            $id_sp=$_GET['id_sp'];
            $id=$_POST['id'];
            $gia=$_POST['gia'];
            $so_luong=$_POST['so_luong'];
            update_chi_tiet_sp($id,$gia,$so_luong);
            header("location:index.php?ctl=detail_sp&id=$id_sp");
        }
    }
?>
