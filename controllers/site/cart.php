<?php
    function list_cart(){
        if(!empty($_COOKIE['user'])){
            $user=json_decode($_COOKIE['user'],true);
            print_r($user);
            $list_cart=select_cart($user['id']);
            print_r($list_cart);
            view('page/gio_hang',['list_cart'=>$list_cart]);
        }else{
            echo "abc";
        }
        
    }
?>