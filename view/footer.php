<div class="box-buton">
            <div class="foter-top">
                <div class="block1">
                    <strong>VỀ PARFUMERIE</strong><br>
                    <a href="">Trang chủ</a> <br>
                    <a href="">Sản phẩm</a><br>
                    <a href="">Giới thiệu</a><br>
                    <a href="">Liên hệ</a>
                </div>
                <div class="block1">
                    <strong>HƯỚNG DẪN</strong><br>
                    <a href="">Hướng dẫn mua hàng</a ><br>
                    <a href="">Hướng dẫn thanh toán</a ><br>
                    <a href="">Hướng dẫn giao nhận</a ><br>
                    <a href="">Hướng dẫn sử dụng</a >
                </div>
                <div class="block1">
                    <strong>CHÍNH SÁCH</strong><br>
                    <a href="">Chính sách mua hàng</a ><br>
                    <a href="">Chính sách bảo mật thông tin</a ><br>
                    <a href="">Chính sách giao hàng</a ><br>
                    <a href="">Chính sách đổi trả - bảo hành</a >
                </div>
                <div class="block1">
                    <strong>Hỗ trợ</strong><br>
                    <a href="">Tìm kiếm</a ><br>
                    <a href="">Đăng kí</a ><br>
                    <a href="">Đăng nhập</a ><br>
                    <a href="">Cộng tác viên</a >
                </div>
            </div>
            <div class="foter-buton">
                <div class="block2">
                    <strong>PHƯƠNG THỨC THANH TOÁN</strong><br>
                    <img src="./image/pttt1.png" alt="">
                    <img src="./image/pttt2.png" alt="">
                    <img src="./image/pttt3.png" alt="">
                    <img src="./image/pttt4.png" alt="">
                </div>
                <div class="block2 boder">
                    <strong>KẾT NỐI VỚI CHÚNG TÔI</strong><br>
                    <img src="./image/fb.png" alt="">
                    <img src="./image/ins.avif" alt="">
                    <img src="./image/youtobe.webp" alt="">
                    <img src="./image/map.png" alt="">
                </div>
                <form class="block2">
                    <strong>ĐĂNG KÍ NHẬN TIN</strong>
                    <p>Nhận thông tin sản phẩm mới nhất, tin khuyến mãi và nhiều hơn nữa</p>
                    <input type="text" placeholder="Họ và tên" name="" id="">
                    <input type="text" required placeholder="Email của bạn" name="" id="">
                    <input type="button" value="Đăng kí" name="" id="">
                </form>
            </div>
        </div>
    </div>
</div>
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