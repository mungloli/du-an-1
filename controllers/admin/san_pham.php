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
    
}
?>