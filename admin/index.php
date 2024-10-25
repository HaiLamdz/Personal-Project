<?php 
session_start();
// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/AdminDanhMucController.php';
require_once './controllers/AdminSanPhamController.php';
require_once './controllers/AdmindonhangController.php';
require_once './controllers/AdmintaikhoanController.php';
require_once './controllers/AdminDashboardController.php';

// Require toàn bộ file Models
require_once './models/AdminSanPham.php';
require_once './models/AdminDanhMuc.php';
require_once './models/AdminDonHang.php';
require_once './models/AdminTaiKhoan.php';

// Route
$act = $_GET['act'] ?? '/';


match ($act) {

  // route trang chủ
  '/' => (new AdminDashboardController())->dashboard(),

   // Route danh mục
   'danhmuc' => (new AdminDanhMucController())->danhsachDanhMuc(),
   'them_Danh_muc' => (new AdminDanhMucController())->addDanhMuc(),
   'sua_Danh_muc' => (new AdminDanhMucController())->suaDanhMuc(),
   'xoa_danh_muc' => (new AdminDanhMucController())->deleteDanhMuc(),

   // Route sản phẩm
   'sanpham' => (new AdminsanphamController())->danhsachsanpham(),
   'them_san_pham' => (new AdminsanphamController())->addSanPham(),
   'sua_san_pham' => (new AdminsanphamController())->suaSanPham(),
   'xoa_san_pham' => (new AdminsanphamController())->deleteSanPham(),
   'sua_ablum_anh_san_pham' => (new AdminsanphamController())->editablumanhsanpham(),
   'chi_tiet_san_pham' => (new AdminsanphamController())->detailsanpham(),

    // Route đơn hàng
    'donhang' => (new AdmindonhangController())->danhsachdonhang(),
    'sua_don_hang' => (new AdmindonhangController())->suadonhang(),
   //  'xoa_don_hang' => (new AdmindonhangController())->deletedonhang(),
    'chi_tiet_don_hang' => (new AdmindonhangController())->detaildonhang(),

    //Route taif khoanr
    // khóa tài khoản
    'khoaAccount' => (new AdmintaikhoanController())->khoaAccount(),
    'moAccount' => (new AdmintaikhoanController())->moAccount(),

      // Route quản trị
    'taikhoannhanvien' => (new AdmintaikhoanController())->taikhoannhanvien(),
    'them_quan_tri' => (new AdmintaikhoanController())->addQuanTri(),

      // Route khách hàng
     'taikhoankhachhang' => (new AdmintaikhoanController())->taikhoankhachhang(),
     'chi_tiet_khach_hang' => (new AdmintaikhoanController())->detailkhachhang(),

     // route bình luận
     'anComment' => (new AdminSanPhamController())->anComment(),
     'moComment' => (new AdminSanPhamController())->moComment(),
};