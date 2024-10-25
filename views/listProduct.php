<?php require_once 'views/layout/header.php' ?>
<?php require_once 'views/layout/nav.php' ?>


<section id="billboard" class="bg-light py-5">
    <div class="container">
        <div class="row justify-content-center">
            <h1 class="section-title text-center mt-4" data-aos="fade-up">HaiLam Store </h1>
            <div class="col-md-6 text-center" data-aos="fade-up" data-aos-delay="300">
                <h4>
                    Quyễn Rũ - Sang Trọng - Thanh Lịch
                </h4>
            </div>
        </div>
        <div class="row mt-2">
            <div class="swiper main-swiper py-4" data-aos="fade-up" data-aos-delay="600">
                <div class="swiper-wrapper d-flex border-animation-left">
                    <div class="swiper-slide">
                        <div class="banner-item image-zoom-effect">
                            <div class="image-holder">
                                <a href="<?= BASE_URL . '?act=aoThun' ?>">
                                    <img src="https://bizweb.dktcdn.net/100/368/426/products/vay-cuoi-di-ban-duoi-ca-2-jpeg.jpg?v=1678035276000" alt="product" class="img-fluid">
                                </a>
                            </div>
                            <div class="banner-content py-4">
                                <h5 class="element-title text-uppercase">Váy Ôm Body</h5>
                                <p>Với kiểu dáng thanh lịch và hiện đại, tôn dáng đầy cuốn hút, với thiết kế ôm sát cơ thể giúp khoe trọn đường cong quyến rũ của phái đẹp.</p>
                                <div class="btn-left">
                                    <a style="color: black;" href="<?= BASE_URL . '?act=aoThun' ?>" class="btn-link fs-6 text-uppercase item-anchor text-decoration-none">Khám Phá Ngay</a><i class="fa-solid fa-arrow-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide mt-5">
                        <div class="banner-item image-zoom-effect">
                            <div class="image-holder">
                                <a href="<?= BASE_URL . '?act=aoSoMi' ?>">
                                    <img style="height: 485px;" src="https://cidu.vn/data/media/2394/files/T%C3%BAi%20Da%20H%E1%BB%8Da%20Ti%E1%BA%BFt%20H%C3%ACnh%20Kh%E1%BB%91i%20Mi%E1%BB%87ng%20G%E1%BA%ADp%20%C4%90eo%20Vai%20Th%E1%BB%9Di%20Trang%20cidu%20Cd36%2012.jpg" alt="product" class="img-fluid">
                                </a>
                            </div>
                            <div class="banner-content py-4">
                                <h5 class="element-title text-uppercase">Túi Xách</h5>
                                <p>Được thiết kế tinh tế với phong cách hiện đại, là phụ kiện không thể thiếu trong tủ đồ của mọi cô gái.</p>
                                <div class="btn-left">
                                    <a style="color: black;" href="<?= BASE_URL . '?act=aoSoMi' ?>" class="btn-link fs-6 text-uppercase item-anchor text-decoration-none">Khám Phá Ngay</a><i class="fa-solid fa-arrow-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="banner-item image-zoom-effect">
                            <div class="image-holder">
                                <a href="<?= BASE_URL . '?act=quanJean' ?>">
                                    <img style="height: 496px;" src="./assets/img/Ulzzang.jpeg" alt="product" class="img-fluid">
                                </a>
                            </div>
                            <div class="banner-content py-4">
                                <h5 class="element-title text-uppercase">Set Đồ Đi Chơi</h5>
                                <p>Mang phong cách hiện đại, kết hợp giữa sự thoải mái và thời trang, phù hợp cho nhiều dịp khác nhau.</p>
                                <div class="btn-left">
                                    <a style="color: black;" href="<?= BASE_URL . '?act=quanJean' ?>" class="btn-link fs-6 text-uppercase item-anchor text-decoration-none">Khám Phá Ngay</a><i class="fa-solid fa-arrow-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="banner-item image-zoom-effect">
                            <div class="banner-content py-4">
                                <h5 class="element-title text-uppercase">
                                    <a href="single-product.html" class="item-anchor">Đặt lịch hẹn</a>
                                </h5>
                                <p>Tại thời điểm cần thiết, hãy đặt lịch hẹn với chúng tôi.</p>
                                <div class="btn-left">
                                    <a href="#" class="btn-link fs-6 text-uppercase item-anchor text-decoration-none">Discover Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</section>

