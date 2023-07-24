<?php
    if(is_array($sanpham)){
        extract($sanpham);
    }
    $hinhpath="../upload/".$anh;
    if(is_file($hinhpath)){
        $anh="<img src='".$hinhpath."' height='100'>";
    }else{
        $anh="no photo";
    }
?>
<div class="row frmcontent">
    <h1>CẬP NHẬT LOẠI HÀNG HÓA</h1>
    <form action="index.php?act=updatesp" method="post" enctype="multipart/form-data">

        <select name="id_loai" >
            <option value="0" selected>Tất cả</option>
            <?php
                foreach ($listloai as $loai) {
                    extract($loai);
                    if($id_loai==$id) $s="selected"; else $s="";
                        echo '<option value="'.$id.'" '.$s.'>'.$name.'</option>';
                }
            ?>
        </select><br><br>

        <select name="id_hang" >
            <option value="0" selected>Tất cả</option>
            <?php
                foreach ($listhang as $hang) {
                    extract($hang);
                    if($id_hang==$id) $s="selected"; else $s="";
                        echo '<option value="'.$id.'" '.$s.'>'.$name.'</option>';
                }
            ?>
        </select><br><br>

        <label for="">Tên sản phẩm</label><br>
        <input type="text" name="tensp" value=<?=$name?>><br><br>

        <label for="">Giá</label><br>
        <input type="text" name="giasp" id="rong" value="<?=$price?>"><br><br>

        <label for="">Hình</label><br>
        <input type="file" name="hinh" >
        <?=$anh?><br><br>

        <input type="hidden" name="id" value="<?=$id?>">
        <input type="submit" value="Cặp nhật" name="capnhat" >
        <input type="reset" value="Nhập lại" name="" >

        <a href="index.php?act=listsp"><input type="button" value="Danh sách" name="" ></a>

        <?php
            if(isset($thongbao)&&($thongbao!=""))
            echo $thongbao;
        ?>
    </form>
</div>
