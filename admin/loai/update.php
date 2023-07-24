<?php
    if(is_array($loai)){
        extract($loai);
    }
?>
<div class="row frmcontent">
    <h1>CẬP NHẬT LOẠI HÀNG HÓA</h1>
    <form action="index.php?act=updateloai" method="post">
        <label for="">Mã loại</label><br>
        <input type="text" name="maloai" placeholder="auto number" disabled ><br><br>
        <label for="">Tên loại</label><br>
        <input type="text" name="tenloai" value="<?php if(isset($name)&&($name!="")) echo $name;?>"><br><br>
        <input type="hidden" name="id" value="<?php if(isset($id)&&($id>0)) echo $id;?>">
        <input type="submit" value="Cập nhật" name="capnhat" >
        <input type="reset" value="Nhập lại" name="" >
        <a href="index.php?act=lisloai"><input type="button" value="Danh sách" name="" ></a>

        <?php
            if(isset($thongbao)&&($thongbao!=""))
            echo $thongbao;
        ?>
    </form>
</div>
