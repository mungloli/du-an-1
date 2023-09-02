<?php
    function dashboard(){
        $list_loai=loai_all();
        location('dashboard',['list_loai'=>$list_loai]);
    }

?>