<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin tài khoản</title>
</head>

<body>
    <?php require_once './views/layout/header.php' ?>
    <?php require_once './views/layout/nav.php' ?>
    <div class="container my-5 ">
        <div class="row">
            <?php require_once 'sidebar.php' ?>
            <div class="col-9">
                <div class="account-box">
                    <div class="d-flex justify-content-between ">
                        <div>
                            <h4>Chào, <?= $_SESSION['user']['ho_ten'] ?></h4>
                        </div>
                        <a href="#" class="text-decoration-none">Thông tin của tôi</a>
                    </div>
                    <div style="height: 30px;"></div>
                    <div>
                        <div class="row text-center">
                            <div class="col-3 d-flex flex-column align-items-center">
                                <span>0</span>
                                <p class="m-0">Phiếu giảm giá</p>
                            </div>
                            <div class="col-3 d-flex flex-column align-items-center">
                                <span>0</span>
                                <p class="m-0">Điểm</p>
                            </div>
                            <div class="col-3 d-flex flex-column align-items-center">
                                <img style="width: 30px;" src="https://theme.hstatic.net/1000360022/1001280882/14/tag-member0.png?v=742" alt="Member" class="mb-1">
                                <p class="m-0">Member</p>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Đơn hàng của tôi -->
                <div class="account-box">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4>Đơn hàng của tôi</h4>
                        <a href="#" class="text-decoration-none">Xem tất cả</a>
                    </div>
                    <div class="row text-center">
                        <div class="col-3 col-sm-6 col-md-3">
                            <div class="order-item">
                                <img src="https://theme.hstatic.net/1000360022/1001280882/14/icon-order1.png?v=742" alt="Chờ xác nhận" class="icon">
                                <p class="nav-title">Chờ xác nhận</p>
                                <span class="badge-notify">0</span>
                            </div>
                        </div>
                        <div class="col-3 col-sm-6 col-md-3">
                            <div class="order-item">
                                <img src="https://theme.hstatic.net/1000360022/1001280882/14/icon-order2.png?v=742" alt="Chờ lấy hàng" class="icon">
                                <p class="nav-title">Chờ lấy hàng</p>
                                <span class="badge-notify">0</span>
                            </div>
                        </div>
                        <div class="col-3 col-sm-6 col-md-3">
                            <div class="order-item">
                                <img src="https://theme.hstatic.net/1000360022/1001280882/14/icon-order3.png?v=742" alt="Đang giao" class="icon">
                                <p class="nav-title">Đang giao</p>
                                <span class="badge-notify">0</span>
                            </div>
                        </div>
                        <div class="col-3 col-sm-6 col-md-3">
                            <div class="order-item">
                                <img src="https://theme.hstatic.net/1000360022/1001280882/14/icon-order4.png?v=742" alt="Đánh giá" class="icon">
                                <p class="nav-title">Đánh giá</p>
                                <span class="badge-notify">0</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
    <?php require_once './views/layout/footer.php' ?>
</body>

</html>