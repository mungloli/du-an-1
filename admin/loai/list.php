<div class="col frmcontent">
    <div class="col m10">
        <table>
            <tr>
                <th>MÃ LOẠI</th>
                <th>TÊN LOẠI</th>
                <th></th>
            </tr>
            <?php
                foreach ($listloai as $loai){
                    extract($loai);
                    $sualoai="index.php?act=sualoai&id=".$id;
                    $xoaloai="index.php?act=xoaloai&id=".$id;
                    echo '
                    <tr>
                        <td>'.$id.'</td>
                        <td>'.$name.'</td>
                        <td><a href="'.$sualoai.'"><input type="button" value="Sửa"></a>|<a href="'.$xoaloai.'"><input type="button" value="Xoá"></a></td>
                    </tr>';
                }
            ?>

        </table>
    </div>
    <input type="button" value="Chọn tất cả">
    <input type="button" value="Bỏ chọn tất cả">
    <input type="button" value="Xoá các mục chọn">
    <a href="index.php?act=addloai"><input type="button" value="Nhập thêm"></a>
</div>