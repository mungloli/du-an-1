<?php
    function insert_sanpham($tensp,$giasp,$anh,$id_loai,$id_hang){
        $sql="insert into san_pham(name,price,anh,id_loai,id_hang ) values('$tensp','$giasp','$anh','$id_loai','$id_hang')";
        pdo_execute($sql);
    }

    function loadall_sanpham_home(){
        $sql="select * from san_pham where 1 order by id desc limit 0,9";
        $listsanpham = pdo_query($sql);
        return $listsanpham;
    }

    function loadone_sanpham($id){
        $sql="select * from san_pham where id=".$id;
        $sp=pdo_query_one($sql);
        return $sp;
    }

    function loadall_sanpham($kyw="",$id_hang=0){
        $sql="select * from san_pham where 1";
        if($kyw!=""){
            $sql.=" and name like '%".$kyw."%'";
        }
        if($id_hang>0){
            $sql.=" and id_hang ='".$id_hang."'";
        }
        $sql.=" order by id desc";
        $listsanpham = pdo_query($sql);
        return $listsanpham;
    }

    function delete_sanpham($id){
        $sql="delete from san_pham where id=".$id;
        pdo_execute($sql);
    }

    function update_sanpham($id, $id_hang, $id_loai, $tensp, $giasp, $hinh){
        if($hinh!="")
            $sql="update san_pham set id_hang='".$id_hang."',id_loai='".$id_loai."',name='".$tensp."',price='".$giasp."',anh='".$hinh."' where id=".$id;
        else
            $sql="update san_pham set id_hang='".$id_hang."',id_loai='".$id_loai."',name='".$tensp."',price='".$giasp."' where id=".$id;
        pdo_execute($sql);
    }

    
?>