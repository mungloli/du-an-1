<?php
 extract($data['list_cart']);
?>
<!DOCTYPE html>
<html lang="vi" class="h-100">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Thanh toán</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="public/boostrap/bootstrap.min.css" type="text/css">
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- <link rel="stylesheet" href="public/css/bill.css" type="text/css"> -->
    <link rel="stylesheet" href="public/css/style.css">
</head>

<body>
<?php
    include "site/layout/header.php";
    ?>
    <main role="main">
        <div class="max-w-6xl mx-auto mt-4">
            <form class="needs-validation" name="frmthanhtoan" method="post"
                action="#">
                <input type="hidden" name="kh_tendangnhap" value="">

                <div class="py-5 text-center">
                    <i class="fa fa-credit-card fa-5x" aria-hidden="true"></i>
                    <h2>Thanh toán</h2>
                    <p class="lead">Vui lòng kiểm tra thông tin Khách hàng, thông tin Giỏ hàng trước khi Đặt hàng.</p>
                </div>

                <div class="row">
                    <div class="col-md-4 order-md-2 mb-4">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted">Giỏ hàng</span>
                            <span class="badge badge-secondary badge-pill">2</span>
                        </h4>
                        <ul class="list-group mb-3">
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0">Apple Ipad 4 Wifi 16GB</h6>
                                    <small class="text-muted">230$ x 2</small>
                                </div>
                                <span class="text-muted">460$</span>
                            </li>
                        </ul>
                        <ul class="list-group mb-3">
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0">Apple Ipad 4 Wifi 16GB</h6>
                                    <small class="text-muted">230$ x 2</small>
                                </div>
                                <span class="text-muted">460$</span>
                            </li>
                        </ul>

                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Mã khuyến mãi">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-secondary">Xác nhận</button>
                            </div>
                        </div>
                        

                    </div>
                    <div class="col-md-8 order-md-1">
                        <h2 class="mb-3 text-2xl font-medium">Thông tin khách hàng</h2>

                        <div class="row">
                            <div class="col-md-12">
                                <label for="kh_ten">Họ tên</label>
                                <input type="text" class="form-control" name="kh_ten" id="kh_ten"
                                    value="" >
                            </div>
                            <div class="col-md-12">
                                <label for="kh_email">Email</label>
                                <input type="text" class="form-control" name="kh_email" id="kh_email"
                                    value="" >
                            </div>
                            <div class="col-md-12">
                                <label for="kh_diachi">Địa chỉ</label>
                                <input type="text" class="form-control" name="kh_diachi" id="kh_diachi"
                                    value="" require="">
                            </div>
                            <div class="col-md-12">
                                <label for="kh_dienthoai">Điện thoại</label>
                                <input type="text" class="form-control" name="kh_dienthoai" id="kh_dienthoai"
                                    value="" require="">
                            </div>
                            <div>
                            <div class="col-md-12">
                                <label for="kh_dienthoai">Điện thoại
                                    <select name="" id="">
                                        <option value=""></option>
                                    </select>
                                </label>
                            </div>
                            </div>
                        </div>

                        <!-- <h4 class="mb-3">Hình thức thanh toán</h4> -->

                        <!-- <div class="d-block my-3">
                            <div class="custom-control custom-radio">
                                <input id="httt-1" name="httt_ma" type="radio" class="custom-control-input" required=""
                                    value="1">
                                <label class="custom-control-label" for="httt-1">Tiền mặt</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input id="httt-2" name="httt_ma" type="radio" class="custom-control-input" required=""
                                    value="2">
                                <label class="custom-control-label" for="httt-2">Chuyển khoản</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input id="httt-3" name="httt_ma" type="radio" class="custom-control-input" required=""
                                    value="3">
                                <label class="custom-control-label" for="httt-3">Ship COD</label>
                            </div>
                        </div> -->
                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg btn-block" type="submit" name="btnDatHang">Đặt
                            hàng</button>
                    </div>
                </div>
            </form>

        </div>
        <!-- End block content -->
    </main>

    <!-- footer -->
    <?php
    include "site/layout/footer.php";
    ?>
    <!-- end footer -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="public/boostrap/jquery.min.js"></script>
    <script src="public/boostrap/popper.min.js"></script>
    <script src="public/boostrap/bootstrap.min.js"></script>

</body>

</html>