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
                         <li class="breadcrumb-item"><a href="#">Home</a></li>
                         <li class="breadcrumb-item active">Quản lý danh sách sản phẩm</li>
                     </ol>
                 </div>
             </div>
         </div><!-- /.container-fluid -->
     </section>

     <!-- Main content -->
     <section class="content">
         <div class="container-fluid">
             <div class="row">
                 <div class="col-12">
                     <div class="card card-primary">
                         <div class="card-header">
                             <h3 class="card-title">Thêm sản phẩm</h3>
                         </div>
                         <!-- /.card-header -->
                         <!-- form start -->
                         <form action="" method="POST" enctype="multipart/form-data">
                             <div class="card-body">
                             <?php
                                // Lấy thông báo lỗi từ session
                                $errors = $_SESSION['errors'] ?? [];
                                // Xóa thông báo lỗi trong session sau khi hiển thị
                                unset($_SESSION['errors']);
                                ?>
                                 <div class="form-group col-12" >
                                     <label >Tên Sản Phẩm</label>
                                     <input type="text" class="form-control" name="ten_san_pham" >
                                     <?php if(isset($errors['ten_san_pham'])){
                                        ?>
                                            <p class="text-danger"><?=$errors['ten_san_pham']  ?></p>
                                        <?php
                                     } ?>
                                 </div>
                                 <div class="form-group col-6" >
                                     <label >Giá sản phẩm</label>
                                     <input type="text" class="form-control" name="gia_san_pham" >
                                     <?php if(isset($errors['gia_san_pham'])){
                                        ?>
                                            <p class="text-danger"><?= $errors['gia_san_pham']  ?></p>
                                        <?php
                                     } ?>
                                 </div>
                                 <div class="form-group col-6 ">
                                     <label >Giá khuyến mãi</label>
                                     <input type="text" class="form-control" name="gia_khuyen_mai" >
                                     <?php if(isset($errors['gia_khuyen_mai'])){
                                        ?>
                                            <p class="text-danger"><?= $errors['gia_khuyen_mai']  ?></p>
                                        <?php
                                     } ?>
                                 </div>
                                 <div class="form-group col-6" >
                                     <label >hình ảnh</label>
                                     <input type="file" class="form-control" name="hinh_anh" >
                                     <?php if(isset($errors['hinh_anh'])){
                                        ?>
                                            <p class="text-danger"><?= $errors['hinh_anh']  ?></p>
                                        <?php
                                     } ?>
                                 </div>

                                 <div class="form-group col-6" >
                                     <label >album hình ảnh</label>
                                     <input type="file" class="form-control" name="img_array[]" multiple>
                                 </div>


                                 <div class="form-group col-6 ">
                                     <label >so_luong</label>
                                     <input type="text" class="form-control" name="so_luong" >
                                     <?php if(isset($errors['so_luong'])){
                                        ?>
                                            <p class="text-danger"><?= $errors['so_luong']  ?></p>
                                        <?php
                                     } ?>
                                 </div>

                                 <div class="form-group col-6" >
                                     <label >ngày nhập</label>
                                     <input type="date" class="form-control" name="ngay_nhap" >
                                     <?php if(isset($errors['ngay_nhap'])){
                                        ?>
                                            <p class="text-danger"><?= $errors['ngay_nhap']  ?></p>
                                        <?php
                                     } ?>
                                 </div>
                                 <div class="form-group col-6 ">
                                     <label >danh mục </label>
                                     <select name="danh_muc_id" class="form-control" id="">
                                        <option selected disabled>chọn danh mục sản phẩm</option>
                                        <?php foreach($listDanhMuc as $danhMuc){

                                            ?>
                                            <option value="<?= $danhMuc['id'] ?>"><?= $danhMuc['ten_danh_muc'] ?></option>
                                            <?php
                                        } ?>
                                     </select>
                                     <?php if(isset($errors['danh_muc_id'])){
                                        ?>
                                            <p class="text-danger"><?= $errors['danh_muc_id']  ?></p>
                                        <?php
                                     } ?>
                                 </div>
                                 <div class="form-group col-6 ">
                                     <label >Trạng Thái</label>
                                     <select name="trang_thai" class="form-control" id="">
                                        <option selected disabled>chọn trạng thái</option>
                                        <option value="1">Còn bán</option>
                                        <option value="2">Dừng bán</option>
                                     </select>
                                 </div>
                                 <?php if(isset($errors['trang_thai'])){
                                        ?>
                                            <p class="text-danger"><?= $errors['trang_thai']  ?></p>
                                        <?php
                                     } ?>
                                 <div class="form-group col-12">
                                     <label >Mô tả</label>
                                     <textarea class="form-control" name="mo_ta" id="" placeholder="Nhập mô tả"></textarea>
                                 </div>
                                 

                                
                             </div>
                             <div class="card-footer">
                                 <button type="submit" class="btn btn-primary">Submit</button>
                             </div>
                         </form>
                     </div>
                 </div>
                 <!-- /.col -->
             </div>
             <!-- /.row -->
         </div>
         <!-- /.container-fluid -->
     </section>
     <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->
 <!-- // footer -->
 <?php require_once "./views/layout/footer.php" ?>

 </body>

 </html>