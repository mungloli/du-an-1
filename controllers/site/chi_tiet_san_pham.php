<?php 
function chi_tiet_san_pham(){
    $id=$_GET['id'];
    $yeu_thich=select_yeu_thich_by_sp($id);
    $san_pham=select_san_pham_by_id($id);
    $dung_tich=select_dung_tich();
    // $loai_sp=select_gioi_tinh($id);
    view('page/chi_tiet_san_pham',['san_pham' => $san_pham,'dung_tich'=>$dung_tich,'yeu_thich'=>$yeu_thich]);
}

?>