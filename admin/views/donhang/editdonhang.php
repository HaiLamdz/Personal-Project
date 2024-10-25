 <!-- header -->
 <?php require_once "./views/layout/header.php" ?>
 <!-- Navbar -->
 <?php require_once "./views/layout/nav.php" ?>

 <!-- /.navbar -->
 <!-- sidebar -->
 <?php require_once "./views/layout/sidebar.php" ?>

 <!-- Main Sidebar Container -->

 <!-- biến khai báo tổng tiền đơn hàng -->
 <?php $tong_tien = 0; ?>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-10">
                     <h1>Cập nhật trạng thái đơn hàng <a href="<?= BASE_URL_ADMIN . '?act=donhang' ?>"><button class="btn btn-secondary">Back</button></a></h1>
                 </div>
                 <div class="col-sm-2">
                     <form action="<?= BASE_URL_ADMIN . '?act=sua_don_hang&id_don_hang=' . $donhang['id'] ?>" method="POST">
                         <select name="trang_thai_id" id="" class="form-group">
                             <?php foreach ($listTrangThaiDonHang as $key => $trangThaiDonhang) {
                                ?>
                                 <option <?php

                                            if (
                                                $donhang['trang_thai_id'] > $trangThaiDonhang['id']
                                                || $donhang['trang_thai_id'] == 9
                                                || $donhang['trang_thai_id'] == 10
                                                || $donhang['trang_thai_id'] == 11
                                            ) {
                                                echo 'disabled';
                                            }

                                            ?> <?= $trangThaiDonhang['id'] == $donhang['trang_thai_id'] ? 'selected' : '' ?> value="<?= $trangThaiDonhang['id']; ?>">
                                     <?= $trangThaiDonhang['ten_trang_thai']; ?>
                                 </option>
                             <?php
                                } ?>
                             
                         </select>
                         <div class="card">
                                 <button type="submit" class="btn-primary">Submit</button>
                             </div>
                     </form>
                 </div>
             </div>
         </div><!-- /.container-fluid -->
     </section>
     <!-- Main content -->
     <section class="content">
         <div class="container-fluid">
             <div class="row">
                 <div class="col-12">
                     <?php
                        if ($donhang['trang_thai_id'] == 1) {
                            $colorAlert = 'primary';
                        } else if ($donhang['trang_thai_id'] >= 2 && $donhang['trang_thai_id'] < 9) {
                            $colorAlert = 'warning';
                        } else if ($donhang['trang_thai_id'] == 9 || $donhang['trang_thai_id'] == 10) {
                            $colorAlert = 'success';
                        } else {
                            $colorAlert = 'danger';
                        }
                        ?>
                     <div class="alert alert-<?= $colorAlert; ?>" role="alert">
                         Đơn hàng: <?= $donhang['ten_trang_thai'] ?>
                     </div>


                     <!-- Main content -->
                     <div class="invoice p-3 mb-3">
                         <!-- title row -->
                         <div class="row">
                             <div class="col-12">
                                 <h4>
                                     <i class="fas fa-globe"></i> Hai Lam Store
                                     <small class="float-right">Ngày đặt: <?= formartDate($donhang['ngay_dat']) ?></small>
                                 </h4>
                             </div>
                             <!-- /.col -->
                         </div>
                         <!-- info row -->
                         <div class="row invoice-info">
                             <div class="col-sm-4 invoice-col">
                                 Thông tin người đặt
                                 <address>
                                     <strong><?= $donhang['ho_ten'] ?></strong><br>
                                     Số điện thoại: <?= $donhang['so_dien_thoai'] ?><br>
                                     Email: <?= $donhang['email'] ?>
                                 </address>
                             </div>
                             <!-- /.col -->
                             <div class="col-sm-4 invoice-col">
                                 Người nhận
                                 <address>
                                     <strong><?= $donhang['ten_nguoi_nhan'] ?></strong><br>
                                     Số điện thoại: <?= $donhang['sdt_nguoi_nhan'] ?><br>
                                     Email: <?= $donhang['email_nguoi_nhan'] ?> <br>
                                     Địa chỉ: <?= $donhang['dia_chi_nguoi_nhan'] ?>
                                 </address>
                             </div>
                             <!-- /.col -->
                             <div class="col-sm-4 invoice-col">
                                 Thông tin đơn hàng
                                 <address>
                                     <strong>Mã đơn hàng: <?= $donhang['ma_don_hang'] ?></strong><br>
                                     Tổng tiền: <?php foreach ($sanphamDonhang as $row) {
                                                    echo number_format($row['don_gia'] * $row['so_luong'] + 30000);
                                                } ?>đ<br>
                                     Ghi chú: <?= $donhang['ghi_chu'] ?> <br>
                                     Phương thức thanh toán: <?= $donhang['ten_phuong_thuc'] ?> <br>
                                 </address>
                             </div>
                             <!-- /.col -->
                         </div>
                         <!-- /.row -->

                         <!-- Table row -->
                         <div class="row">
                             <div class="col-12 table-responsive">
                                 <table class="table table-striped">
                                     <thead>
                                         <tr>
                                             <th>#</th>
                                             <th>Tên sản phẩm</th>
                                             <th>Đơn gía</th>
                                             <th>Vận chuyển</th>
                                             <th>Số lượng</th>
                                             <th>Thành tiền</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <?php foreach ($sanphamDonhang as $key => $row) {
                                            ?>
                                             <tr>
                                                 <td><?= $key + 1 ?></td>
                                                 <td><?= $row['ten_san_pham'] ?></td>
                                                 <td><?= number_format($row['don_gia']) ?></td>
                                                 <td>30.000</td>
                                                 <td><?= $row['so_luong'] ?></td>
                                                 <td><?= number_format($row['don_gia'] * $row['so_luong'] + 30000) ?></td>
                                             </tr>
                                             <?php  ?>
                                         <?php
                                            } ?>
                                     </tbody>
                                 </table>
                             </div>
                             <!-- /.col -->
                         </div>
                         <!-- /.row -->

                         <div class="row">
                             <!-- accepted payments column -->

                             <!-- /.col -->
                             <div class="col-6">
                                 <p class="lead">Ngày đặt hàng: <?= formartDate($donhang['ngay_dat']) ?></p>

                                 <div class="table-responsive">
                                     <table class="table">
                                         <tr>
                                             <th style="width:50%">Thành tiền:</th>
                                             <td><?php foreach ($sanphamDonhang as $row) {
                                                        echo number_format($row['don_gia'] * $row['so_luong']);
                                                    } ?></td>
                                         </tr>
                                         <tr>
                                             <th>Vận chuyển</th>
                                             <td>30.000</td>
                                         </tr>
                                         <tr>
                                             <th>Tổng tiền:</th>
                                             <td><?php foreach ($sanphamDonhang as $row) {
                                                        echo number_format($row['don_gia'] * $row['so_luong'] + 30000);
                                                    } ?></td>
                                         </tr>
                                     </table>
                                 </div>
                             </div>
                             <!-- /.col -->
                         </div>
                         <!-- /.row -->

                         <!-- this row will not appear when printing -->

                     </div>
                     <!-- /.invoice -->
                 </div><!-- /.col -->
             </div><!-- /.row -->
         </div><!-- /.container-fluid -->
     </section>
     <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->
 <!-- // footer -->
 <?php require_once "./views/layout/footer.php" ?>
 <script>
     $(function() {
         $("#example1").DataTable({
             "responsive": true,
             "lengthChange": false,
             "autoWidth": false,
             "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
         }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
         $('#example2').DataTable({
             "paging": true,
             "lengthChange": false,
             "searching": false,
             "ordering": true,
             "info": true,
             "autoWidth": false,
             "responsive": true,
         });
     });
 </script>
 <!-- Code injected by live-server -->
 <script>
     // <![CDATA[  <-- For SVG support
     if ('WebSocket' in window) {
         (function() {
             function refreshCSS() {
                 var sheets = [].slice.call(document.getElementsByTagName("link"));
                 var head = document.getElementsByTagName("head")[0];
                 for (var i = 0; i < sheets.length; ++i) {
                     var elem = sheets[i];
                     var parent = elem.parentElement || head;
                     parent.removeChild(elem);
                     var rel = elem.rel;
                     if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
                         var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
                         elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
                     }
                     parent.appendChild(elem);
                 }
             }
             var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
             var address = protocol + window.location.host + window.location.pathname + '/ws';
             var socket = new WebSocket(address);
             socket.onmessage = function(msg) {
                 if (msg.data == 'reload') window.location.reload();
                 else if (msg.data == 'refreshcss') refreshCSS();
             };
             if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
                 console.log('Live reload enabled.');
                 sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
             }
         })();
     } else {
         console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
     }
     // ]]>
 </script>
 </body>

 </html>