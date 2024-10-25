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
              <h1>Quản lý danh sách sản phẩm</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
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
              <!-- /.card -->

              <div class="card">
                <div class="card-header">
                  <a href="<?=BASE_URL_ADMIN . '?act=them_san_pham'?>"><button class="btn btn-success">Thêm Sản Phẩm</button></a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Ảnh sản phẩm</th>
                        <th>Giá sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Ngày nhập hàng</th>
                        <th>Danh mục</th>
                        <th>Trạng Thái</th>
                        <th>Thao Tác</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($listsanPham as $key => $sanPham) {
                      ?>
                        <tr>
                          <td><?= ++$key ?></td>
                          <td><?= $sanPham['ten_san_pham'] ?></td>
                          <td>
                            <img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" style="width: 100px;" alt=""
                            onerror="this.onerror=null; this.src='https://img6.thuthuatphanmem.vn/uploads/2022/01/27/anh-thu-cung-cute-de-thuong_014113010.jpg'"
                            >
                          </td>
                          <td><?= number_format($sanPham['gia_san_pham']) ?></td>
                          <td><?= $sanPham['so_luong'] ?></td>
                          <td><?= formartDate($sanPham['ngay_nhap']) ?></td>
                          <td><?= $sanPham['ten_danh_muc'] ?></td>
                          <td><?= $sanPham['trang_thai'] == 1 ? 'còn hàng':'hết hàng' ?></td>
                          <td>
                            <div class="btn-group">
                              <a href="<?=BASE_URL_ADMIN . '?act=chi_tiet_san_pham&id_san_pham=' . $sanPham['id']?>"><button class="btn btn-primary">Chi Tiết</button></a>
                              <a href="<?=BASE_URL_ADMIN . '?act=sua_san_pham&id_san_pham=' . $sanPham['id']?>"><button class="btn btn-warning">Sửa</button></a>
                              <a onclick="return confirm('Bạn có muốn xóa sản phẩm không??')" href="<?=BASE_URL_ADMIN . '?act=xoa_san_pham&id_san_pham=' . $sanPham['id']?>"><button class="btn btn-warning">xóa</button></a>
                            </div>
                          </td>
                        </tr>
                      <?php } ?>


                    </tbody>
                    <tfoot>
                      <tr>
                      <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Ảnh sản phẩm</th>
                        <th>Giá sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Ngày nhập hàng</th>
                        <th>Danh mục</th>
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