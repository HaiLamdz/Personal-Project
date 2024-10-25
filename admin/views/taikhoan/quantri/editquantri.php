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
                     <h1>Sửa thoogn tin tài khoản quản trị</h1>
                 </div>
                 <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                         <li class="breadcrumb-item"><a href="#">Home</a></li>
                         <li class="breadcrumb-item active">Sửa thoogn tin tài khoản quản trị</li>
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
                             <h3 class="card-title">Thêm tài khoản quản trị</h3>
                         </div>
                         <!-- /.card-header -->
                         <!-- form start -->
                         <form action="" method="POST">
                             <div class="card-body">
                             <?php
                                // Lấy thông báo lỗi từ session
                                $errors = $_SESSION['errors'] ?? [];
                                // Xóa thông báo lỗi trong session sau khi hiển thị
                                unset($_SESSION['errors']);
                                ?>
                                <input type="hidden" name="quan_tri_id" value="<?= $quanTri['id'] ?>">
                                 <div class="form-group col-12" >
                                     <label >Họ Tên</label>
                                     <input type="text" class="form-control" name="ho_ten" value="<?= $quanTri['ho_ten'] ?>" >
                                     <?php if(isset($errors['ho_ten'])){
                                        ?>
                                            <p class="text-danger"><?=$errors['ho_ten']  ?></p>
                                        <?php
                                     } ?>
                                 </div>

                                 <div class="form-group col-12" >
                                     <label >Số điện thoại</label>
                                     <input type="text" class="form-control" name="so_dien_thoai" value="<?= $quanTri['so_dien_thoai'] ?>" >
                                     <?php if(isset($errors['so_dien_thoai'])){
                                        ?>
                                            <p class="text-danger"><?=$errors['so_dien_thoai']  ?></p>
                                        <?php
                                     } ?>
                                 </div>

                                 <div class="form-group col-12" >
                                     <label >Email</label>
                                     <input type="text" class="form-control" name="email" value="<?= $quanTri['email'] ?>">
                                     <?php if(isset($errors['email'])){
                                        ?>
                                            <p class="text-danger"><?=$errors['email']  ?></p>
                                        <?php
                                     } ?>
                                 </div>

                                 <div class="form-group">
                                    <label for="inputStatus">Trạng thái tài khoản</label>
                                    <select name="trang_thai" id="inputStatus" class="form-control custom-select">
                                        <option <?= $quanTri['trang_thai'] == 1 ? 'selected' : '' ?> value="1">Active</option>
                                        <option <?= $quanTri['trang_thai'] !== 1 ? 'selected' : '' ?> value="2">Inactive</option>
                                    </select>
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