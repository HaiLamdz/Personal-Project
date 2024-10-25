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
    <div class="col-12">
    <h4 class="text-uppercase mt-5" align="center"> Danh Sách Sản Phẩm Yêu Thích</h4>
    </div>
    <section id="new-arrival" class="new-arrival product-carousel py-5 position-relative overflow-hidden">
        <div class="container">
            <div class="swiper product-swiper open-up" data-aos="zoom-out">
                <div class="swiper-wrapper d-flex">
                    <?php foreach ($listfavourite as $product) { ?>
                        <div class="swiper-slide">
                            <div class="product-item image-zoom-effect link-effect">
                                <div class="image-holder position-relative">
                                    <a href="<?= BASE_URL . '?act=detail_san_pham&id_san_pham=' . $product['id'] ?>">
                                        <img class="card-img-top product-img" src="<?= $product['hinh_anh'] ?>" alt="<?= $product['ten_san_pham'] ?>">

                                    </a>
                                </div>
                                <div class="product-content mt-3">
                                    <h5 class="element-title text-uppercase fs-5">
                                        <a style="color: black;" href="<?= BASE_URL . '?act=detail_san_pham&id_san_pham=' . $product['id'] ?>">
                                            <?= $product['ten_san_pham'] ?>
                                        </a>
                                    </h5>
                                    <a style="color: black;" href="<?= BASE_URL . '?act=detail_san_pham&id_san_pham=' . $product['id'] ?>" class="text-decoration-none" data-after="Chi Tiết">
                                        <span><?= number_format($product['gia_khuyen_mai']) ?>đ</span>
                                    </a>
                                    <!-- <button class="add-to-cart">Thêm giỏ hàng</button> -->
                                </div>
                            </div>
                        </div>
                    <?php }; ?>
                </div>
            </div>
        </div>
        </div>
    </section>
    <?php require_once 'layout/footer.php' ?>
</body>

</html>