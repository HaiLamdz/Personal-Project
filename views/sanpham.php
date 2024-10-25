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
        <img style="width: 100%;" src="https://savani.vn/images/products/cat/2022/08/original/banner-danh-muc_thoi-trang-nam---desktop_1660808362.png" alt="lỗi ảnh">
    </div>
        <section id="new-arrival" class="new-arrival product-carousel py-5 position-relative overflow-hidden">
            <div class="container">
                <?php foreach ($productsByCategory as $categoryName => $products){ ?>
                    <?php if(!empty($products)){ ?>
                    <div class="category-section mb-5">
                        <div class="hr-with-text text-center mb-4">
                            <hr>
                            <h4 class="d-inline-block px-3 text-uppercase"><?= $categoryName ?></h4>
                            <hr>
                        </div>

                        <div class="swiper product-swiper open-up" data-aos="zoom-out">
                            <div class="swiper-wrapper d-flex">
                                <?php foreach ($products as $product){ ?>
                                    <div class="swiper-slide">
                                        <div class="product-item image-zoom-effect link-effect">
                                            <div class="image-holder position-relative">
                                                <a href="<?= BASE_URL . '?act=detail_san_pham&id_san_pham=' . $product['id'] ?>">
                                                    <img class="card-img-top product-img" src="<?= $product['hinh_anh'] ?>" alt="<?=$product['ten_san_pham'] ?>">
                                                    
                                                </a>
                                            </div>
                                            <div class="product-content mt-3">
                                                <h5 class="element-title text-uppercase fs-5">
                                                    <a style="color: black;" href="<?= BASE_URL . '?act=detail_san_pham&id_san_pham=' . $product['id'] ?>">
                                                        <?=$product['ten_san_pham'] ?>
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
                    <?php }; ?>
                <?php }; ?>
            </div>
        </section>
    <?php require_once 'layout/footer.php' ?>
</body>

</html>