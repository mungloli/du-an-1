<div class="row frmcontent">
        <h1>THÊM MỚI LOẠI HÀNG HÓA</h1>
        <form action="index.php?act=addhang" method="post">
            <label for="">Mã hàng</label><br>
            <input type="text" name="mahang" placeholder="auto number" disabled ><br><br>
            <label for="">Tên hàng</label><br>
            <input type="text" name="tenhang" id="rong"><br><br>
            <input type="submit" value="Thêm mới" name="themmoi" >
            <input type="reset" value="Nhập lại" name="" >
            <a href="index.php?act=lishang"><input type="button" value="Danh sách" name="" ></a>

            <?php
                if(isset($thongbao)&&($thongbao!=""))
                echo $thongbao;
            ?>
        </form>
    </div>