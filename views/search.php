<!-- views/search.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả tìm kiếm</title>
</head>

<body>
    <?php require_once 'views/layout/header.php'; ?>
    <?php require_once 'views/layout/nav.php'; ?>
    <section class="content">
        <div class="container-fluid">
            <h2 class="text-center display-4">Search</h2>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form action="<?= BASE_URL . '?act=search' ?>" method="POST">
                        <div class="input-group">
                            <input type="search" name="keysearch" class="form-control form-control-lg" placeholder="Type your keywords here">
                            <div class="input-group-append">
                                <button type="submit" name="search" class="btn btn-lg btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
  </div>
    <?php if (!empty($products)) { ?>
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-12">
                    <div style="background-color: grey;" class="jumbotron text-center">
                        <h2>Kết quả tìm kiếm cho "<?= htmlspecialchars($keysearch) ?>"</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php if (!empty($products)) {
                    foreach ($products as $product) { ?>
                        <div class="col-md-3">
                            <div style="height: 600px;" class="card">
                                <img class="card-img-top product-img" src="<?= $product['hinh_anh'] ?>" alt="Product">
                                <div class="card-body">
                                    <h3 class="card-title"><?= $product['ten_san_pham'] ?></h3>
                                    <h4 class="card-text grey"><del><?= number_format($product['gia_san_pham']) ?>đ</del></h4>
                                    <h2 class="card-text red"><?= number_format($product['gia_khuyen_mai']) ?>đ</h2>
                                    <a href="<?= BASE_URL . '?act=detail_san_pham&id_san_pham=' . $product['id'] ?>" class="detail">Chi Tiết</a>
                                </div>
                            </div>
                        </div>
                    <?php }
                } else { ?>
                    <div class="col-md-12">
                        <p>Không tìm thấy sản phẩm phù hợp.</p>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php } ?>

    
    <?php require_once 'views/layout/footer.php'; ?>
</body>

</html>