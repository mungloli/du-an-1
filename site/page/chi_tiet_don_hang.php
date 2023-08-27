<?php 
extract($data['don_hang']);
extract($data['ct_don_hang']);
global $img_dir;
?>

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
</head>
<body class="">
    <?php
    include "site/layout/header.php";
    ?> 
    <main class="max-w-6xl mx-auto">
        <div class="mt-10">
            <h2 class="font-medium text-2xl">Chi tiết đơn hàng</h2>
        </div>
        <div>
            <div class="text-right py-3">
                <p>Đơn vị vận chuyển: <?=$don_hang['ten_vc']?> |<span> Đơn hàng đã hoàn thành</span></p>
            </div>
            <div class="flex gap-10 border-t py-5">
                <div class="w-3/4">
                    <?php 
                    $total=0;
                    foreach($ct_don_hang as $ctdt){
                        ?>
                        <div class="flex justify-between items-center h-max mt-2">
                            <div class="flex w-2/5 gap-3">
                                <img class="w-20 h-20" src="<?=$img_dir.$ctdt['img']?>" alt="">
                                <div class=w-3/4>
                                    <h2 class="text-xl font-medium"><?=$ctdt['name']?></h2>
                                    <p>Dung Tích: <?=$ctdt['dung_tich']?> ml</p>
                                </div>
                            </div>
                            <div class="text-center">
                                <p class="mb-1 font-medium">Số lượng</p>
                                <span><?=$ctdt['so_luong']?></span>
                            </div>
                            <div class="text-center">
                                <p class="mb-1 font-medium">Giá</p>
                                <span><?=number_format($ctdt['gia']*$ctdt['so_luong'])?> đ</span>
                            </div>
                            <div>
                                <button class="bg-green-900 text-white px-3 py-2">Đánh giá</button>
                            </div>
                        </div>
                        <?php
                        $total=$total + ($ctdt['gia']*$ctdt['so_luong']);
                    }
                    ?>
                    <div class="mt-5">
                        <div class="flex">
                            <div class="p-2 w-3/4 text-right border">
                                <p>Tạm tính</p>
                            </div>
                            <div class="p-2 w-1/4 text-right border">
                                <span><?=number_format($total)?> đ</span>
                            </div>
                        </div>
                        <div class="flex">
                            <div class="p-2 w-3/4 text-right border">
                                <p>Phí vận chuyển</p>
                            </div>
                            <div class="p-2 w-1/4 text-right border">
                                <span><?=number_format($don_hang['gia_vc'])?> đ</span>
                            </div>
                        </div>
                        <div class="flex">
                            <div class="p-2 w-3/4 text-right border">
                                <p>Thành tiền</p>
                            </div>
                            <div class="p-2 w-1/4 text-right border">
                                <span class="text-xl text-green-900 font-medium"><?=number_format($total + $don_hang['gia_vc']) ?> đ</span>
                            </div>
                        </div>
                        <div class="flex">
                            <div class="p-2 w-3/4 text-right border">
                                <p>Phương thức thanh toán</p>
                            </div>
                            <div class="p-2 w-1/4 text-right border">
                                <span>Thanh toán khi nhận hàng</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="w-1/4 border-l">
                    <p class="text-lg pl-5 font-medium">Thông tin nhận hàng</p>
                    <div class="p-5">
                        <p class="leading-8">Họ tên: <?=$don_hang['ten_kh']?></p>
                        <p class="leading-8">STĐ: <?=$don_hang['sdt']?></p>
                        <p class="leading-8">Địa chỉ: <?=$don_hang['dia_chi']?></p>
                    </div>
                </div>
        </div>
        <div class="absolute">

        </div>
    </main>
    <?php require "site/layout/footer.php"?>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="slick/slick.min.js"></script>
</body>
</html>