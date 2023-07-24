
        <div class="box-cent">
            <div class="box-left">
                <?php
                    include "boxleft.php";
                ?>
            </div>
                <div class="content">
                    <div class="blog">Tất cả sản phẩm</div>
                    <div class="view">
                        <div class="sel">
                            <strong>Xếp theo:</strong>
                            <input type="radio" name="sp"><a href="">Hàng mới</a>
                            <input type="radio" name="sp"><a href="">Giá thấp đến cao</a>
                            <input type="radio" name="sp"><a href="">Giá cao xuống thấp</a>
                        </div>
                        <div class="navbar"> Xem:
                            <div class="col">
                                <i class="fa-sharp fa-solid fa-table-cells"></i> Lưới
                            </div>
                            <div class="rol">
                                <i class="fa-solid fa-list"></i> Cột
                            </div>
                        </div>
                    </div>
                    <div class="block-ct">
                        <?php
                            $i=0;
                            foreach ($dsnew as $sp) {
                                extract($sp);
                                $hinh=$img_path.$anh;
                                if(($i==2) || ($i==5) || ($i==8)){
                                    $mr="";
                                }else{
                                    $mr="mr";
                                }
                                echo '<div class="product">
                                <div class="sp1 '.$mr.'">
                                <a href=""><img src="'.$hinh.'" alt=""></a>
                                <strong>'.$name.'</strong>
                                <i class="fa-regular fa-star" style="color: rgb(234, 121, 80); margin-left: 30px;"></i>
                                <i class="fa-regular fa-star" style="color: rgb(234, 121, 80);"></i>
                                <i class="fa-regular fa-star" style="color: rgb(234, 121, 80);"></i>
                                <i class="fa-regular fa-star" style="color: rgb(234, 121, 80);"></i>
                                <i class="fa-regular fa-star" style="color: rgb(234, 121, 80);"></i>
                                <div class="price">
                                    <strong>'.$price.'đ</strong>
                                </div>
                                <div class="sp2">
                                    <div class="nut" style="margin-left: 30px;">
                                        <i class="fa-sharp fa-solid fa-cart-plus priv"></i>     
                                        <i class="fa-regular fa-heart priv"></i>
                                        <i class="fa-solid fa-eye priv" ></i>
                                    </div>
                                    <div class="ttct">
                                        <div class="image">
                                            <img src="./view/image/Screenshot 2023-07-07 160651.png" alt="">
                                        </div>
                                        <div class="ttsp">
                                            <strong>Flavia Elite EDP</strong>
                                            <p>Trạng thái: Còn hàng</p>
                                            <hr>
                                            <strong >315.000đ</strong>
                                            <hr>
                                            <p>Giới tính:Unisex nhóm hương: Lôi cuốn, thanh lịch, tinh tế hương </p>
                                            Giới tính: <input type="text" name="" value="UNISEX" readonly><br>
                                            Xuất xứ: <input type="text" name="" value="Pháp" readonly><br>
                                            Dung tích: <input type="text" name="" value="CHIẾT 10ML" readonly> <input type="text" name="" value="CHIẾT 20ML" readonly> 
                                                        <input type="text" name="" value="CHIẾT 30ML" readonly> <input type="text" name="" value="Fullbox 50ML" readonly><br>
                                            Số lượng: <input type="text" name="" value="1"> <input type="submit" name="" value="Thêm vào giỏ hàng">
                                        </div>
                                        <a href="" class="closebtn">&times;</a>
                                    </div>
                                </div>
                            </div>
                        </div>';
                        $i+=1;
                        }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>