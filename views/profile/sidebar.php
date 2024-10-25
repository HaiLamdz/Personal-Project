<head>
<script src="https://cdn.tailwindcss.com"></script>
                <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
</head>
<div class="col-3 mt-4 bg-white p-4 rounded shadow" style="height: 250px;">
    <div class="d-flex">
        <div class="rounded-circle" style="overflow: hidden; width: 70px; height: 70px;">
            <img style="object-fit: cover;" src="<?= $Account['anh_dai_dien'] ?>" alt="">
        </div>
        <h5 class="mt-4 ms-3"><?= $Account['ho_ten'] ?></h5>
    </div>
    <div class="mt-3">
        <a href="<?= BASE_URL . '?act=info_Account' ?>">Hồ sơ</a><br>
        <a href="<?= BASE_URL . '?act=order_Account' ?>">Đơn Hàng</a>
    </div>
</div>