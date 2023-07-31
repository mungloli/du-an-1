<?php 
function  don_hang(){
    if(empty($_COOKIE['uses'])){
        $user = json_decode($_COOKIE['user'],true);
        $id=$user['id'];
        $don_hang=select_don_hang($id);
        view('page/don_hang',['don_hang'=>$don_hang]);
    }
}

?>