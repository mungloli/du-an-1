<div class="col frmcontent">
    <div class="col m10">
        <table>
            <tr>
                <th>MÃ LOẠI</th>
                <th>TÊN LOẠI</th>
                <th></th>
            </tr>
            <?php
                foreach ($listhang as $hang){
                    extract($hang);
                    $suahg="index.php?act=suahg&id=".$id;
                    $xoahg="index.php?act=xoahg&id=".$id;
                    echo '
                    <tr>
                        <td>'.$id.'</td>
                        <td>'.$name.'</td>
                        <td><a href="'.$suahg.'"><input type="button" value="Sửa"></a>|<a href="'.$xoahg.'"><input type="button" value="Xoá"></a></td>
                    </tr>';
                }
            ?>

        </table>
    </div>
    <input type="button" value="Chọn tất cả">
    <input type="button" value="Bỏ chọn tất cả">
    <input type="button" value="Xoá các mục chọn">
    <a href="index.php?act=addhang"><input type="button" value="Nhập thêm"></a>
</div>