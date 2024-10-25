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
  <section class="h-100 h-custom" style="background-color: #d2c9ff;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12">
          <div class="card card-registration card-registration-2" style="border-radius: 15px;">
            <div class="card-body p-0">
              <div class="row g-0">
                <div class="col-lg-8">
                  <div id="cart" class="p-5 cart-items">
                    <div class="d-flex justify-content-between align-items-center mb-5">
                      <h3 class="fw-bold mb-0">Giỏ Hàng Của Bạn</h3>
                    </div>
                    <hr class="my-4">

                    <?php
                    $tongTien = 0;
                    foreach ($listCart as $row) {
                      $tienSanPham = $row['gia_khuyen_mai'] * $row['so_luong'];
                      $tongTien += $tienSanPham;
                      // var_dump($row);
                      // var_dump($row['san_pham_id']);
                    ?>

                      <div id="cartItem" class="row mb-4 d-flex justify-content-between align-items-center cart-item">
                        <div class="col-md-1 col-lg-1 col-xl-1">
                          <input type="checkbox" data-id-san-pham="<?= $row['san_pham_id'] ?>" id="productcheck">
                        </div>
                        <div class="col-md-2 col-lg-2 col-xl-2">
                          <a href="<?= BASE_URL . '?act=detail_san_pham&id_san_pham=' . $row['san_pham_id'] ?> "><img
                            src="<?= $row['hinh_anh'] ?>"
                            class="img-fluid rounded-3" alt="Cotton T-shirt"></a>
                        </div>
                        <div class="col-md-3 col-lg-3 col-xl-3">
                          <h6 class="text-muted"><?= $row['ten_san_pham'] ?></h6>
                        </div>
                        <!-- <div class="col-1 col-lg-1 col-xl-1">
                          <h6 class="text-muted">XL</h6>
                        </div> -->
                        <div class="col-md-2 col-lg-2 col-xl-2 d-flex">
                          <button data-mdb-button-init data-mdb-ripple-init class="btn btn-link px-2"
                            onclick="this.parentNode.querySelector('input[type=number]').stepDown(); $(this.parentNode.querySelector('input[type=number]')).trigger('input');">
                            <i class="fas fa-minus"></i>
                          </button>

                          <input id="form1" min="0" name="quantity" value="<?= $row['so_luong'] ?>" type="number"
                            class="quantity" style="width: 70px;" data-dongia="<?= $row['gia_khuyen_mai'] ?>" />

                          <button data-mdb-button-init data-mdb-ripple-init class="btn btn-link px-2"
                            onclick="this.parentNode.querySelector('input[type=number]').stepUp();$(this.parentNode.querySelector('input[type=number]')).trigger('input');">
                            <i class="fas fa-plus"></i>
                          </button>
                        </div>
                        <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                          <h6 class="price" style="width: 115px;"><?= number_format($tienSanPham)  ?>đ</h6>
                        </div>

                        <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                          <td class="mt-10"><button type="button" class="delete"><i class="fas fa-times"></i></button></td>
                        </div>
                      </div>
                    <?php } ?>
                    <hr class="my-4">
                    <div style="margin-left: 70%;" class="d-flex justify-content col-md-11 col-lg-11 col-xl-11 text-end ">
                      <h5 class="fw-bold mb-0 text-uppercase">Tổng: </h5>
                      <h5 class="fw-bold mb-0 text-uppercase"><?= number_format($tongTien)  ?></h5>đ
                    </div>


                    <div class="pt-5">
                      <h6 class="mb-0"><a href="#!" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Quay lại mua sắm</a></h6>
                    </div>
                  </div>
                </div>
                <div id="total" class="col-lg-4 bg-body-tertiary">
                  <div class="p-5">
                    <h5 class="fw-bold mb-5 mt-2 pt-1">Tổng</h5>
                    <hr class="my-4">

                    <div class="d-flex justify-content-between mb-4">
                      <h6 class="text-uppercase">Tạm Tính:</h6>
                      <h6 class="dongia">0</h6>
                    </div>

                    <!-- Phí vận chuyển và các phần tử khác -->

                    <div class="d-flex justify-content-between mb-4">
                      <h6 class="text-uppercase">Vận Chuyển:</h6>
                      <h6>50.000đ</h6>
                    </div>
                    <hr class="my-4">

                    <div class="d-flex justify-content-between mb-5">
                      <h5 class="text-uppercase">Tổng:</h5>
                      <h5 class="thanhtien">50.000</h5>
                    </div>

                    <div class="col-6 col-sm-8 mt-5">
                      <button type="submit" id="buyNowButton" class="btn btn-secondary">Mua Ngay</button>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php require_once 'layout/footer.php' ?>
  <script>
    $(document).ready(function() {
      // Cập nhật số lượng giỏ hàng và lưu vào localStorage
      function updateCartNumber() {
        var cart = $("#cart").children("#cartItem");
        var countCart = cart.length;
        var cartNumber = $("#cartNumber").children("a").children("span").eq(0);
        cartNumber.text(countCart);
        // Lưu số lượng giỏ hàng vào localStorage
        localStorage.setItem('cartNumber', countCart);
      }
      // Gọi hàm để cập nhật ngay khi trang giỏ hàng được tải
      updateCartNumber();
      // Xử lý khi xóa sản phẩm
      $(".delete").click(function(e) {
        e.preventDefault();
        var deleteProduct = $(this).parent().parent();
        deleteProduct.remove();
        updateCartNumber();

      });

    });
    $(document).ready(function() {
      $(".quantity").on('input change', function(e) {
        var sl = $(this).val();
        // dùng data để lấy đơn giá của sản phẩm
        var dongia = $(this).data('dongia');
        var thanhTien = sl * Number(dongia);
        var tongTien = 50000;
        tongTien += thanhTien;
        var ThanhTien = thanhTien.toLocaleString('vi-VN', {
          style: 'currency',
          currency: 'VND'
        });
        var TongTien = tongTien.toLocaleString('vi-VN', {
          style: 'currency',
          currency: 'VND'
        });
        // console.log(sl);
        // console.log(dongia);
        // console.log(totalMoney);
        $("#total").find(".dongia").text(ThanhTien);
        $("#total").find(".thanhtien").text(TongTien);
        $(this).closest("#cartItem").find(".price").text(ThanhTien);

        // alert(dongia);
      });
    });

    // $(document).ready(function () {
    //   var check = $(this).data('data-id-san-pham');
    //   console.log(check);

    // });
    $(document).on('change', '#productcheck', function() {

      if ($(this).is(':checked')) {
        var soLuong = $(this).closest("#cartItem").find(".quantity").val();
        var sanPhamId = $(this).data('id-san-pham');
        var dongiaText = $(this).closest("#cartItem").find(".price").text();
        var dongia = parseInt(dongiaText.replace(/\D/g, ''));
        var thanhTien = 50000;
        thanhTien += dongia;
        var totalMoney = thanhTien.toLocaleString('vi-VN', {
          style: 'currency',
          currency: 'VND'
        });
        console.log("đon giá sản phẩm: " + totalMoney);
        // console.log("ID sản phẩm: " + sanPhamId);

        $("#total").find(".dongia").text(dongiaText);
        $("#total").find(".thanhtien").text(totalMoney);
        localStorage.setItem('selectedProductId', sanPhamId);
        localStorage.setItem('selectedQuantity', soLuong);

      } else {
        $("#total").find(".dongia").text(0);
        $("#total").find(".thanhtien").text(50000);
      }
      $('#buyNowButton').on('click', function() {
        var sanPhamId = localStorage.getItem('selectedProductId');
        var soLuong = localStorage.getItem('selectedQuantity');
        console.log(sanPhamId);
        
        if (sanPhamId && soLuong) {
          // Chuyển hướng đến trang checkout với các thông tin sản phẩm
          window.location.href = `index.php?act=checkout&id_san_pham=${sanPhamId}&so_luong=${soLuong}`;
        } else {
          window.alert('Vui lòng chọn sản phẩm trước khi mua.');
        }
      });


    });
  </script>
</body>

</html>