
<?php 
extract($data['list_cart']);
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
</head>
<body>
    <?php
    include "site/layout/header.php";
    ?> 
        <main class="w-[1180px] mx-auto mt-5 ">
            <div class="border rounded-xl px-5 py-4">
                <h1 class="text-4xl font-medium">Giỏ hàng</h1>
            </div>
            <div class="border rounded-xl mt-5 gap-5 p-3 flex">
            <div class="w-3/4">
            <form action="">
            <?php 
            $total=0;
            foreach($list_cart as $cart){
                ?>
                
                <div class="flex items-center justify-between border-b py-3">
                        <div class="flex gap-5 w-1/2">
                            <input class="hidden id_cart" type="text" value="<?=$cart['id']?>">
                            <img class="h-20 w-20" src="<?=$img_dir.$cart['img']?>" alt="">
                            <div class="w-3/4 overflow-hidden">
                                <div class="h-8 overflow-hidden">
                                    <h2 class="text-xl font-medium"><?=$cart['ten_sp']?></h2><span><?=$cart['dung_tich']?>ml</span>
                                </div>
                                <p class="font-medium leading-6">Thương hiệu: <span><?=$cart['ten_hang']?></span></p>
                                <p class="font-medium leading-6">Danh mục: <span><?=$cart['ten_loai']?></span></p>
                            </div>
                        </div>
                        <div class="text-center">
                        <p class="font-medium mb-3">Giá</p>
                        <input class="hidden price" type="text" value="<?=$cart['gia']?>">
                        
                        <span class=""><?=number_format($cart['gia'])?></span>
                        </div>
                        <div class="text-center">
                            <p class="font-medium mb-3">Số lượng</p>
                            <button type="button"  class="p-1 minus"><i class="fa-solid fa-minus"></i></button>
                            <input class="w-10 text-center amount" value="<?=$cart['so_luong']?>">
                            <button id=""  type="button" class="p-1 plus"><i class="fa-solid fa-plus"></i></button>
                        </div>
                        <div class="text-center">
                            <p class="font-medium mb-3">Thành tiền</p>
                            <span class="show_price"></span><span> VND</span>
                        </div>
                        <div class="">
                            <a class="text-lg" href="index.php?ctl=delete_sp_cart&id=<?=$cart['id']?>"><i class="fa-solid fa-trash"></i></a>
                        </div>
                    </div>
                <?php
                $total += ($cart['gia'] * $cart['so_luong']);
            }
            ?>
               </div>
                <div class="w-1/4 border rounded-xl p-3 h-max">
                    <div class="mt-2 text-center">
                        <h2 class="font-medium text-xl mb-5">Tổng tiền</h2>
                        <div class="flex justify-center gap-2">
                            <p id="total" class="font-medium text-green-900 text-2xl"></p>
                            <span class="font-medium text-green-900 text-2xl"> VND</span>
                        </div>
                    </div>
                    <div class="mt-10">
                        <a href="index.php?ctl=checkout_cart"><button class="w-full h-10 bg-green-900 text-white text-xl font-medium rounded-lg" type="button">Thanh toán ngay</button></a>
                        <a href="index.php?ctl=sanpham"><button type="button" class="w-full h-10 bg-green-900 text-xl font-medium text-white rounded-lg mt-3">Tiếp tục mua hàng</button></a>
                    </div>   
                </div>
                </form>
            </div>
        </main>

     <?php require "site/layout/footer.php"?>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="slick/slick.min.js"></script>
    <script>
       
        var minus= document.querySelectorAll('.minus');
        var plus =document.querySelectorAll('.plus');
        var count=document.querySelectorAll('.amount');
        var price=document.querySelectorAll('.price');
        var show_price=document.querySelectorAll('.show_price');
        var total =document.getElementById('total');
        var list_id_cart=document.querySelectorAll('.id_cart');
        function render(amount,index){
            count[index].value=amount;
            let money= price[index].value *amount;
            show_price[index].innerHTML=money;
            let total_value=0;
            show_price.forEach(element=>{
                total_value += parseInt(element.innerHTML);
            })
            total.innerText=total_value;
        }
        
        
        
        function update_sl_data(so_luong,id_cart){
            let html = new XMLHttpRequest();
            
            console.log(id_cart);
            let data={
                sl: so_luong,
                id_cart: id_cart};
            let json_data=JSON.stringify(data);
            html.open('post','http://localhost/du-an-1/ajax/cart.php',true);
            html.onreadystatechange = function() {
                if (html.readyState === 4 && html.status === 200) {
                    console.log(html.responseText);
                }
            }
            html.send(json_data);
        }
        count.forEach((element,index)=>{
            element.addEventListener('input',()=>{
               let amount=element.value;
                // amount=parseInt(amount);
                amount=(isNaN(amount)||amount==0 ? 1:amount);
                render(amount,index);
            });
        })
        minus.forEach((element,index)=>{
            element.addEventListener('click',e=>{
                let value=count[index].value;
                let id_cart=list_id_cart[index].value;
                value--;
                render(value,index);
                update_sl_data(value,id_cart);
            })
        })
        plus.forEach((element,index)=>{
            element.addEventListener('click',e=>{
                let value=count[index].value;
                let id_cart=list_id_cart[index].value;
                value++;
                render(value,index);
                update_sl_data(value,id_cart);
            })
        })
        show_price.forEach((element,index)=>{
            let amount=count[index].value;
            render(amount,index);
        })
    </script>
    </body>
</html>