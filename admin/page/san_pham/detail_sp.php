<?
extract($data['detail_sp']);
extract($data['gia_chi_tiet']);
extract($data['imgs_sp']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="tailwind.config.js"></script>
</head>
<body class="bg-gray-200">
    <div class="flex min-h-screen">
        <?php require "layout/sidebar.php"?>
        <div class="w-5/6">
        <?php require "layout/header.php"?>
            <div class="">
                <div class="bg-white rounded-xl m-3 h-16 pl-3 flex items-center">
                    <h1 class="font-medium text-3xl">Quản lý Tài khoản</h1>
                </div>
                <div class="m-3 bg-white p-5 rounded-lg">
                    <h2 class="text-3xl font-medium">Thông tin sản phẩm</h2>
                    <div class="mt-5">
                        <div class="flex">
                            <div class="w-1/2">
                                <h4 class="text-2xl font-medium text-green-800">ID: <?=$detail_sp['id_sp']?></h4>
                                <h2 class="text-2xl py-1 font-medium text-green-800">Tên sản phẩm: <?=$detail_sp['name_sp']?></h2>
                                <p class="text-lg py-1 font-medium">Thương hiệu: <?=$detail_sp['name_hang']?></p>
                                <p class="text-lg font-medium">Loại: <?=$detail_sp['name_loai']?></p>
                                    <div class="mt-2">
                                        <h2 class="font-medium text-lg">Ảnh sản phẩm</h2>
                                        <div class="flex items-center gap-x-5">
                                        <?php
                                        foreach($imgs_sp as $img){
                                            ?>
                                            <div class="my-2">
                                                <img class="w-[60px] h-[60px]" src="../public/img/<?=$img['img']?>" alt="">
                                            </div>
                                            <?php
                                        }
                                        ?>
                                        </div>
                                    
                                    </div>
                            </div>
                                <div class="w-1/2">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="border w-28">Dung tích</th>
                                                <th class="border w-28">Giá tiền</th>
                                                <th class="border w-28">Số lượng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach($gia_chi_tiet as $gct){
                                                    ?>
                                                    <tr>
                                                        <td class="border text-center"><?=$gct['dung_tich']?> ml</td>
                                                        <td class="border text-center"><?=$gct['gia']?></td>
                                                        <td class="border text-center"><?=$gct['so_luong']?></td>
                                                    </tr>
                                                    <?php
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                    <div class="border-t mt-3 pt-5 w-full">
                                    <h2 class="font-medium text-2xl  mb-3">Mô tả</h2>
                                    <p class="text-lg text"><?=$detail_sp['mo_ta']?></p>

                            </div>
                            </div>
                        </div>  
                    </div>
                    <div class="mt-8">
                        <a class="px-3 py-2 bg-green-800 text-white rounded-xl" href="">Chỉnh sửa sản phẩm</a>
                        <a class="px-3 py-2 bg-green-800 text-white rounded-xl" href="">Danh sách sản phẩm</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
</body>
</html>