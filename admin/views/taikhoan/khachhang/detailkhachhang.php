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
                 <div class="col-sm-10">
                     <h1>Chi tiết Account khách hàng</h1>
                 </div>
             </div>
         </div><!-- /.container-fluid -->
     </section>

     <!-- Main content -->
     <section class="content">
         <div class="container-fluid">
             <div class="row">
                 <div class="col-4">
                     <img style="width: 100%;" src="<?= BASE_URL . $khachhang['anh_dai_dien'] ?? 'https://via.placeholder.com/150' ?>" alt="Looix anhr" >
                 </div><!-- /.col -->
                 <div class="col-8">
                     <div class="container">
                         <table class="table table-borderless">
                             <tbody style="font-size: x-large;">
                                 <tr>
                                     <th>Họ Tên:</th>
                                     <td><?= $khachhang['ho_ten'] ?? '(Khách Hàng Chưa Cập Nhập)' ?></td>
                                 </tr>
                                 <tr>
                                     <th>Ngày Sinh:</th>
                                     <td><?= $khachhang['ngay_sinh'] ?? '(Khách Hàng Chưa Cập Nhập)' ?></td>
                                 </tr>
                                 <tr>
                                     <th>Email:</th>
                                     <td><?= $khachhang['email'] ?? '(Khách Hàng Chưa Cập Nhập)' ?></td>
                                 </tr>
                                 <tr>
                                     <th>Số Điện Thoại:</th>
                                     <td><?= $khachhang['so_dien_thoai'] ?? '(Khách Hàng Chưa Cập Nhập)' ?></td>
                                 </tr>
                                 <tr>
                                     <th>Giới Tính:</th>
                                     <td><?= $khachhang['gioi_tinh'] == 1 ? 'Nam' : 'Nữ' ?></td>
                                 </tr>
                                 <tr>
                                     <th>Địa Chỉ:</th>
                                     <td><?= $khachhang['dia_chi'] ?? '(Khách Hàng Chưa Cập Nhập)' ?></td>
                                 </tr>
                                 <tr>
                                     <th>Trạng Thái:</th>
                                     <td><?= $khachhang['trang_thai'] == 1 ? 'active' : 'Inactive' ?></td>
                                 </tr>
                             </tbody>
                         </table>
                     </div>
                 </div>
                 <div class="col-12">
                     <h2>Thông tin mua hàng</h2>
                     <div>
                         <table id="example1" class="table table-bordered table-striped">
                             <thead>
                                 <tr>
                                     <th>STT</th>
                                     <th>Mã Đơn Hàng</th>
                                     <th>Tên Người Nhận</th>
                                     <th>SĐT</th>
                                     <th>Ngày Đặt</th>
                                     <th>Tổng tiền</th>
                                     <th>Trạng Thái</th>
                                     <th>Thao Tác</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php foreach ($listDonHang as $key => $DonHang) {
                                    ?>
                                     <tr>
                                         <td><?= ++$key ?></td>
                                         <td><?= $DonHang['ma_don_hang'] ?></td>
                                         <td><?= $DonHang['ten_nguoi_nhan'] ?></td>
                                         <td><?= $DonHang['sdt_nguoi_nhan'] ?></td>
                                         <td><?= $DonHang['ngay_dat'] ?></td>
                                         <td><?= $DonHang['tong_tien'] ?></td>
                                         <td><?= $DonHang['ten_trang_thai'] ?></td>
                                         <td>
                                             <div class="btn-group">
                                                 <a href="<?= BASE_URL_ADMIN . '?act=chi_tiet_don_hang&id_don_hang=' . $DonHang['id'] ?>"><button class="btn btn-primary">Chi Tiết</button></a>
                                             </div>
                                         </td>
                                     </tr>
                                 <?php } ?>


                             </tbody>
                         </table>
                     </div>
                 </div>

                 <div class="col-12">
                     <h2>Lịch sử bình luận</h2>
                     <div>
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
                                         <td><a target="_blank" href="<?= BASE_URL_ADMIN . '?act=chi_tiet_san_pham&id_san_pham=' .$BinhLuan['san_pham_id'] ?>"><?= $BinhLuan['ten_san_pham'] ?></a></td>
                                         <td><?= $BinhLuan['noi_dung'] ?></td>  
                                         <td><?= $BinhLuan['ngay_dang'] ?></td>
                                         <td><?= $BinhLuan['trang_thai'] == 1 ? 'Hiện Thị' : 'Bị Ẩn' ?></td>
                                         <td>
                                             <div class="btn-group">
                                                 <a href="<?= BASE_URL_ADMIN . '?act=chi_tiet_don_hang&id_don_hang=' . $BinhLuan['id'] ?>"><button class="btn btn-primary">Ẩn</button></a>
                                             </div>
                                         </td>
                                     </tr>
                                 <?php } ?>


                             </tbody>
                         </table>
                     </div>
                 </div>
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