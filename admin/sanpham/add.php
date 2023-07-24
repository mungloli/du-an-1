
<div class="row frmcontent">
    <h1>THÊM MỚI SẢN PHẢM</h1>
    <form action="index.php?act=addsp" method="post" enctype="multipart/form-data"> 
        <label for="">Loại</label><br>
        <select name="id_loai" >
            <?php
                foreach ($listloai as $loai) {
                    extract($loai);
                    echo '<option value="'.$id.'">'.$name.'</option>';
                }
            ?>
            <option value=""></option>
        </select><br><br>
        <label for="">Hàng</label><br>
        <select name="id_hang" >
            <?php
                foreach ($listhang as $hang) {
                    extract($hang);
                    echo '<option value="'.$id.'">'.$name.'</option>';
                }
            ?>
            <option value=""></option>
        </select><br><br>

        <label for="">Hình</label><br>
        <input type="file" name="anh" ><br><br>

        <label for="">Tên sản phẩm</label><br>
        <input type="text" name="tensp" id="rong"><br><br>

        <label for="">Giá</label><br>
        <input type="text" name="giasp" id="rong"><br><br>

        <input type="submit" value="Thêm mới" name="themmoi" >
        <input type="reset" value="Nhập lại" name="" >

        <a href="index.php?act=listsp"><input type="button" value="Danh sách" name="" ></a>

        <?php
            if(isset($thongbao)&&($thongbao!=""))
            echo $thongbao;
        ?>
    </form>
</div>
