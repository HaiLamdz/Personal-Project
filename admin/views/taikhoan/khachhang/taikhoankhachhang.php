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
              <h1>Quản Lý Tài Khoản Khách Hàng</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Quản Lý Tài Khoản Khách Hàng</li>
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
              <!-- /.card -->

              <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>STT</th>
                        <th>Họ và Tên</th>
                        <th>Ảnh Đại Diện</th>
                        <th>Email</th>
                        <th>Số Điện Thoại</th>
                        <th>Địa Chỉ</th>
                        <th>Trạng Thái</th>
                        <th>Thao Tác</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($listAccount as $key => $khachHang) {
                      ?>
                        <tr>
                          <td><?= ++$key ?></td>
                          <td><?= $khachHang['ho_ten'] ?></td>
                          <td><img style="width: 100px;" src="<?= BASE_URL . $khachHang['anh_dai_dien'] ?>" alt="" onerror="this.onerror=null; this.src='https://i.vgt.vn/2023/7/26/hotgirl-tran-ha-linh-bi-boc-tran-qua-khu-lieu-co-an-o-nhu-thoi-nguyen-thuy-them-1-clip-gay-bao-ba6-6951964.png'"></td>
                          <td><?= $khachHang['email'] ?></td>
                          <td><?= $khachHang['so_dien_thoai'] ?></td>
                          <td><?= $khachHang['dia_chi'] ?></td>
                          <td><?= $khachHang['trang_thai'] == 1 ? 'online' : 'offline' ?></td>
                          <td>
                              <a href="<?=BASE_URL_ADMIN . '?act=chi_tiet_khach_hang&id_khach_hang=' . $khachHang['id']?>"><button class="btn btn-primary">Chi Tiết</button></a>
                              <?php if($khachHang['trang_thai'] == 1){ ?> 
                                <a href="<?=BASE_URL_ADMIN . '?act=khoaAccount&id=' . $khachHang['id']?>"><button class="btn btn-warning">Khóa Tài Khoản</button></a>
                              <?php }else { ?> 
                                <a href="<?=BASE_URL_ADMIN . '?act=moAccount&id=' . $khachHang['id']?>"><button class="btn btn-warning">Mở Tài Khoản</button></a>
                            
                          </td>
                        </tr>
                      <?php } } ?>


                    </tbody>
                    <tfoot>
                      <tr>
                      <th>STT</th>
                        <th>Họ và Tên</th>
                        <th>Ảnh Đại Diện</th>
                        <th>Email</th>
                        <th>Số Điện Thoại</th>
                        <th>Địa Chỉ</th>
                        <th>Trạng Thái</th>
                        <th>Thao Tác</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
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