<?php
// var_dump($so_luong);die;
// Kiểm tra nếu có sản phẩm được chọn
// if (isset($listProduct) && !empty($listProduct)) {
//     // Hiển thị thông tin sản phẩm và form checkout
//     // var_dump($listProduct);die;
//     foreach ($listProduct as $product) {
//         // Hiển thị thông tin sản phẩm
//         // var_dump($product);die;
//         echo '<h1>' . $product['ten_san_pham'] . '</h1>';
//         echo '<p>Giá: ' . $product['gia_khuyen_mai'] . '</p>';
//         // Form checkout
//         echo '<form method="POST" action="index.php?act=checkout&id_san_pham=' . $id . '">
//             <input type="hidden" name="so_luong" value="' . $so_luong . '">
//             <input type="hidden" name="don_gia" value="' . $product['gia_khuyen_mai'] . '">
//             <!-- Các trường thông tin khác -->
//             <button type="submit">Xác nhận đơn hàng</button>
//         </form>';
//     }
// } else {
//     echo 'Sản phẩm không hợp lệ hoặc đã hết hàng.';
// }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php require_once 'layout/header.php' ?><br>
    <div class="row col-2" style="float: right;"><a onclick="return confirm('Bạn muốn rời trang đặt mua sản phẩm chứ??')" href="<?= BASE_URL ?>"><button class="btn btn-secondary">Home</button></a></div>
    <div>
        <div class="container mt-4">
            <h3>Thông tin thanh toán</h3>
            <div class="row col-12 col-sm-12">
                <div class="col-6 col-sm-6">
                    <form method="POST" enctype="multipart/form-data">
                        <?php
                        // Lấy thông báo lỗi từ session
                        $errors = $_SESSION['errors'] ?? [];
                        // var_dump($errors);die;
                        // Xóa thông báo lỗi trong session sau khi hiển thị
                        unset($_SESSION['errors']);
                        ?>
                        <input type="hidden" name="ma_don_hang">
                        <input type="hidden" name="tai_khoan_id" value="<?= $_SESSION['user']['id'] ?>">
                        <div class="form-group">
                            <label for="name">Họ và tên:</label>
                            <input type="text" class="form-control" name="ten_nguoi_nhan" placeholder="Nhập họ tên người nhận...">
                            <?php if (isset($errors['ten_nguoi_nhan'])) { ?>
                                <p class="text-danger"><?= $errors['ten_nguoi_nhan']  ?></p>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" name="email_nguoi_nhan" placeholder="Nhập email người nhận...">
                            <?php if (isset($errors['email_nguoi_nhan'])) { ?>
                                <p class="text-danger"><?= $errors['email_nguoi_nhan']  ?></p>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label for="phone">Số điện thoại:</label>
                            <input type="text" class="form-control" name="sdt_nguoi_nhan" placeholder="Nhập số điện thoại người nhận...">
                            <?php if (isset($errors['sdt_nguoi_nhan'])) { ?>
                                <p class="text-danger"><?= $errors['sdt_nguoi_nhan']  ?></p>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label for="address">Địa chỉ:</label><br>
                            <select class="css_select" id="tinh" name="tinh" title="Chọn Tỉnh Thành">
                                <option value="0">Tỉnh Thành</option>
                            </select>
                            <select class="css_select" id="quan" name="quan" title="Chọn Quận Huyện">
                                <option value="0">Quận Huyện</option>
                            </select>
                            <select class="css_select" id="phuong" name="phuong" title="Chọn Phường Xã">
                                <option value="0">Phường Xã</option>
                            </select>
                            <?php if (isset($errors['APIAddress'])) { ?>
                                <p class="text-danger"><?= $errors['APIAddress']  ?> <br></p>
                            <?php }else {?>  <br> <br> <?php } ?>

                            <input type="hidden" id="ten_tinh" name="ten_tinh">
                            <input type="hidden" id="ten_quan" name="ten_quan">
                            <input type="hidden" id="ten_phuong" name="ten_phuong">

                            <input type="text" class="form-control" name="dia_chi_nguoi_nhan" placeholder="Nhập địa chỉ cụ thể người nhận...">
                        </div>
                        <div class="form-group">



                        </div>
                        <!-- <div class="form-group">
                            <label>Số Lượng</label>
                            <input type="number" value="getQuantity()" name="so_luong" class="form-control">
                        </div> -->
                        <div class="form-group">
                            <label for="">Số Lượng</label><br>
                            <div class="d-flex col-4">
                                <button type="button" id="decrease" class="btn btn-light flex-grow-1 border">-</button>
                                <div class="border ">
                                    <input type="number" id="quantity" name="so_luong" class="col-10 mt-1 mx-3 fs-4 " style="border: 0;" value="<?= $so_luong ?>">
                                </div>
                                <button type="button" id="increase" class="btn btn-light flex-grow-1 border">+</button>
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
                        <?php if (isset($errors['so_luong'])) { ?>
                            <p class="text-danger"><?= $errors['so_luong']  ?></p>
                        <?php } ?>
                        <div class="form-group">
                            <label>Ghi chú</label>
                            <textarea class="form-control" name="ghi_chu" id="" placeholder="Ghi chú"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="ship">Tiền Vận Chuyển:</label>
                            <input type="text" class="form-control" name="ship" value="50,000vnđ" disabled>
                            <input type="hidden" name="don_gia" value="<?= $listProduct['gia_khuyen_mai']  ?>">
                        </div>
                        <div class="form-group">
                            <label for="tong_tien">Thành Tiền:</label>
                            <input type="hidden" name="tong_tien" value="<?= $listProduct['gia_khuyen_mai'] + 50000 ?>">
                            <input type="text" class="form-control" value="<?= number_format($listProduct['gia_khuyen_mai'] * $so_luong + 50000)  ?>đ" disabled>
                        </div>
                        <div class="form-group">
                            <label for="payment">Phương thức thanh toán:</label>
                            <select class="form-control" name="phuong_thuc_thanh_toan">
                                <option selected disabled>Xin mời chọn phương thức thanh toán</option>
                                <option value="1">Thanh toán khi nhận hàng (COD)</option>
                                <option value="2">VNPay</option>
                                <option value="3">Thẻ tín dụng</option>

                            </select>
                        </div>
                        <?php if (isset($errors['phuong_thuc_thanh_toan'])) { ?>
                            <p class="text-danger"><?= $errors['phuong_thuc_thanh_toan']  ?></p>
                        <?php } ?>
                        <input type="hidden" name="trang_thai">
                        <a href="<?= BASE_URL . '?act=donHang&id_don_hang=' . $listProduct['id'] ?>"><button type="submit" name="xacnhan" class="btn btn-primary">Xác nhận đơn hàng</button></a>
                    </form>
                </div>
                <div class="col-6 col-sm-6" align="center">
                    <h4 class="my-3"><?= $listProduct['ten_san_pham'] ?></h4>
                    <hr>
                    <img src="<?= $listProduct['hinh_anh'] ?>" style="width: 250px;" alt="">
                    <h4 class="mt-3"><small><del><?= number_format($listProduct['gia_san_pham']) ?>vnđ</del></small></h4>
                    <h4 class="mt-3"><small><?= number_format($listProduct['gia_khuyen_mai']) ?></small>vnđ</h4>
                    <h4 class="mt-3"><small><?= $listProduct['mo_ta'] ?></small></h4>
                    <input type="text" class=" col-12 col-sm-6" id="address" placeholder="Mã giảm giá">
                    <button class="col-sm-3 btn-secondary">Áp Dụng</button>
                </div>


            </div>
        </div>
        <?php require_once 'layout/footer.php' ?>
</body>

</html>