<section class="features py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4 text-center" data-aos="fade-in" data-aos-delay="0">
                <div class="py-5">
                    <i style="font-size: 60px; color: orangered;" class="fa-brands fa-shopify"></i>
                    <h4 class="element-title text-capitalize my-3">Nhận tại cửa hàng</h4>
                    <p>Tại thời điểm cần thiết, hãy đặt lịch hẹn với chúng tôi.</p>
                </div>
            </div>
            <div class="col-md-4 text-center" data-aos="fade-in" data-aos-delay="300">
                <div class="py-5">
                    <i style="font-size: 60px; color: orangered;" class="fa-solid fa-gift"></i>
                    <h4 class="element-title text-capitalize my-3">Bao bì đặc biệt</h4>
                    <p>Tại thời điểm cần thiết, hãy đặt lịch hẹn với chúng tôi.</p>
                </div>
            </div>
            <div class="col-md-4 text-center" data-aos="fade-in" data-aos-delay="600">
                <div class="py-5">
                    <i style="font-size: 60px; color: orangered;" class="fa-solid fa-truck-fast"></i>
                    <h4 class="element-title text-capitalize my-3">Hoàn hàng miễn phí</h4>
                    <p>Tại thời điểm cần thiết, hãy đặt lịch hẹn với chúng tôi.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="new-arrival" class="bg-light  new-arrival product-carousel py-5 position-relative overflow-hidden">
    <div class="container">
        <div class="d-flex flex-wrap justify-content-between align-items-center mt-5 mb-3">
            <h4 class="text-uppercase">Top 4 sản phẩm nổi bật nhất tháng 8</h4>
        </div>
        <div class="swiper product-swiper open-up" data-aos="zoom-out">
            <div class="swiper-wrapper d-flex">
                <?php foreach ($topProduct as $key => $row) { ?>
                    <div class="swiper-slide">
                        <div class="product-item image-zoom-effect link-effect">
                            <div class="image-holder position-relative">
                                <a href="<?= BASE_URL  . '?act=detail_san_pham&id_san_pham=' . $row['id'] ?>">
                                    <img style="height: 350px;" class="product-image img-fluid" src="<?= $row['hinh_anh'] ?>" alt="Product 1">
                                    <div class="product-label discount" style="position: absolute;
                                                top: 5px; 
                                                right: 10px;
                                                background-color: #fb5858; 
                                                color: white; 
                                                padding: 5px 10px; 
                                                border-radius: 100%; 
                                                font-size: 14px; 
                                                font-weight: bold;">
                                        <span>Sale 30%</span>
                                    </div>
                                </a>
                                <div class="product-content">
                                    <h5 class="element-title text-uppercase fs-5 mt-3">
                                        <a style="color: black;" href="<?= BASE_URL  . '?act=detail_san_pham&id_san_pham=' . $row['id'] ?>"><?= $row['ten_san_pham'] ?></a>
                                    </h5>
                                    <a style="color: black;" href="<?= BASE_URL  . '?act=detail_san_pham&id_san_pham=' . $row['id'] ?>" class="text-decoration-none" data-after="Chi Tiết"><span><?= number_format($row['gia_khuyen_mai']) ?>đ</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<section class="collection position-relative py-5">
    <div class="container">
        <div class="row">
            <div class="collection-item d-flex flex-wrap my-5">
                <div class="col-md-6 column-container">
                    <div class="image-holder">
                        <img style="width: 100%;" src="./assets/img/logo.jpg" alt="collection" class="product-image img-fluid">
                    </div>
                </div>
                <div class="col-md-6 column-container bg-white">
                    <div class="collection-content p-5 m-0 m-md-5">
                        <h3 class="element-title text-uppercase">Bộ sưu tập mùa đông cổ điển</h3>
                        <p>Cửa hàng quần áo của chúng tôi là điểm đến lý tưởng cho những ai yêu thích thời trang và muốn tìm kiếm những bộ trang phục đẹp mắt, phong cách và chất lượng. Với đa dạng mẫu mã từ áo thun, áo sơ mi, quần jeans, đến áo poLo, chúng tôi đáp ứng nhu cầu của mọi đối tượng khách hàng.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="best-sellers" class="bg-light  best-sellers product-carousel py-5 position-relative overflow-hidden">
    <div class="container">
        <div class="d-flex flex-wrap justify-content-between align-items-center mt-5 mb-3">
            <h4 class="text-uppercase">Sản Phẩm Của Chúng Tôi<p style="color: #fb5858;">
                    < SALE 30%>
                </p>
            </h4>
            <a style="color: black;" href="<?= BASE_URL . '?act=sanpham' ?>" class="btn-link">Khám Phá Sản Phẩm</a>
        </div>
        <div class="swiper product-swiper open-up" data-aos="zoom-out">
            <div class="swiper-wrapper d-flex">
                <?php foreach ($listProducts as $key => $row) { ?>
                    <div class="swiper-slide">
                        <div class="product-item image-zoom-effect link-effect">
                            <div class="image-holder">
                                <a href="<?= BASE_URL  . '?act=detail_san_pham&id_san_pham=' . $row['id'] ?>">
                                    <img style="height: 350px;" src="<?= $row['hinh_anh'] ?>" alt="categories" class="product-image img-fluid">
                                </a>
                                <div class="product-label discount" style="position: absolute;
                                                top: 5px; 
                                                right: 10px;
                                                background-color: #929237; 
                                                color: white; 
                                                padding: 5px 10px; 
                                                border-radius: 100%; 
                                                font-size: 14px; 
                                                font-weight: bold;">
                                    <span>Mới</span>
                                </div>
                                <div class="product-content">
                                    <h5 class="text-uppercase fs-5 mt-3">
                                        <a style="color: black;" href="<?= BASE_URL  . '?act=detail_san_pham&id_san_pham=' . $row['id'] ?>"><?= $row['ten_san_pham'] ?></a>
                                    </h5>
                                    <a style="color: black;" href="<?= BASE_URL  . '?act=detail_san_pham&id_san_pham=' . $row['id'] ?>" class="text-decoration-none" data-after="Chi tiết"><span><?= number_format($row['gia_khuyen_mai']) ?>đ</span></a>
                                    <a style="color: black;" href="<?= BASE_URL  . '?act=insertfavourite&id_san_pham=' . $row['id'] ?>" class="text-decoration-none" data-after="Thêm vào ưa thích">
                                        <?php if ($row['trang_thai'] == 1) { ?>
                                            <span>Còn Hàng</span>
                                        <?php } else { ?>
                                            <span>Hết Hàng</span>
                                        <?php } ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<?php require_once 'views/layout/footer.php' ?>