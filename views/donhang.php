

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
    <div class="container">
        <h1 class="text-header">Cảm ơn bạn đã đặt hàng!</h1>
        <p>Chúng tôi rất vui khi nhận được đơn hàng của bạn.</p>
        
        <div class="order-info">
            <h2>Thông tin đơn hàng: <?= $donhang['ma_don_hang'] ?></h2>
            <?php foreach ($sanphamDonhang as $sanPham) { ?>
                <p><strong>Sản phẩm:</strong> <?= $sanPham['ten_san_pham'] ?></p>
                <p><strong>Số lượng:</strong><?= $sanPham['so_luong'] ?></p>
                <p><strong>Tổng tiền:</strong><?= number_format($sanPham['don_gia'] * $sanPham['so_luong'] + 50000) ?>đ</p>
                <?php } ?>
            </div>
            
            <div class="shipping-info">
                <h2>Thông Tin Người Nhận:</h2>
                <p>Tên: <?= $donhang['ten_nguoi_nhan'] ?></p>
                <p>Địa chỉ: <?= $donhang['dia_chi_nguoi_nhan'] ?></p>
                <p>Số điện thoại: <?= $donhang['sdt_nguoi_nhan'] ?></p>
            </div>
            
            <div class="payment-info">
                <h2>Thông tin thanh toán:</h2>
                    <p><strong>Phương thức thanh toán:</strong> <?= $donhang['ten_phuong_thuc'] ?></p>
                <p><strong>Tình trạng thanh toán:</strong> <?= $donhang['ten_trang_thai'] ?></p>
        </div>
        
        <p><strong>Thời gian giao hàng dự kiến:</strong> 3-5 ngày làm việc</p>
        
        <div class="promotion">
            <p><strong>Đừng bỏ lỡ!</strong></p>
            <p>Nhập mã giảm giá: <strong>GIAM10</strong> cho đơn hàng tiếp theo của bạn.</p>
        </div>
        
        <p>Nếu bạn cần bất kỳ hỗ trợ nào, hãy liên hệ với chúng tôi qua <a href="mailto:support@example.com">email</a> hoặc gọi đến số hotline: 1800-1234.</p>
        
        <a href="<?= BASE_URL  ?>" class="cta">Xem thêm sản phẩm</a>
    </div>
    <?php require_once './views/layout/footer.php' ?>
</body>

</html>