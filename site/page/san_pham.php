<?php 
extract($data['dshang']);
extract($data['dsnew']);
extract($data['dsloai']);
global $img_dir;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
  <!-- // Add the new slick-theme.css if you want the default styling -->
  <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="tailwind.config.js"></script>
  <link rel="stylesheet" href="public/css/style.css">
  <link rel="stylesheet" href="public/css/san_pham.css">
</head>
<body>
    <?php
    include "site/layout/header.php";
    ?>
    <main class="max-w-6xl mx-auto">
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
                                $price=select_gia_min_max_san_pham($id);
                                $hinh=$img_dir.$img;
                                if(($i==2) || ($i==5) || ($i==8)){
                                    $mr="";
                                }else{
                                    $mr="mr";
                                }
                                echo '<div class="product">
                                <div class="sp1 '.$mr.'">
                                <a href=""><img class="" src="'.$hinh.'" alt=""></a>
                                <strong>'.$name.'</strong>
                                <i class="fa-regular fa-star" style="color: rgb(234, 121, 80); margin-left: 30px;"></i>
                                <i class="fa-regular fa-star" style="color: rgb(234, 121, 80);"></i>
                                <i class="fa-regular fa-star" style="color: rgb(234, 121, 80);"></i>
                                <i class="fa-regular fa-star" style="color: rgb(234, 121, 80);"></i>
                                <i class="fa-regular fa-star" style="color: rgb(234, 121, 80);"></i>
                                <div class="price">
                                    <strong>'.number_format($price["gia_min"]).' đ - '.number_format($price["gia_max"]).' đ</strong>
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
    </main>
    <?php require "site/layout/footer.php"?>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script>
         const active = document.querySelectorAll(".active");
        const icon = document.querySelectorAll(".fa-angle-up");
        const clickicon = document.querySelectorAll(".clickicon");
        const icon3 = document.querySelectorAll(".fa-eye");
        const nut = document.querySelectorAll(".nut");
        const closebtn = document.querySelectorAll(".closebtn");
        const ttct = document.querySelectorAll(".ttct");

        clickicon.forEach((item, index) => {
                item.addEventListener("click", () => {
                icon[index].classList.toggle("fa-angle-up");
                icon[index].classList.toggle("fa-angle-down");
                active[index].classList.toggle("down");
            });
        });

        nut.forEach((item, index) => {
                item.addEventListener("click", () => {
                icon3[index].classList.toggle("fa-eye");
                icon3[index].classList.toggle("fa-eye");
                ttct[index].classList.toggle("top");
            });
        });

        closebtn.forEach((item, index) => {
                item.addEventListener("click", () => {
                ttct[index].classList.toggle("top");
            });
        });
    </script>
    </body>
</html>