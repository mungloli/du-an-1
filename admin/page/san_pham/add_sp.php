<?
extract($data['list_loai']);
extract($data['list_hang']);
extract($data['list_dt']);
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
                    <h1 class="font-medium text-3xl">Quản lý sản phẩm</h1>
                </div>
                <div class="m-3 bg-white p-3 rounded-lg h-full">
                    <div class="pb-4">
                        <h2 class="font-medium text-xl">Thêm sản phẩm</h2>
                        <div>
                            <form action="" class="flex ">
                                <div class="w-1/2">
                                    <label class="mt-5 block">
                                        <span class="font-medium text-lg">ID:</span>
                                        <input class="block mt-1 border h-10 rounded-md outline-none p-1" type="text" value="Auto Number">
                                    </label>
                                    <label class="mt-5 block">
                                        <span class="font-medium text-lg">Tên sản phẩm</span> 
                                        <input class="block mt-1 border h-10 rounded-md outline-none p-1" type="text">
                                    </label>
                                    <label>
                                        <span class="text-lg font-medium">Thương hiệu</span> 
                                        <select name="" id="">
                                            <?php 
                                            foreach($list_hang as $hang){
                                                ?>
                                                <option value="<?=$hang['id']?>"><?=$hang['name']?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </label>
                                    <label class="ml-5">
                                        <span class="text-lg font-medium">Loại hàng:</span> 
                                        <select name="" id="">
                                        <?php 
                                            foreach($list_loai as $loai){
                                                ?>
                                                <option value="<?=$loai['id']?>"><?=$loai['name']?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </label>
                                    <label class="mt-5 block">
                                        <span class="text-lg font-medium">Ảnh: </span>
                                        <input class="ml-3" type="file">
                                    </label>
                                    
                                </div>
                                <div>
                                    <p class="text-lg font-medium">Chọn option</p>
                                    <div>
                                        <?php 
                                        foreach($list_dt as $dt){
                                            ?>
                                                <div class="mt-2">
                                                    <label class="mr-3" for="">
                                                        <input class="w-4 h-4" type="checkbox" name="" id="" value="<?=$dt['id']?>">
                                                        <span class="text-lg"></span><?=$dt['dungTichThuc']?> ml</span>
                                                    </label>
                                                    <input class="inputChild border outline-none pl-1 bg-gray-200 rounded-lg" type="text" disabled>
                                                    <input class="inputChild border outline-none pl-1 bg-gray-200 rounded-lg" type="text" name="" id="" disabled>                        
                                                </div>
                                            <?php
                                        }
                                            ?>
                                    </div>
                                    <label class="mt-5 block">
                                        <span class="text-lg font-medium">Mô tả</span>
                                        <textarea class="block border rounded-lg outline-none w w-full" name="" id=""></textarea>
                                    </label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="../public/js/main.js"></script>
</body>
</html>