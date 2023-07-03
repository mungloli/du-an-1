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
    
    <div class="slide-show">
       <div><img src="public/img/slider_1.webp" alt=""></div>
       <div><img src="public/img/slider_2.webp" alt=""></div>
       <div><img src="public/img/slider_3.webp" alt=""></div>
    </div>
    <?php 
    foreach($list_loai as $loai ){
    ?>
      <section class="perfume_men_product">
      <div class="max-w-6xl mx-auto">
        <div class="bg-[#064a38] p-2">
          <a href="#"><h2 class="font-bold uppercase text-white"><?=$loai['name']?></h2></a>          
        </div>
        <div class="banner_product relative">
          <a href="#"><img src="public/img/product_banner_1.webp" alt=""></a>
        </div>
        <div class="product_list">
          <div class=" grid grid-cols-5">
            <?php 
            $id_loai=$loai['id'];
            $list_sanPham=select_san_pham_by_loai($id_loai);
            foreach($list_sanPham as $san_pham){
              ?>
              <div class="product pb-4 border px-3">
              <img src="public/img/19bdcdbc-e405-4f18-89a0-8ba031e7269b.jpg" alt="">
              <div class="mt-1">
                <a href="#"><h3 class="name_product font-semibold"><?=$san_pham['name']?></h3></a>
                <div class="mt-3">
                  <span><i class="text-sm text-yellow-400 fa-regular fa-star"></i></span>
                  <span><i class="text-sm text-yellow-400 fa-regular fa-star"></i></span>
                  <span><i class="text-sm text-yellow-400 fa-regular fa-star"></i></span>
                  <span><i class="text-sm text-yellow-400 fa-regular fa-star"></i></span>
                  <span><i class="text-sm text-yellow-400 fa-regular fa-star"></i></span>
                </div>
                <div>
                  <div class=" text-green-900 font-semibold h-10 relative">
                    <div class="price_product relative">
                      <span>765.000đ</span><span class="mx-1">-</span><span>1.160.000đ</span>
                    </div>
                    <div class="interact_product">
                      <button class="btn_product border border-green-900 rounded w-8 h-8 hover:bg-green-900"><i class="icon_product text-green-900 fa-solid fa-cart-plus"></i></button>
                      <button class="btn_product border border-green-900 rounded w-8 h-8 hover:bg-green-900"><i class="icon_product text-green-900 fa-regular fa-eye"></i></button>
                      <button class="btn_product border border-green-900 rounded w-8 h-8 hover:bg-green-900"><i class="icon_product text-green-900 fa-regular fa-heart"></i></button>
                    </div>
                  </div>
                </div> 
              </div>
            </div>
              <?php
            }
            ?>
          </div>
        </div>
        <div class="text-center p-3">
          <button class="px-4 py-2 bg-[#064a38] text-white hover:bg-green-950">Xem tất cả <i class="text-xs fa-solid fa-caret-right"></i></button>
        </div>
      </div>
    </section>
    <?php
    }
    ?>
    
    <!-- <section class="perfume_women_product">
      <div class="max-w-6xl mx-auto">
        <div class="bg-[#064a38] p-2">
          <a href="#"><h2 class="font-bold uppercase text-white">Nước hoa nữ</h2></a>          
        </div>
        <div class="banner_product relative">
          <a href="#"><img src="public/img/product_banner_1.webp" alt=""></a>
        </div>
        <div class="product_list">
          <div class=" grid grid-cols-5">
            <div class="product pb-4 border px-3">
              <img src="public/img/19bdcdbc-e405-4f18-89a0-8ba031e7269b.jpg" alt="">
              <div class="mt-1">
                <a href="#"><h3 class="name_product font-semibold">Creed Aventus For Men EDP</h3></a>
                <div class="mt-3">
                  <span><i class="text-sm text-yellow-400 fa-regular fa-star"></i></span>
                  <span><i class="text-sm text-yellow-400 fa-regular fa-star"></i></span>
                  <span><i class="text-sm text-yellow-400 fa-regular fa-star"></i></span>
                  <span><i class="text-sm text-yellow-400 fa-regular fa-star"></i></span>
                  <span><i class="text-sm text-yellow-400 fa-regular fa-star"></i></span>
                </div>
                <div>
                  <div class=" text-green-900 font-semibold h-10 relative">
                    <div class="price_product relative">
                      <span>765.000đ</span><span class="mx-1">-</span><span>1.160.000đ</span>
                    </div>
                    <div class="interact_product">
                      <button class="btn_product border border-green-900 rounded w-8 h-8 hover:bg-green-900"><i class="icon_product text-green-900 fa-solid fa-cart-plus"></i></button>
                      <button class="btn_product border border-green-900 rounded w-8 h-8 hover:bg-green-900"><i class="icon_product text-green-900 fa-regular fa-eye"></i></button>
                      <button class="btn_product border border-green-900 rounded w-8 h-8 hover:bg-green-900"><i class="icon_product text-green-900 fa-regular fa-heart"></i></button>
                    </div>
                  </div>
                </div> 
              </div>
            </div>
          </div>
        </div>
        <div class="text-center p-3">
          <button class="px-4 py-2 bg-[#064a38] text-white hover:bg-green-950">Xem tất cả <i class="text-xs fa-solid fa-caret-right"></i></button>
        </div>
      </div>
    </section> -->
    <!-- <section class="perfume_unisex_product">
      <div class="max-w-6xl mx-auto">
        <div class="bg-[#064a38] p-2">
          <a href="#"><h2 class="font-bold uppercase text-white">Nước hoa nam</h2></a>          
        </div>
        <div class="banner_product relative">
          <a href="#"><img src="public/img/product_banner_1.webp" alt=""></a>
        </div>
        <div class="product_list">
          <div class=" grid grid-cols-5">
            <div class="product pb-4 border px-3">
              <img src="public/img/19bdcdbc-e405-4f18-89a0-8ba031e7269b.jpg" alt="">
              <div class="mt-1">
                <a href="#"><h3 class="name_product font-semibold">Creed Aventus For Men EDP</h3></a>
                <div class="mt-3">
                  <span><i class="text-sm text-yellow-400 fa-regular fa-star"></i></span>
                  <span><i class="text-sm text-yellow-400 fa-regular fa-star"></i></span>
                  <span><i class="text-sm text-yellow-400 fa-regular fa-star"></i></span>
                  <span><i class="text-sm text-yellow-400 fa-regular fa-star"></i></span>
                  <span><i class="text-sm text-yellow-400 fa-regular fa-star"></i></span>
                </div>
                <div>
                  <div class=" text-green-900 font-semibold h-10 relative">
                    <div class="price_product relative">
                      <span>765.000đ</span><span class="mx-1">-</span><span>1.160.000đ</span>
                    </div>
                    <div class="interact_product">
                      <button class="btn_product border border-green-900 rounded w-8 h-8 hover:bg-green-900"><i class="icon_product text-green-900 fa-solid fa-cart-plus"></i></button>
                      <button class="btn_product border border-green-900 rounded w-8 h-8 hover:bg-green-900"><i class="icon_product text-green-900 fa-regular fa-eye"></i></button>
                      <button class="btn_product border border-green-900 rounded w-8 h-8 hover:bg-green-900"><i class="icon_product text-green-900 fa-regular fa-heart"></i></button>
                    </div>
                  </div>
                </div> 
              </div>
            </div>
          </div>
        </div>
        <div class="text-center p-3">
          <button class="px-4 py-2 bg-[#064a38] text-white hover:bg-green-950">Xem tất cả <i class="text-xs fa-solid fa-caret-right"></i></button>
        </div>
      </div>
    </section> -->
    <div class="blog p-7">
      <div class="max-w-6xl mx-auto border">
        <div class="text-center py-4">
          <h3 class="font-bold uppercase text-2xl border-b border-green-950 inline">Thông tin</h3>
        </div>
        <div class="grid grid-cols-4">
          <div class="p-3">
            <a href=""><img src="public/img/posts1.webp" alt=""></a>
            <div>
              <h2 class="hover:text-green-800 font-bold">05 chai nước hoa thơm lâu mà nam giới không nên bỏ qua</h2>
              <div class="py-2"><span class="text-gray-400 text-sm">Đăng bởi <b>MungLoli</b> - 14/2/2023</span></div>
              <p class="text-gray-600 text-sm">Đâu là mùi hương nước hoa thơm lâu cho nam? Chính là câu hỏi mà hầu hết nam giới quan tâm muốn bi...</p>
            </div>
          </div>
          <div class="p-3">
            <a href=""><img src="public/img/posts1.webp" alt=""></a>
            <div>
              <h2 class="hover:text-green-800 font-bold">05 chai nước hoa thơm lâu mà nam giới không nên bỏ qua</h2>
              <div class="py-2"><span class="text-gray-400 text-sm">Đăng bởi <b>MungLoli</b> - 14/2/2023</span></div>
              <p class="text-gray-600 text-sm">Đâu là mùi hương nước hoa thơm lâu cho nam? Chính là câu hỏi mà hầu hết nam giới quan tâm muốn bi...</p>
            </div>
          </div>
          <div class="p-3">
            <a href=""><img src="public/img/posts1.webp" alt=""></a>
            <div>
              <h2 class="hover:text-green-800 font-bold">05 chai nước hoa thơm lâu mà nam giới không nên bỏ qua</h2>
              <div class="py-2"><span class="text-gray-400 text-sm">Đăng bởi <b>MungLoli</b> - 14/2/2023</span></div>
              <p class="text-gray-600 text-sm">Đâu là mùi hương nước hoa thơm lâu cho nam? Chính là câu hỏi mà hầu hết nam giới quan tâm muốn bi...</p>
            </div>
          </div>
          <div class="p-3">
            <a href=""><img src="public/img/posts1.webp" alt=""></a>
            <div>
              <h2 class="hover:text-green-800 font-bold">05 chai nước hoa thơm lâu mà nam giới không nên bỏ qua</h2>
              <div class="py-2"><span class="text-gray-400 text-sm">Đăng bởi <b>MungLoli</b> - 14/2/2023</span></div>
              <p class="text-gray-600 text-sm">Đâu là mùi hương nước hoa thơm lâu cho nam? Chính là câu hỏi mà hầu hết nam giới quan tâm muốn bi...</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php require "site/layout/footer.php"?>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="slick/slick.min.js"></script>
    <script>
    $(document).ready(function(){
      $(".slide-show").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1000,
      });
    });
    </script>
</body>
</html>