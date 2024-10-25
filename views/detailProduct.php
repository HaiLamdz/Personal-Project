<?php
// Giả sử bạn đã xác thực người dùng thành công và có $user chứa thông tin người dùng từ cơ sở dữ liệu

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php require_once 'layout/header.php' ?>
    <?php require_once 'layout/nav.php' ?>
    <div class="container">
        <section class="content">

            <!-- Default box -->
            <div class="card card-solid">
                <form action="<?= BASE_URL . '?act=addCart&id_san_pham=' . $sanpham['id']  ?>" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-12 col-sm-6">
                                <div class="col-12 ms-5">
                                    <img src="<?= BASE_URL . $sanpham['hinh_anh'] ?>" class="product-image" style="max-width: 400px; height: auto;" alt="Product Image">
                                </div>
                                <div class="col-12 product-image-thumbs">
                                    <?php foreach ($listAnhSanPham as $key => $anh_SP) {
                                    ?>
                                        <div class="product-image-thumb <?= $anh_SP[$key] == 0 ? 'active' : '' ?> "><img src="<?= BASE_URL . $anh_SP['link_hinh_anh'] ?>" alt="Product Image"></div>
                                    <?php
                                    } ?>
                                </div>
                            </div>
                            <div class="col-6 col-sm-6 ">
                                <h3 class="my-3"><?= $sanpham['ten_san_pham'] ?>
                                    <?php if ($sanpham['trang_thai'] == 1) { ?>
                                        <button style="width: 60px; height: 20px; font-size: 7px;" class="btn btn-success">Còn hàng</button>
                                    <?php } else { ?>
                                        <button style="width: 60px; height: 20px; font-size: 7px;" class="btn btn-secondary">Hết hàng</button>
                                    <?php } ?>
                                </h3>
                                <div class="rating">
                                    <div class="stars">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                </div>
                                <hr>
                                <h5 class="mt-3"><del><?= number_format($sanpham['gia_san_pham']) ?>đ</del><span style="color: red;">
                                        < Sale 30%>
                                    </span></h5>
                                <h4 class="mt-3 text-danger fw-bold"><?= number_format($sanpham['gia_khuyen_mai']) ?>đ</h4>
                                <h5 class="mt-3"><?= $sanpham['mo_ta'] ?></h5>
                                <h5 style="font-weight: bold;">Mã Giảm Giá:</h5>
                                <div class="row mt-3 ">
                                    <div style="width: 10px;"></div>
                                    <div class="col-3 border border-primary rounded text-primary">
                                        VOUCHER 8%
                                    </div>
                                    <div style="width: 10px;"></div>
                                    <div class="col-3 border border-primary rounded text-primary">
                                        VOUCHER 12%
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-3 border rounded-pill">
                                        <div class="row">
                                            <div class="col-2 mt-3 ">
                                                <i class="fa-solid fa-truck-fast"></i>
                                            </div>
                                            <div class="col-10">
                                                <small>freeship đơn hàng từ 39k</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3 border rounded-pill">
                                        <div class="row">
                                            <div class="col-2 mt-3 ">
                                                <i class="fa-regular fa-credit-card"></i>
                                            </div>
                                            <div class="col-10">
                                                <small>Thanh toán khi nhận hàng</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3 border rounded-pill">
                                        <div class="row">
                                            <div class="col-2 mt-3 ">
                                                <i class="fa-solid fa-person-walking-arrow-loop-left"></i>
                                            </div>
                                            <div class="col-10">
                                                <small>Đôit trả trong vòng 7 ngày</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3 border rounded-pill">
                                        <div class="row">
                                            <div class="col-2 mt-3 ">
                                                <i class="fa-solid fa-barcode"></i>
                                            </div>
                                            <div class="col-10">
                                                <small>Ship COD toàn quốc</small>
                                            </div>
                                        </div>
                                    </div>
                                </div> <br>
                                <div class="container" id="size">
                                    <div class="d-flex">
                                        <h5 style="font-weight: bold;">Kích Thước:</h5>
                                        <h5 style="font-weight: bold;" class="textSize"></h5>
                                    </div>
                                    <div class=" size-selector d-flex">
                                        <div class="size-option">S</div>
                                        <div class="size-option">M</div>
                                        <div class="size-option">L</div>
                                        <div class="size-option">XL</div>
                                    </div>
                                </div> <br>
                                <div class="form-group d-flex">
                                    <div class="d-flex col-4">
                                        <button type="button" id="decrease" class="btn btn-light flex-grow-1 border">-</button>
                                        <div class="border ">
                                            <input type="number" id="quantity" name="so_luong" class="col-10 mt-1 mx-3 fs-4 " style="border: 0;" value="1">
                                        </div>
                                        <button type="button" id="increase" class="btn btn-light flex-grow-1 border">+</button>
                                    </div>
                                    <div class="action col-6">
                                        <button class="btn btn-default col-12" style="height: 44px;" name="add" id="add-to-cart">Thêm Vào Giỏ Hàng</button>
                                    </div>
                                    <div class="action col-2">
                                        <button class="btn btn-default" style="height: 44px;" type="button"><span class="fa fa-heart"></span></button>
                                    </div>

                                </div>
                                <script>
                                    document.getElementById('increase').addEventListener('click', function() {
                                        let quantity = document.getElementById('quantity');
                                        let currentValue = parseInt(quantity.value); // Sử dụng value thay vì textContent
                                        quantity.value = currentValue + 1; // Cập nhật giá trị
                                    });

                                    document.getElementById('decrease').addEventListener('click', function() {
                                        let quantity = document.getElementById('quantity');
                                        let currentValue = parseInt(quantity.value); // Sử dụng value thay vì textContent
                                        if (currentValue > 0) {
                                            quantity.value = currentValue - 1; // Cập nhật giá trị
                                        }
                                    });
                                </script>
                            </div>
                        </div>

                    </div>
                </form>
                <div class="container">
                    <nav class="w-100">
                        <div class="nav nav-tabs" id="product-tab" role="tablist">
                            <a class="nav-item nav-link active" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Bình luận</a>
                            <a class="nav-item nav-link" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Thông tin vận chuyển</a>
                            <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Chính sách đổi trả</a>
                        </div>
                    </nav>
                    <div class="tab-content p-3" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab">
                            <div class="container">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tên Người bình luận</th>
                                            <th>Nội dung</th>
                                            <th>Ngày đăng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($listBinhLuan as $key => $row) { ?>
                                            <tr>
                                                <td><?= ++$key ?></td>
                                                <td><?= $row['ho_ten'] ?></td>
                                                <td><?= $row['noi_dung'] ?></td>
                                                <td><?= $row['ngay_dang'] ?></td>

                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="container">
                                <?php if (!empty($_SESSION['user']['id'])) { ?>
                                    <form action="<?= BASE_URL . '?act=them_binh_luan' ?>" method="POST" enctype="multipart/form-data">
                                        <div class="col-12">
                                            <label>Nội dung bình luận</label>
                                            <div>
                                                <textarea name="mo_ta" class="form-control" id="" placeholder="Nhập mô tả"></textarea>
                                                <!-- <input class="form-control" name="mo_ta" id=""> -->
                                            </div>
                                        </div>
                                        <div style="margin-top: 20px; float: right; ">
                                            <input type="hidden" name="san_pham_id" value="<?= $sanpham['id'] ?>">
                                            <input type="hidden" name="tai_khoan_id" value="<?= $_SESSION['user']['id'] ?>">
                                            <button type="submit" name="comment" class="btn btn-primary">Submit</button>
                                        </div>

                                    </form>
                                <?php } else { ?>
                                    <h3 align="center">Hãy đăng nhập để bình luận</h3>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="tab-pane fade " id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
                            <div class="">
                                <img src="./assets/img/vanchuyen.jpg" alt="lỗi ảnh" id="">
                            </div>
                        </div>
                        <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab">
                            <div>
                                <img src="./assets/img/doitra.jpg" alt="lỗi ảnh" id="">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.card-body -->
    </div>
    <!-- /.card -->

    </section>
    <?php require_once 'layout/footer.php' ?>
</body>
<script>
    $(document).ready(function() {
        $('.product-image-thumb').on('click', function() {
            var $image_element = $(this).find('img')
            $('.product-image').prop('src', $image_element.attr('src'))
            $('.product-image-thumb.active').removeClass('active')
            $(this).addClass('active')
        })
    })
    $(".size-option").click(function(e) {
        e.preventDefault();

        var size = $(this).text();
        // console.log(size);
        $("#size").find(".textSize").text(size);
    });
</script>

</html>