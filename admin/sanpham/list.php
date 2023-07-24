<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../admin/css/style.css">

</head>
<body>
<div class="col frmcontent">
<h1>DANH SÁCH SẢN PHẨM</h1>
    <div class="col m10 m11">
        <table>
            <tr>
                <th>MÃ LOẠI</th>
                <th>MÃ HÀNG</th>
                <th>TÊN SẢN PHẨM</th>
                <th>HÌNH</th>
                <th>GIÁ</th>
                <th></th>
            </tr>
            <?php
                foreach ($listsanpham as $sanpham){
                    extract($sanpham);
                    $suasp="index.php?act=suasp&id=".$id;
                    $xoasp="index.php?act=xoasp&id=".$id;
                    $hinhpath="../upload/".$anh;
                    if(is_file($hinhpath)){
                        $hinh="<img src='".$hinhpath."' height='100'>";
                    }else{
                        $hinh="no photo";
                    }
                    echo '
                    <tr>
                        <td>'.$id_loai.'</td>
                        <td>'.$id_hang.'</td>
                        <td>'.$name.'</td>
                        <td>'.$hinh.'</td>
                        <td>'.$price.'</td>
                        <td><a href="'.$suasp.'"><input type="button" value="Sửa"></a>-<a href="'.$xoasp.'"><input type="button" value="Xoá"></a></td>
                    </tr>';
                }
            ?>

        </table>
    </div>
    <input type="button" value="Chọn tất cả">
    <input type="button" value="Bỏ chọn tất cả">
    <input type="button" value="Xoá các mục chọn">
    <a href="index.php?act=addsp"><input type="button" value="Nhập thêm"></a>
</div>
</body>
</html>