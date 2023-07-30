<?php 

function list_san_pham(){
    $list_sp=select_sp();
    location('/san_pham/san_pham',['list_sp'=>$list_sp]);
}

function detail_san_pham_by_id(){
    $id=$_GET['id'];
    $detail_sp=detail_sanpham($id);
    $gia_chi_tiet=gia_chi_tiet_by_sp($id);
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
        echo "<pre>";
        print_r($_POST);
        print_r($_FILES);
        $ten_sp=$_POST['ten_sp'];
        $id_hang=$_POST['hang'];
        $id_loai=$_POST['loai'];
        $imgs=$_FILES['img']['name'];
        $mo_ta=$_POST['mo_ta'];
        $id_dt=$_POST['dt'];
        $gia=$_POST['gia'];
        $so_luong=$_POST['so_luong'];
        $id=insert_san_pham($ten_sp,$mo_ta,$id_loai,$id_hang);
        insert_imgs($id,$imgs);
        insert_gia_chi_tiet($id,$id_dt,$gia,$so_luong);
    }
}
?>