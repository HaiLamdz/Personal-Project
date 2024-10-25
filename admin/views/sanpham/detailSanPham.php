 <!-- header -->
 <?php require_once "./views/layout/header.php" ?>
 <!-- Navbar -->
 <?php require_once "./views/layout/nav.php" ?>

 <!-- /.navbar -->
 <!-- sidebar -->
 <?php require_once "./views/layout/sidebar.php" ?>

 <!-- Main Sidebar Container -->


 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1>DataTables</h1>
                 </div>
                 <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                         <li class="breadcrumb-item "><a class="btn btn-secondary" href="<?= BASE_URL_ADMIN . '?act=sanpham' ?>">Home</a></li>
                         <li class="breadcrumb-item active">Quản lý danh sách sản phẩm</li>
                     </ol>
                 </div>
             </div>
         </div><!-- /.container-fluid -->
     </section>
     <form action="<?= BASE_URL_ADMIN . '?act=anComment' ?>" method="POST">
         <input type="hidden" name="id_SP" value="<?= $sanpham['id'] ?>">
     </form>
     <!-- Main content -->
     <section class="content">

         <!-- Default box -->
         <div class="card card-solid">
             <div class="card-body">
                 <div class="row">
                     <div class="col-12 col-sm-6">
                         <div align="center" class="col-12">
                             <img src="<?= BASE_URL . $sanpham['hinh_anh'] ?>" class="product-image" style="width: auto; height: 600px;" alt="Product Image">
                         </div>
                         <div align="center" class="col-12 product-image-thumbs">
                             <?php foreach ($listAnhSanPham as $key => $anh_SP) {
                                ?>
                                 <div class="product-image-thumb <?= $anh_SP[$key] == 0 ? 'active' : '' ?> "><img src="<?= BASE_URL . $anh_SP['link_hinh_anh'] ?>" alt="Product Image"></div>
                             <?php
                                } ?>
                         </div>
                     </div>
                     <div class="col-12 col-sm-6">
                         <h3 class="my-3">Tên Sản Phẩm <?= $sanpham['ten_san_pham'] ?></h3>


                         <hr>
                         <h4 class="mt-3">Giá Tiền: <small><?= number_format($sanpham['gia_san_pham']) ?></small></h4>
                         <h4 class="mt-3">Giá khuyến mãi: <small><?= number_format($sanpham['gia_khuyen_mai']) ?></small></h4>
                         <h4 class="mt-3">Số lượng: <small><?= $sanpham['so_luong'] ?></small></h4>
                         <h4 class="mt-3">Lượt xem: <small><?= $sanpham['luot_xem'] ?></small></h4>
                         <h4 class="mt-3">Danh mục: <small><?= $sanpham['ten_danh_muc'] ?></small></h4>
                         <h4 class="mt-3">Trang thái: <small><?= $sanpham['trang_thai'] == 1 ? 'Còn bán' : 'Dừng bán' ?></small></h4>
                         <h4 class="mt-3">Danh mục: <small><?= $sanpham['mo_ta'] ?></small></h4>


                     </div>
                 </div>
                 <div class="container">
                     <nav class="w-100">
                         <div class="nav nav-tabs" id="product-tab" role="tablist">
                             <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#comment" role="tab" aria-controls="product-desc" aria-selected="true">Bình luận sản phẩm</a>
                         </div>
                     </nav>
                     <div class="tab-content p-3" id="nav-tabContent">
                         <div class="tab-pane fade show active" id="comment" role="tabpanel" aria-labelledby="product-desc-tab">
                             <div class="container">
                                 <table id="example1" class="table table-bordered table-striped">
                                     <thead>
                                         <tr>
                                             <th>STT</th>
                                             <th>Sản Phẩm</th>
                                             <th>Nội Dung</th>
                                             <th>Ngày Bình Luận</th>
                                             <th>Trạng Thái</th>
                                             <th>Thao Tác</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <?php foreach ($listBinhLuan as $key => $BinhLuan) {
                                            ?>
                                             <tr>
                                                 <td><?= ++$key ?></td>
                                                 <td><a target="_blank" href="<?= BASE_URL_ADMIN . '?act=chi_tiet_khach_hang&id_khach_hang=' . $BinhLuan['tai_khoan_id'] ?>"><?= $BinhLuan['ho_ten'] ?></a></td>
                                                 <td><?= $BinhLuan['noi_dung'] ?></td>
                                                 <td><?= $BinhLuan['ngay_dang'] ?></td>
                                                 <td><?= $BinhLuan['trang_thai'] == 1 ? 'Hiện Thị' : 'Bị Ẩn' ?></td>
                                                 <td>
                                                     <?php if ($BinhLuan['trang_thai'] == 1) { ?>
                                                         <a href="<?= BASE_URL_ADMIN . '?act=anComment&id_binh_luan=' . $BinhLuan['id'] ?>"><button class="btn btn-primary">Ẩn</button></a>
                                                     <?php } else { ?>
                                                         <a href="<?= BASE_URL_ADMIN . '?act=moComment&id_binh_luan=' . $BinhLuan['id'] ?>"><button class="btn btn-primary">Bỏ Ẩn</button></a>
                                                 </td>
                                             </tr>
                                     <?php } } ?>


                                     </tbody>
                                 </table>
                             </div>

                         </div>
                     </div>
                 </div>
             </div>
             <!-- /.card-body -->
         </div>
         <!-- /.card -->

     </section>
     <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->
 <!-- // footer -->
 <?php require_once "./views/layout/footer.php" ?>
 <script>
     $(document).ready(function() {
         $('.product-image-thumb').on('click', function() {
             var $image_element = $(this).find('img')
             $('.product-image').prop('src', $image_element.attr('src'))
             $('.product-image-thumb.active').removeClass('active')
             $(this).addClass('active')
         })
     })
 </script>
 </body>

 </html>