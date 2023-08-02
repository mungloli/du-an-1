<?php 
    extract($data['san_pham']);
    extract($data['dung_tich']);
    if(isset($data['yeu_thich'])){
        extract($data['yeu_thich']);
    }
    extract($data['imgs']);
    $id_sp=$san_pham['id'];
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
  <style>
    .yt_parent:hover .yt_child{
        color: rgb(22, 101, 52,) ;
    }
    /* chi tiết sản phẩm */
  .more_info{
    background:linear-gradient(180deg, rgba(255,255,255,0), rgba(255,255,255,0.33) 33%, rgba(255,255,255,0.8) 83%, #fff);
  }
  </style>
</head>
<body>
    <?php require "site/layout/header.php"?>
    <main>
        <div class="max-w-6xl mx-auto ">
            <div class="flex gap-8">
                <div class="w-2/5">
                    <div class="flex justify-center relative">
                    <div id="pre" class="absolute top-1/2 left-0 bg-slate-300 px-3 py-5"><i class="fa-solid fa-angle-left"></i></div>
                        <img class="h-80" id="img-show" src="" alt="">
                        <div id="next" class="absolute top-1/2 right-0 bg-slate-300 px-3 py-5"><i class="fa-solid fa-angle-right"></i></div>
                    </div>
                    
                    <div class="flex items-center mt-8 border p-3 gap-5">
                        <?php 
                            foreach ($imgs as $img) {
                                ?>
                                <div id="imgs" class="border-2"><img class="w-[80px] h-[80px]"  src="<?=$img_dir.$img['img']?>" alt=""></div>
                            <?php
                            }
                        ?>
                    </div>
                </div>
                <div class="w-3/5">
                    <h1 class="text-3xl font-medium"><?=$san_pham['name']?></h1>
                    <div class="">
                        <span><i class="text-sm text-yellow-400 fa-regular fa-star"></i></span>
                        <span><i class="text-sm text-yellow-400 fa-regular fa-star"></i></span>
                        <span><i class="text-sm text-yellow-400 fa-regular fa-star"></i></span>
                        <span><i class="text-sm text-yellow-400 fa-regular fa-star"></i></span>
                        <span><i class="text-sm text-yellow-400 fa-regular fa-star"></i></span>
                    </div>
                    <p>Tình trạng: <span id="tinh-trang" class="text-green-800 font-medium">Còn hàng</span></p>
                    <span id="gia" class="font-medium text-green-800 text-2xl"> đ</span>
                    <div class="mt-2">
                        <p>
                            <?=$san_pham['mo_ta']?>
                        </p>
                    </div>
                    <div class="mt-3">
                        <p class="font-medium">Danh mục: <span><?=$san_pham['ten_loai']?></span></p>
                    </div>
                    <form action="index.php?ctl=add_to_cart" method="post">
                        <input class="hidden" type="text" value="<?=$san_pham['id']?>" name="id-sp">
                        <div class="mt-2">
                            <span class="font-medium">Dung tích</span>
                            <div class="flex gap-3">
                                <?php
                                foreach($dung_tich as $dt){
                                    ?>
                                    <div class="relative w-max h-max mt-5">
                                        <input class="dung_tich absolute left-1/2 right-1/2 -z-10" type="radio" value="<?=$dt['id']?>" name="dung-tich" id="<?=$dt['dungTichThuc']?>">
                                        <label class="label_dt bg-white px-3 py-2 border-2" for="<?=$dt['dungTichThuc']?>"><?=$dt['dungTichThuc']?>ml</label>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="mt-10">
                            <span class="font-medium">Số lượng</span>
                            <div class="border w-max mt-2 flex">
                                <div id="minus" class="px-4 py-2 border-r hover:bg-green-800 text-lg cursor-pointer">-</div>
                                <input id="amount" class="w-10 text-center outline-none" type="text" value="1" name="so-luong">
                                <div id="plus" class="px-4 py-2 border-l hover:bg-green-800 text-lg cursor-pointer">+</div>
                            </div>
                        </div>
                        <div class="flex gap-5 mt-5" id="box_con_hang">
                            <a class="text-white font-medium rounded-lg bg-green-900 hover:bg-green-950 w-1/2 py-3 text-2xl text-center block" href="">Mua ngay</a>
                            <button class="text-white font-medium rounded-lg bg-green-900 hover:bg-green-950 w-1/2 py-3 text-2xl text-center" name="btn-add-cart">Thêm vào giỏ hàng</button>
                        </div>
                        <div class="mt-5 hidden" id="box_het_hang">
                            <button class="text-white font-medium rounded-lg bg-green-900 w-1/2 py-3 text-2xl text-center" disabled type="button">Sản phẩm tạm hết hàng</button>
                        </div>
                    </form>
                    <button id="btn_wishlist" onclick="wishlist()" value="<?=$san_pham['id']?>"
                             class="yt_parent mt-3 border w-max p-3 
                            hover:border-green-950 hover:text-green-950 cursor-pointer">
                        <i id="icon_wishlist" class="yt_child text-gray-200
                        <?php if(isset($yeu_thich)){
                                echo "text-green-900";
                            }?>
                        fa-solid fa-heart"></i>
                        <span id="text_wishlist" class="
                        <?php if(isset($yeu_thich)){
                                echo "text-green-900";
                            }?> yt_child">
                            <?php if(isset($yeu_thich)){
                                echo "Đã yêu thích";
                            }else{
                                echo"Thêm vào mục yêu thích";
                            }
                            ?></span>
                    </button>
                </div>
            </div>
            <div class="flex gap-5 mt-5">
                <div class="w-3/4">
                    <div class="bg-green-900 py-3 px-2">
                        <ul class="flex justify-between">
                            <li class="font-medium text-xl text-white">Thông tin sản phẩm</li>
                            <li class="font-medium text-xl text-white">Hưỡng dẫn sử dụng và bảo quản</li>
                            <li class="font-medium text-xl text-white">Chính sách đổi trả</li>
                            <li class="font-medium text-xl text-white">Đánh giá</li>
                        </ul>
                    </div>
                    <div class=" border px-3">
                        <div>
                            <div class="relative">
                                <p>
                                    Đứng top chai nước hoa nam thành công nhất hành tinh, 
                                    chính là nước hoa nam Bleu De Chanel EDP. Đối với những 
                                    anh "soái ca" đích thực đang tìm kiếm một mùi hương nam 
                                    tính lịch lãm và đẳng cấp thì lựa chọn đỉnh nhất quả đất 
                                    chính là anh chàng Bleu De Chanel này đấy nhé.
                                </p>
                                <p class="text-center">
                                    <img class="mx-auto" src="public/img/19bdcdbc-e405-4f18-89a0-8ba031e7269b.jpg" alt="">
                                </p>
                                <p>
                                    Đứng top chai nước hoa nam thành công nhất hành tinh, 
                                    chính là nước hoa nam Bleu De Chanel EDP. Đối với những 
                                    anh "soái ca" đích thực đang tìm kiếm một mùi hương nam 
                                    tính lịch lãm và đẳng cấp thì lựa chọn đỉnh nhất quả đất 
                                    chính là anh chàng Bleu De Chanel này đấy nhé.
                                </p>
                                <p>
                                    Đứng top chai nước hoa nam thành công nhất hành tinh, 
                                    chính là nước hoa nam Bleu De Chanel EDP. Đối với những 
                                    anh "soái ca" đích thực đang tìm kiếm một mùi hương nam 
                                    tính lịch lãm và đẳng cấp thì lựa chọn đỉnh nhất quả đất 
                                    chính là anh chàng Bleu De Chanel này đấy nhé.
                                </p>
                                <p>
                                    Đứng top chai nước hoa nam thành công nhất hành tinh, 
                                    chính là nước hoa nam Bleu De Chanel EDP. Đối với những 
                                    anh "soái ca" đích thực đang tìm kiếm một mùi hương nam 
                                    tính lịch lãm và đẳng cấp thì lựa chọn đỉnh nhất quả đất 
                                    chính là anh chàng Bleu De Chanel này đấy nhé.
                                </p>
                                <div class="absolute bottom-0 left-0 w-full h-1/4 more_info"></div>
                            </div>
                            <div class="text-center py-3 text-blue-600"><a class="px-4" href="#">Xem thêm <i class="fa-solid fa-angle-down"></i></a></div>
                        </div>
                        <!-- cách sử dụng -->
                        <div class="hidden">
                            Cách sử dụng nước hoa:
                            <br>
                            <br>
                            1. Xịt nước hoa khi cơ thể sạch, khô, hoặc sau khi thoa dưỡng ẩm để giữ mùi lâu hơn.
                            <br>
                            <br>
                            2. Giữ chai xịt cách cơ thể khoảng 12cm – 15cm và hướng đầu vòi xịt về mình. Nếu nước hoa làm ướt da thì nghĩa là bạn đang xịt ở khoảng cách quá 
                            <br>
                            <br>
                            3. Xịt nước hoa vào các điểm mạch đập (cổ, ngực, các điểm mạch, cẳng tay hoặc khuỷu tay): đây là những vùng có mạch máu nằm gần bề mặt da. Các điểm này ấm hơn những nơi khác, hơi ấm giúp khuếch tán mùi hương tốt.
                            <br>
                            <br>
                            - Nước hoa ban đêm thường được xịt lên cổ hoặc gần vùng cổ. Lý do là vì hương nước hoa ban đêm không lưu lại lâu.
                            <br>
                            <br>
                            - Nước hoa ban ngày thường được xịt vào hông hoặc đầu gối. Đó là vì hương nước hoa ban ngày tỏa hương suốt ngày và thơm dai hơn. Bạn nên dùng thêm chút kem dưỡng ẩm gần chỗ định xức nước hoa để mùi hương lưu lại lâu hơn.
                            <br>
                            <br>
                            4. Sử dụng nước hoa phù hợp theo mùa, thời tiết vì sức nóng và độ ẩm sẽ tăng mạnh mùi hương.
                            <br>
                            <br>
                            5. Nước hoa có thể bám và tỏa mùi tốt hay không còn phụ thuộc vào cơ địa, thời gian, không gian sử dụng.
                            <br>
                            <br>
                            Bảo quản nước hoa:
                            <br>
                            <br>
                            Nước hoa không chỉ loãng và mất hương thơm theo thời gian, mà còn bị biến màu, biến chất dẫn đến mùi nước hoa có mùi khó chịu. Nếu bảo quản không đúng cách, nước hoa có thể bắt đầu hỏng sau vài tháng. 
                            <br>
                            <br>
                            1. Ánh sáng: tiếp xúc trực tiếp với ánh sáng trong một khoảng thời gian chắc chắn sẽ khiến nước hoa bị biến chất. Nên để nước hoa trong hộp, nơi tối, khô thoáng (tủ đồ, kệ tủ).
                            <br>
                            <br>
                            2. Nhiệt độ: nhiệt độ dao động quá cao sẽ nhanh chóng làm hỏng mùi hương. Vì vậy để nước hoa trong nhà tắm có khả năng hư hỏng nhanh hơn nhiều so với nước hoa được lưu trữ trong không gian khác(tủ đồ, kệ tủ,...).
                            <br>
                            <br>
                            Hạn sử dụng:
                            <br>
                            <br>
                            Nước hoa thường không có hạn sử dụng. Ở một số Quốc gia, việc ghi chú hạn sử dụng là điều bắt buộc để hàng hóa được bán ra trên thị trường. Hầu hết nước hoa có hạn sử dụng 24 đến 36 tháng, và tính từ ngày bạn mở sản phẩm hay phát xịt đầu tiên.	
                        </div>
                        <!-- Chính sánh bảo hành -->
                        <div class="hidden">
                            Parfumerie luôn mong muốn mang đến cho Quý Khách Hàng những trải nghiệm dịch vụ mua sắm tốt nhất. Chúng tôi phục vụ nhu cầu mua hàng trên toàn quốc với chính sách đổi trả cụ thể như sau:
                            <br>
                            <br>
                            1.&nbsp;Thời hạn đổi trả trong vòng 03 ngày kể từ khi Quý Khách Hàng nhận sản phẩm của Parfumerie tại Cửa hàng hoặc từ Đơn vị giao hàng.
                            <br>
                            <br>
                            2. Chỉ áp dụng đổi trả cho sản phẩm nước hoa Fullbox, không áp dụng cho Nước hoa chiết.
                            <br>
                            <br>
                            3. Việc đổi trả hàng chỉ áp dụng với những sản phẩm bị lỗi kỹ thuật do nhà sản xuất.
                            <br>
                            - Quý Khách Hàng&nbsp;vui lòng thông báo ngay khi kiểm tra hàng lúc nhận và cần&nbsp;lập&nbsp;biên bản xác nhận&nbsp;giữa người mua và nhân viên giao hàng trong trường hợp sản phẩm nước hoa bị đổ, vỡ, rò rỉ hoặc các lỗi vật lý khác bên ngoài.
                            <br>
                            - Quý Khách Hàng vui lòng cung cấp hình ảnh &amp; video thấy rõ lỗi kỹ thuật của sản phẩm gửi cho Parfumerie để xác minh ngay khi khui hộp sản phẩm.
                            <br>
                            <br>
                            4.&nbsp;Sản phẩm mua rồi, Quý khách hàng vui lòng không trả hàng nếu không phải lỗi của sản phẩm.
                            <br>
                            <br>
                            5. Bảo hành: Nước hoa là sản phẩm đặc thù nên không&nbsp;áp dụng&nbsp;chính sách bảo hành.
                            <br>
                            <br>
                            6. Các trường hợp từ chối đổi trả - bảo hành:
                            <br>
                            - Quá thời hạn quy định.
                            Không phải lỗi của sản phẩm.
                            <br>
                            <br>
                            - Không xác minh được do Parfumerie cung cấp.
                            Không có tem bảo hành của Parfumerie hoặc tem bảo hành bị rách/vỡ không còn nguyên vẹn.
                            <br>
                            - Sản phẩm không còn nguyên vẹn, bị biến dạng hoặc hư hỏng nặng.
                            <br>
                            - Các sản phẩm giảm giá từ 30% trở lên.
                            <br>
                            Trân trọng cảm ơn.
                        </div>
                        <!-- đánh giá -->
                        <div class="hidden">
                            <div class="flex">
                                <div class="w-2/5 text-center">
                                    <div class="text-4xl font-medium text-green-600"><p>5/5</p></div>
                                    <div class="">
                                        <span><i class="text-sm text-yellow-400 fa-regular fa-star"></i></span>
                                        <span><i class="text-sm text-yellow-400 fa-regular fa-star"></i></span>
                                        <span><i class="text-sm text-yellow-400 fa-regular fa-star"></i></span>
                                        <span><i class="text-sm text-yellow-400 fa-regular fa-star"></i></span>
                                        <span><i class="text-sm text-yellow-400 fa-regular fa-star"></i></span>
                                    </div>
                                    <span>Có 1 bình luận</span>
                                </div>
                                <div class="w-3/5">
                                    <h2 class="font-medium text-xl pl-1 mb-3">Bình luận</h2>
                                    <form action="">
                                        <div class="flex items-start justify-around">
                                        <textarea class="border w-3/4" name="" id="" cols="" rows="5" placeholder="Nhập bình luận"></textarea>
                                            <select class="w-1/5 items-start border text-lg px-2" name="" id="">
                                                <option value="">1 Sao</option>
                                                <option value="">2 Sao</option>
                                                <option value="">3 Sao</option>
                                                <option value="">4 Sao</option>
                                                <option value="" selected>5 Sao</option>
                                            </select>
                                        </div>
                                        <button class="px-5 py-3 text-white bg-green-800 rounded-lg float-right mt-5">Gửi bình luận</button>
                                    </form>
                                </div>
                            </div>
                            <div class="mt-3 border-t py-5">
                                <div class="flex items-center gap-2 mb-1">
                                    <h2 class="font-medium text-xl">Mung Loli</h2>
                                    <div class="">
                                        <span><i class="text-sm text-yellow-400 fa-regular fa-star"></i></span>
                                        <span><i class="text-sm text-yellow-400 fa-regular fa-star"></i></span>
                                        <span><i class="text-sm text-yellow-400 fa-regular fa-star"></i></span>
                                        <span><i class="text-sm text-yellow-400 fa-regular fa-star"></i></span>
                                        <span><i class="text-sm text-yellow-400 fa-regular fa-star"></i></span>
                                    </div>
                                </div>
                                <p class="text-sm text-gray-600">Ngày: 2/2/2023</p>
                                <p class="mt-2">Sản phẩm rất tốt phù hơp với giá tiền.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-1/4 border">
                    <div class="flex items-center border-b justify-between py-3 px-2 gap-2">
                        <img width="40px" height="40px" src="public/img/service1.webp" alt="">
                        <div>
                            <p class="font-medium">Giao hàng nhanh chóng</p>
                            <p class="text-sm text-gray-600">
                            ✅ Đa dạng sản phẩm thương hiệu nổi tiếng được yêu thích tại Việt Nam. <br>
                            ✅ Miễn phí giao hàng đối với đơn hàng sản phẩm nước hoa Fullbox.</p>
                        </div>
                    </div>
                    <div class="flex items-center border-b justify-between py-3 px-2 gap-2">
                        <img width="40px" height="40px" src="public/img/service2.webp" alt="">
                        <div>
                            <p class="font-medium">Bảo đảm chất lượng</p>
                            <p class="text-sm text-gray-600">
                            ✅ Cam kết nước hoa chính hãng 100%. <br>
                            ✅ Miễn phí giao hàng đối với đơn hàng sản phẩm nước hoa Fullbox.</p>
                        </div>
                    </div>
                    <div class="flex items-center border-b justify-between py-3 px-2 gap-2">
                        <img width="40px" height="40px" src="public/img/service3.webp" alt="">
                        <div>
                            <p class="font-medium">Chăm sóc khách hàng tốt</p>
                            <p class="text-sm text-gray-600">
                            ✅ Hotline 24/7: 0863928753 <br>
                            ✅ Chăm sóc khách hàng tận tình trước và sau khi mua hàng.</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between py-3 px-2 gap-2">
                        <img width="40px" height="40px" src="public/img/service4.webp" alt="">
                        <div>
                            <p class="font-medium">Đa dạng lựa chọn</p>
                            <p class="text-sm text-gray-600">
                            ✅ Đa dạng sản phẩm thương hiệu nổi tiếng được yêu thích tại Việt Nam. <br>
                            ✅ Đa dạng dung tích: Nước hoa Fullbox; Nước hoa Chiết 10ml/20ml/30ml; Gốc nước hoa.</p>
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
        var dung_tich=document.querySelectorAll('.dung_tich');
        var gia=document.getElementById('gia');
        var label_dt=document.querySelectorAll('.label_dt');
        var con_hang=document.getElementById('box_con_hang');
        var het_hang=document.get
        // gửi request để lấy giá tiền
        // tạo function;
        function requestGia(index){
            dung_tich[index].checked=true;
            var $id_dt=dung_tich[index].value;
                var $id_sp=<?php echo $id_sp?>;
                var data={
                    id_dt: $id_dt,
                    id_sp: $id_sp
                };
                var jsondata= JSON.stringify(data);
                var html =new XMLHttpRequest();
                html.open('post','http://localhost/du-an-1/ajax/chi_tiet_san_pham.php',true);
                html.onreadystatechange = function() {
                if (html.readyState === 4 && html.status === 200) {
                    console.log(html.responseText);
                    label_dt.forEach(item=>{
                        item.classList.remove('border-green-800','border-red-800');
                    });
                    let newObj = JSON.parse(html.responseText);
                    var giasp= new Intl.NumberFormat().format(newObj.gia);
                    gia.innerText=giasp + ' đ';
                    if(newObj.so_luong >0){
                        label_dt[index].classList.add('border-green-800');
                        document.getElementById('tinh-trang').innerText='Còn hàng';
                        document.getElementById('box_con_hang').classList.remove('hidden');
                        document.getElementById('box_con_hang').classList.add('flex');
                        document.getElementById('box_het_hang').classList.remove('block');
                        document.getElementById('box_het_hang').classList.add('hidden');
                        
                    }else{
                        label_dt[index].classList.add('border-red-800');
                        document.getElementById('tinh-trang').innerText='Hết hàng'
                        document.getElementById('box_con_hang').classList.remove('flex');
                        document.getElementById('box_con_hang').classList.add('hidden');
                        document.getElementById('box_het_hang').classList.remove('hidden');
                        document.getElementById('box_het_hang').classList.add('block');
                    };
                }
            };
                html.send(jsondata);
                

        }
        //gọi function requestGia
        dung_tich.forEach((dungtich,index)=>{
            dungtich.addEventListener('click', e=>{
                requestGia(index);
            }) 
        })
        requestGia(0);


        // tăng giảm số lượng mua hàng
         let render =(amount)=>{
            qlt.value=amount;
        }
         // tăng giảm số lượng
         var minus= document.getElementById('minus');
         var plus =document.getElementById('plus');
         var qlt=document.getElementById('amount');
         var amount= qlt.value;



         minus.addEventListener('click',e=>{
            if(amount >1){
                amount--;
                // qlt.value=amount;
                render(amount)
            }
            
         });
         plus.addEventListener('click',e=>{
            amount++;
            // qlt.value=amount;
            render(amount)
         })
         qlt.addEventListener('input',()=>{
            amount=qlt.value;
            // amount=parseInt(amount);
            amount=(isNaN(amount)||amount==0 ? 1:amount);
            render(amount);
})
        var btn_wishlist=document.getElementById('btn_wishlist');
        var icon_wishlist=document.getElementById('icon_wishlist');
        var text_wishlist=document.getElementById('text_wishlist');
        // console.log(btn_wishlist.value);
        function wishlist(){
            let count_wl=document.getElementById('count_wl').innerText;
            let int_count=parseInt(count_wl);
            let data=btn_wishlist.value;
            let html = new XMLHttpRequest();
            html.open('post','http://localhost/du-an-1/ajax/yeu_thich.php',true);
            html.setRequestHeader('X-Requested-With', 'wishlist');
            html.onreadystatechange = function(){
            if(html.readyState===4 && html.status===200){
            let repo=html.responseText;
            //  console.log(repo);
            if(repo==1){
                int_count++;
                document.getElementById('count_wl').innerText = "" + int_count;
                icon_wishlist.classList.add('text-green-900');
                text_wishlist.classList.add('text-green-900')
                text_wishlist.innerText="Đã yêu thích";
                console.log(repo);
            }else{
                int_count--;
                document.getElementById('count_wl').innerText = "" + int_count;
                text_wishlist.classList.remove('text-green-900');
                icon_wishlist.classList.remove('text-green-900');
                text_wishlist.innerText="Thêm vào mục yêu thích";
                console.log(repo);
            }
            }
            }
            html.send(data);

        }
        var img_show =document.querySelector('#img-show');
        var list_img =document.querySelectorAll('#imgs');
        var img =document.querySelectorAll('#imgs img');
        var pre = document.getElementById('pre');
        var next = document.getElementById('next');
        let curentIndex = 0;
        function updateImg(index){
            list_img.forEach(item=>{
                item.classList.remove('border-2');
            })
            curentIndex=index;
            img_show.src=img[index].getAttribute('src');
            img[index].parentElement.classList.add('border-2', 'border-green-400');       
         }
         img.forEach((imgElement,index)=>{
            imgElement.addEventListener('click',e=>{
                updateImg(index);
            })
         })
         pre.addEventListener('click',e=>{
            if(curentIndex ==0){
                curentIndex=img.length - 1;
            }else{
                curentIndex--;
            }
            updateImg(curentIndex);
         })
         next.addEventListener('click',e=>{
            
            if(curentIndex == img.length - 1 ){
                curentIndex=0;
            }else{
                curentIndex++;
            }
            updateImg(curentIndex);
         })
         updateImg(0);
        
    </script>
</body>
</html>