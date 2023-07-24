<div class="row frmcontent">
        <h1>THÊM MỚI LOẠI HÀNG HÓA</h1>
        <form action="index.php?act=addloai" method="post">
            <label for="">Mã loại</label><br>
            <input type="text" name="maloai" placeholder="auto number" disabled ><br><br>
            <label for="">Tên loại</label><br>
            <input type="text" name="tenloai" id="rong"><br><br>
            <input type="submit" value="Thêm mới" name="themmoi" >
            <input type="reset" value="Nhập lại" name="" >
            <a href="index.php?act=lisloai"><input type="button" value="Danh sách" name="" ></a>

            <?php
                if(isset($thongbao)&&($thongbao!=""))
                echo $thongbao;
            ?>
        </form>
    </div>