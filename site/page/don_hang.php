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
        <div class="max-w-6xl mx-auto">
            <div class="flex border-y-2 py-4 items-center">
                <img class="w-[80px] h-[80px]" src="../../public/img/19bdcdbc-e405-4f18-89a0-8ba031e7269b.jpg" alt="">
                <div class="flex-1 ml-4 h-full">
                    <h2 class="font-medium text-2xl">Nước hoa</h2>
                    <p class="text-lg my-1">Dung tích: 50ml</p>
                    <span class="text-lg">Số lượng: 3</span>
                </div>
                <div class="justify-end ">
                    <p class="text-xl">480.000đ</p>
                </div>
            </div>
            <div class="py-3 text-right">
                <p class="text-2xl text-green-900">Tổng tiền: 480.000</p>
            </div>
            <div class="border-t-2 flex justify-between pt-3">
                <p class="text-green-600"><i class="mr-2 fa-solid fa-truck-fast"></i>Đang giao hàng</p>
                <div>
                    <button class="px-5 py-4 bg-green-900 text-white text-lg font-medium">Xác nhận đã lấy hàng</button>
                </div>
                
            </div>
        </div>
    </main>
    <?php require "site/layout/footer.php"?>
</body>
</html>