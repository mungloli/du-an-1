<?php 
extract($data['don_hang']);
global $img_dir;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <?php require "site/layout/header.php"?>
    <main class="mt-20">
        <?php
        foreach($don_hang as $dh){
             $tong_tien=0;
            ?>
    <div class="max-w-6xl mx-auto mt-5 shadow-xl p-5">
                <?php 
                $ct_don_hang=select_chi_tiet_don_hang($dh['id']);
                foreach($ct_don_hang as $ctdh){
                    $tong_tien_sp= $ctdh['so_luong'] * $ctdh['gia'];
                    $tong_tien += $tong_tien_sp;
                    
                    ?>
                    <div class="flex py-4 items-center border-b">
                        <img class="w-[80px] h-[80px]" src="<?=$img_dir.$ctdh['img']?>" alt="">
                        <div class="flex-1 ml-4 h-full">
                            <h2 class="font-medium text-2xl"><?= $ctdh['name']?></h2>
                            <p class="text-lg my-1">Dung tích: <?=$ctdh['dung_tich'] ?>ml</p>
                            <span class="text-lg">Số lượng: <?= $ctdh['so_luong']?></span>
                        </div>
                        <div class="justify-end ">
                            <button id="<?=$dh['id']?>" value="" class="text-xl cursor-text"><?= number_format($ctdh['gia'])?> đ</button>
                        </div>
                    </div>
                    <?php
                }
                    ?>
            <div class="py-3 text-right">
                <p class="text-2xl text-green-900">Tổng tiền: <?= number_format($tong_tien)?> đ</p>
            </div>
            <div class="border-t-2 flex justify-between pt-3">
                <?php if($dh['trang_thai']==0){
                    echo '<p class="text-green-600"><i class="mr-2 fa-solid fa-truck-fast"></i>Đã xác nhận đơn hàng</p>';
                }else if($dh['trang_thai']==1){
                    echo '<p class="text-green-600"><i class="mr-2 fa-solid fa-truck-fast"></i>Đang giao hàng</p>';
                }else if($dh['trang_thai']==2){
                    echo '<p class="text-green-600"><i class="mr-2 fa-solid fa-truck-fast"></i>Đơn hàng đã đến nơi</p>
                    <div>
                    <button class="px-3 py-2 bg-green-900 text-white font-medium hover:bg-[#064a38] duration-300">Xác nhận đã lấy hàng</button>
                    </div>
                    ';
                    
                }
                
                ?>
                    <div>
                        <button class="px-3 py-2 bg-green-900 text-white font-medium hover:bg-[#064a38] duration-300">Xem chi tiết sản phẩm</button>
                        <button class="px-3 py-2 bg-green-900 text-white font-medium hover:bg-[#064a38] duration-300">Hủy đơn hàng</button>
                    </div>
                
                
            </div>
        </div>
        <?php
        
        }
        ?>
        
    </main>
    <?php require "site/layout/footer.php"?>
</body>
</html>