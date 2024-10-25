<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cảm ơn bạn đã đặt hàng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 900px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .text-header {
            color: #28a745;
        }

        .order-info,
        .shipping-info,
        .payment-info {
            margin: 20px 0;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .cta {
            margin-top: 20px;
            padding: 10px;
            background: #007bff;
            color: #fff;
            text-align: center;
            border-radius: 5px;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <?php require_once './views/layout/header.php' ?>
    <?php require_once './views/layout/nav.php' ?>

    <?php if (!empty($donhang)) { ?>
        <div class="container">
                    <h1 class="text-header">Cảm ơn bạn đã đặt hàng!</h1>
                    <p>Chúng tôi rất vui khi nhận được đơn hàng của bạn.</p>
                    <a style="margin-left: 80%;" href="<?= BASE_URL ?>" class="cta">Xem thêm sản phẩm</a>
                </div>
                <br>
        <?php
        $STT = 1;
        
        foreach ($donhang as $row) {
            if ($row['trang_thai_id'] < 9) {
        ?>
                
                <div class="container">
                    <h5 style="margin-left: 80%;">Đơn Hàng Thứ : <?= $STT++ ?></h5>
                    <div class="order-info">
                        <?php foreach ($sanphamDonhang as $sanPham) {
                            if ($sanPham['ma_don_hang'] === $row['ma_don_hang']) { ?>
                                <h2>Thông tin đơn hàng: <?php echo  $row['ma_don_hang']; ?></h2>
                                <p><strong>Sản phẩm:</strong> <?= $sanPham['ten_san_pham'] ?></p>
                                <p><strong>Số lượng:</strong><?= $sanPham['so_luong'] ?></p>
                                <p><strong>Tổng tiền:</strong><?= number_format($sanPham['don_gia'] * $sanPham['so_luong'] + 50000)  ?></p>
                        <?php }
                        } ?>
                    </div>

                    <div class="shipping-info">
                        <h2>Thông Tin Người Nhận:</h2>
                        <p>Tên: <?= $row['ten_nguoi_nhan'] ?></p>
                        <p>Địa chỉ: <?= $row['dia_chi_nguoi_nhan'] ?></p>
                        <p>Số điện thoại: <?= $row['sdt_nguoi_nhan'] ?></p>
                    </div>

                    <div class="payment-info">
                        <h2>Thông tin thanh toán:</h2>
                        <p><strong>Phương thức thanh toán:</strong> <?= $row['ten_phuong_thuc'] ?></p>
                        <p><strong>Tình trạng thanh toán:</strong> <?= $row['ten_trang_thai'] ?></p>
                    </div>

                    <p><strong>Thời gian giao hàng dự kiến:</strong> 3-5 ngày làm việc</p>

                    <div class="promotion">
                        <p><strong>Đừng bỏ lỡ!</strong></p>
                        <p>Nhập mã giảm giá: <strong>GIAM10</strong> cho đơn hàng tiếp theo của bạn.</p>
                    </div>

                    <p>Nếu bạn cần bất kỳ hỗ trợ nào, hãy liên hệ với chúng tôi qua <a href="vuhailam2112@gmail.com">email</a> hoặc gọi đến số hotline: 0966701154.</p>

                </div>
                <div style="height: 40px;"></div>
            <?php }  }
    } else { ?>
        <div class="container">
            <h1 class="text-header">Bạn chưa có đơn hàng nào đc đặt</h1>
            <p>Hãy đặt hàng ngay hôm nay để nhận ưu đãi</p>
            <a style="margin-left: 80%;" href="<?= BASE_URL . '?act=danhsachsanpham' ?>" class="cta">Xem thêm sản phẩm</a>
        </div>
    <?php }  ?>
    <?php require_once './views/layout/footer.php' ?>
</body>

</html>