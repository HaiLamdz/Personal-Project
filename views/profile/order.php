<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin tài khoản</title>
</head>
<style>
</style>

<body>
    <?php require_once './views/layout/header.php' ?>
    <?php require_once './views/layout/nav.php' ?>
    <div class="container mt-5">
        <div class="row">
            <?php require_once 'sidebar.php'; ?>
            <div class="max-w-4xl mx-auto p-4 col-9">
                <?php foreach ($donhang as $order) { ?>
                    <div class="col-12 mt-3 bg-white rounded shadow p-4" style="min-height: auto;">
                        <div class="g-0">
                            <div class="flex items-center justify-between">
                                <div class="d-flex items-center space-x-2">
                                    <h6 style="font-weight: bold;">HaiLam Store</h6>
                                </div>
                                <div class="d-flex items-center space-x-2">
                                    <div class="col-8" style="color: green; margin-left: 23%;">
                                        <?= $order['ten_trang_thai'] ?>
                                    </div>
                                </div>
                            </div>
                            <?php foreach ($sanphamDonhang as $sanPham) {
                                if ($sanPham['ma_don_hang'] === $order['ma_don_hang']) { ?>
                                    <div class="flex items-start space-x-4 border-top border-bottom">
                                        <img style="width: 120px; padding: 10px; height: auto;" alt="Balo Laptop Gaming Cao Cấp FPT - Hàng Chính Hãng" class="w-24 h-24 object-cover" height="100" src="<?= $sanPham['hinh_anh'] ?>" />
                                        <div class="flex-1">
                                            <h2 class="text-lg font-semibold">
                                                <?= $sanPham['ten_san_pham'] ?>
                                            </h2>
                                            <p class="text-gray-500">
                                                Giá Sản Phẩm: <del><?= number_format($sanPham['gia_san_pham']) ?>đ</del>   <small style="color: red; font-size: large;"><?= number_format($sanPham['don_gia']) ?></small>đ
                                            </p>
                                            <p class="mt-2">
                                                Số Lượng: x<?= $sanPham['so_luong'] ?>
                                            </p>
                                        </div>
                                    </div>
                            <div class="flex justify-between items-center mt-2">
                                <div class="text-gray-700">
                                    <p>
                                        Thành tiền:
                                        <span class="text-red-500 font-bold">
                                            <?= number_format($order['tong_tien'] *  $sanPham['so_luong']) ?>đ
                                        </span>
                                    </p>
                                </div>
                            <?php }
                            } ?>
                                <div class="flex items-center">
                                    <button class="bg-red-500 text-white px-4 py-2 rounded mr-2">
                                        Đánh Giá
                                    </button>
                                    <button class="border border-gray-300 text-gray-700 px-4 py-2 rounded mr-2">
                                        Yêu Cầu Trả Hàng/Hoàn Tiền
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
</body>


<?php require_once './views/layout/footer.php' ?>
</body>

</html>