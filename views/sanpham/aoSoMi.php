<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php require_once './views/layout/header.php' ?>
    <?php require_once './views/layout/nav.php' ?>
    <div class="col-12">
        <img style="width: 100%;" src="https://file.hstatic.net/1000360022/collection/artboard_1_copy_6_0fed271c853447828055dd1fbb299c1b.jpg" alt="">
    </div>
    <div class="container mt-4">
        <div class="hr-with-text">
            <hr>
            <h3><?= $listProductAoSoMi[0]['ten_danh_muc']  ?></h3>
            <hr>
        </div>
        <div class="row">
            <?php foreach ($listProductAoSoMi as $key => $row) { ?>
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top product-img" src="<?= $row['hinh_anh'] ?>" alt="Product 1">
                        <div class="card-body">
                            <h3 class="card-title"><?= $row['ten_san_pham'] ?></h3>
                            <h4 class="card-text grey"><del><?= number_format($row['gia_san_pham']) ?>đ</del></h4>
                            <h2 class="card-text red"><?= number_format($row['gia_khuyen_mai']) ?>đ</h2>
                            <a href="<?= BASE_URL . '?act=detail_san_pham&id_san_pham=' . $row['id'] ?>"><button class="btn btn-primary">Chi Tiết</button></a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php require_once './views/layout/footer.php' ?>



</body>

</html>