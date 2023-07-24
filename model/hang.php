<?php
    function insert_hang($tenhang){
        $sql="insert into hang(name) values('$tenhang')";
        pdo_execute($sql);
    }

    function loadall_hang(){
        $sql="select * from hang order by id desc";
        $listhang = pdo_query($sql);
        return $listhang;
    }

    function loadone_hang($id){
        $sql="select * from hang where id=".$id;
        $hang=pdo_query_one($sql);
        return $hang;
    }

    function update_hang($id, $tenhang){
        $sql="update hang set name='".$tenhang."' where id=".$id;
        pdo_execute($sql);
    }

    function delete_hang($id){
        $sql="delete from hang where id=".$id;
        pdo_execute($sql);
    }
?>
