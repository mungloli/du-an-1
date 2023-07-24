<?php
    function insert_loai($tenloai){
        $sql="insert into loai(name) values('$tenloai')";
        pdo_execute($sql);
    }

    function loadall_loai(){
        $sql="select * from loai order by id desc";
        $listloai = pdo_query($sql);
        return $listloai;
    }

    function loadone_loai($id){
        $sql="select * from loai where id=".$id;
        $loai=pdo_query_one($sql);
        return $loai;
    }

    function update_loai($id, $tenloai){
        $sql="update loai set name='".$tenloai."' where id=".$id;
        pdo_execute($sql);
    }

    function delete_loai($id){
        $sql="delete from loai where id=".$id;
        pdo_execute($sql);
    }
?>