<body class="homepage">

  <div class="preloader text-white fs-6 text-uppercase overflow-hidden"></div>

  <nav class="navbar navbar-expand-lg bg-light text-uppercase fs-6 p-3 border-bottom align-items-center" aria-label="breadcrumb">
    <ol class="container-fluid" id="Breadcrumb ">
      <div class="row justify-content-between align-items-center w-100">

        <div class="col-auto">
          <a class="navbar-brand text-black" href="<?= BASE_URL  ?>">
            <h5>HAILAM STORE</h5>
          </a>
        </div>

        <div class="col-auto">

          <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
            aria-labelledby="offcanvasNavbarLabel">

            <div class="offcanvas-body">
              <ul class="navbar-nav justify-content-end flex-grow-1 gap-1 gap-md-5 pe-3">
                <li class="nav-item">
                  <a style="color: black !important;" class="nav-link" href="<?= BASE_URL ?>">Home</a>
                </li>

                <?php if (!empty($listDanhmuc)) { ?>
                  <?php foreach ($listDanhmuc as $id => $category) { ?>
                    <li class="nav-item dropdown">
                      <a style="color: black !important;" class="nav-link dropdown-toggle" href="#" id="dropdown<?= $id ?>" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"><?= htmlspecialchars($category['name']) ?></a>
                      <ul class="dropdown-menu list-unstyled" aria-labelledby="dropdown<?= $id ?>">
                        <?php foreach ($category['sub_categories'] as $subcategory) { ?>
                          <li>
                            <a href="<?= BASE_URL . '?act=viewCategory&category_id=' . $subcategory['id'] ?>" class="dropdown-item item-anchor"><?= htmlspecialchars($subcategory['ten_danh_muc']) ?></a>
                          </li>
                        <?php } ?>
                      </ul>
                    </li>
                  <?php } ?>
                <?php } ?>

                <li class="nav-item">
                  <a style="color: black !important;" class="nav-link" href="<?= BASE_URL . '?act=contact' ?>">Liên Hệ</a>
                </li>
              </ul>

            </div>
          </div>
        </div>

        <div class="col-2 col-lg-auto" style="margin-right: 0px; margin-bottom: 8px;">
          <ul class="d-flex m-0 justify-content-between" style="margin-right: 100%;">

            <?php if (isset($_SESSION['user']['id'])) { ?>
              <li class="col-3 d-none d-lg-block" id="cartNumber">
                <a href="<?= BASE_URL . '?act=cart' ?>" class="nav-link text-uppercase">
                  <i style="margin-top: 13px; font-size: 25px;" class="fa-solid fa-cart-shopping"></i>
                  <span id="cart-count" style="color: red;" class="position-absolute badge fs-6"></span>
                </a>
              </li>
            <?php } ?>
            <div class="dropdown d-flex col-6">
              <?php if (isset($_SESSION['user']['id'])) { ?>
                <button class=" border rounded-pill" style="width: 170px; height: 40px; margin-top: 15px;"><?= $_SESSION['user']['ho_ten'] ?? "Chưa Cập Nhập" ?></button>
              <?php } ?>
              <a class=" nav-link text-uppercase" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i style="margin-top: 13px; font-size: 25px;" class="fa-solid fa-user"></i></a>
              <ul class="dropdown-menu" style="width: 200px;">
                <?php if (isset($_SESSION['user']['id'])) { ?>
                  <li class="nav-item">
                    <a style="color: black ;" class="nav-link" href="<?= BASE_URL . '?act=taiKhoan_donHang' ?>">Đơn Hàng</a>
                  </li>
                  <li><a href="<?= BASE_URL . '?act=favourite' ?>" style="color: black ;" class="nav-link">Sản Phẩm Yêu Thích</a></li>
                  <li><a class="dropdown-item" href="<?= BASE_URL . '?act=myAccount' ?>">Tài Khoản Của Tôi</a></li>
                  <li><a onclik="return confirm('Bạn chắc chắn muốn đăng xuất chứ????')" class="dropdown-item" href="<?= BASE_URL . '?act=logout' ?>">Đăng Xuất</a></li>
                <?php  } else { ?>
                  <li><a class="dropdown-item" href="<?= BASE_URL . '?act=signup' ?>">Đăng Ký</a></li>
                  <li><a class="dropdown-item" href="<?= BASE_URL . '?act=login' ?>">Đăng Nhập</a></li>
                <?php } ?>
              </ul>
            </div>
            <li class="col-3 d-none d-lg-block">
              <a href="<?= BASE_URL . '?act=search' ?>" class="nav-link text-uppercase "><i style="margin-top: 13px; font-size: 25px;" class="fa-solid fa-magnifying-glass"></i>
              </a>
            </li>
          </ul>
        </div>

      </div>
    </ol>
  </nav>