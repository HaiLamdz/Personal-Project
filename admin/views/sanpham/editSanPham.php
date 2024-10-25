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
         <div class="col-sm-12">
           <h1>Sửa thông tin sản phẩm: <strong><?= $sanpham['ten_san_pham'] ?></strong></h1>
           <br>
         </div>
       </div>
     </div><!-- /.container-fluid -->
   </section>

   <!-- Main content -->
   <section class="content">
     <div class="row">
       <div class="col-md-8">
         <div class="card card-primary">
           <div class="card-header">
             <h3 class="card-title">Thông Tin Sản Phẩm</h3>

             <div class="card-tools">
               <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                 <i class="fas fa-minus"></i>
               </button>
             </div>
           </div>
           <form action="" method="POST" enctype="multipart/form-data">
             <div class="card-body">
               <div class="form-group">
                 <input type="hidden" name="id" value="<?= $sanpham['id'] ?>">
                 <label for="ten_san_pham">Tên Sản Phẩm</label>
                 <input type="text" id="inputName" name="ten_san_pham" class="form-control" value="<?= $sanpham['ten_san_pham'] ?>">
               </div>
               <div class="form-group">
                 <label for="gia_san_pham">Giá Sản Phẩm</label>
                 <input type="number" id="inputName" name="gia_san_pham" class="form-control" value="<?= $sanpham['gia_san_pham'] ?>">
               </div>
               <div class="form-group">
                 <label for="gia_khuyen_mai">giá khuyễn mãi Sản Phẩm</label>
                 <input type="number" id="inputName" name="gia_khuyen_mai" class="form-control" value="<?= $sanpham['gia_khuyen_mai'] ?>">
               </div>
               <div class="form-group">
                 <label for="hinh_anh">Ảnh Sản Phẩm</label>
                 <input type="file" id="inputName" name="hinh_anh" class="form-control">
               </div>
               <div class="form-group">
                 <label for="so_luong">số lượng</label>
                 <input type="number" id="inputName" name="so_luong" class="form-control" value="<?= $sanpham['so_luong'] ?>">
               </div>
               <div class="form-group">
                 <label for="ngay_nhap">ngày nhập</label>
                 <input type="date" id="inputName" name="ngay_nhap" class="form-control" value="<?= $sanpham['ngay_nhap'] ?>">
               </div>
               <div class="form-group">
                 <label for="danh_muc_id">Danh Mục sản phẩm</label>
                 <select id="danh_muc_id" name="danh_muc_id" class="form-control custom-select">
                   <?php foreach ($listDanhMuc as $danhMuc) { ?>
                     <option <?= $danhMuc['id'] == $sanpham['danh_muc_id'] ? 'selected' : '' ?> value="<?= $danhMuc['id'] ?>"> <?= $danhMuc['ten_danh_muc'] ?></option>
                   <?php } ?>
                 </select>
               </div>
               <div class="form-group">
                 <label for="trang_thai">Trạng Thái sản phẩm</label>
                 <select id="trang_thai" name="trang_thai" class="form-control custom-select">
                   <option <?= $sanpham['trang_thai'] == 1 ? 'selected' : '' ?> value="1">Còn Bán</option>
                   <option <?= $sanpham['trang_thai'] == 2 ? 'selected' : '' ?> value="2">Dừng Bán</option>
                 </select>
               </div>
               <div class="form-group">
                 <label for="mo_ta">mô tả sản phẩm</label>
                 <textarea id="mo_ta" name="mo_ta" class="form-control" rows="4"><?= $sanpham['mo_ta'] ?></textarea>
               </div>
             </div>

             <div class="card-footer text-center">
               <button type="submit" class="btn btn-primary">Sửa Thông Tin</button>
             </div>
           </form>
           <!-- /.card-body -->
         </div>
         <!-- /.card -->
       </div>
       <div class="col-md-4">

         <!-- /.card -->
         <div class="card card-info">
           <div class="card-header">
             <h3 class="card-title">Alnum Ảnh Sản Phẩm</h3>
             <div class="card-tools">
               <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                 <i class="fas fa-minus"></i>
               </button>
             </div>
           </div>
           <div class="card-body p-0">
             <form action="<?= BASE_URL_ADMIN . '?act=sua_ablum_anh_san_pham' ?>" method="POST" enctype="multipart/form-data">
               <div class="table-responsive">
                 <table id="faqs" class="table table-hover">
                   <thead>
                     <tr>
                       <th>Ảnh</th>
                       <th>File</th>
                       <th>
                         <div class="text-center"><button onclick="addfaqs();" type="button" class="badge badge-success"><i class="fa fa-plus"></i> ADD NEW</button></div>
                       </th>
                     </tr>
                   </thead>
                   <tbody>
                   <input type="hidden" name="id" value="<?= $sanpham['id'] ?>">
                   <input type="hidden" id="img_delete" name="img_delete">
                   <?php foreach($listAnhSanPham as $key=>$value){ ?> 
                     <tr id="faqs-row-<?= $key ?>">
                      <input type="hidden" name="current_img_ids[]" value="<?= $value['id'] ?>">
                       <td><img src="<?= BASE_URL . $value['link_hinh_anh'] ?>" style="width: 50px; height: 50px;" alt=""></td>
                       <td><input type="file" name="img_array[]" class="form-control"></td>
                       <td class="mt-10"><button type="button" class="badge badge-danger" onclick="removeRow(<?= $key ?>,<?= $value['id'] ?>)"><i class="fa fa-trash"></i> Delete</button></td>
                     </tr>
                     <?php } ?>
                   </tbody>
                 </table>
               </div>
               <div class="card-footer text-center">
                 <button type="submit" class="btn btn-primary">Sửa Thông Tin</button>
               </div>
             </form>
           </div>
           <!-- /.card-body -->

         </div>
         <!-- /.card -->
       </div>
     </div>
     <div class="row">
       <div class="col-12">
         <a href="#" class="btn btn-secondary">Cancel</a>
         <a href="<?=BASE_URL_ADMIN . '?act=sanpham' ?>"><input type="submit" value="Save Changes" class="btn btn-success float-right"></a>
       </div>
     </div>
   </section>
   <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->
 <!-- // footer -->
 <?php require_once "./views/layout/footer.php" ?>

 </body>
 <script>
   var faqs_row = <?= count($listAnhSanPham) ?>;

   function addfaqs() {
     html = '<tr id="faqs-row-' + faqs_row + '">';
     html += '<td><img src="https://img6.thuthuatphanmem.vn/uploads/2022/01/27/anh-thu-cung-cute-de-thuong_014113010.jpg" style="width: 50px; height: 50px;" alt=""></td>';
     html += '<td><input type="file" name="img_array[]" class="form-control"></td>';
     html += '<td class="mt-10"><button type="button" class="badge badge-danger" onclick="removeRow('+ faqs_row + ', null);"><i class="fa fa-trash"></i> Delete</button></td>';

     html += '</tr>';

     $('#faqs tbody').append(html);

     faqs_row++;
   }
   function removeRow(rowId, imgId){
    console.log(imgId)  ;
    $('#faqs-row-' + rowId).remove();
    if (imgId !== null) {
    console.log("abb")  ;
    var imgdeleteInput = document.getElementById('img_delete');
      var currentValue = imgdeleteInput.value;
      imgdeleteInput.value = currentValue ? currentValue + ',' + imgId : imgId; 
    }
   }
 </script>

 </html>