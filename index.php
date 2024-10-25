<?php 
session_start();
// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/phpmailer/PHPMailer.php'; // Hàm hỗ trợ
require_once './commons/phpmailer/Exception.php'; // Hàm hỗ trợ
require_once './commons/phpmailer/SMTP.php'; // Hàm hỗ trợ
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';

// Require toàn bộ file Models
require_once './models/danhmucmodels.php';
require_once './models/sanpham.php';
require_once './models/user.php';

// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match
$controller =  new HomeController();
$controller->handleRequest();
match ($act) {
    // Trang chủ
    
    'signup' => (new HomeController())->signup(),
    'login' => (new HomeController())->login(),
    'logout' => (new HomeController())->logout(),
    'verify' => (new HomeController())->kiem_tra_ma_xac_thuc(),

    //Account
    'myAccount' => (new HomeController())->myAccount(),
    'info_Account' => (new HomeController())->info_Account(),
    'update_Account' => (new HomeController())->update_Account(),
    'order_Account' => (new HomeController())->order_Account(),

    // 'xac_thuc_tai_khoan' => (new HomeController())->kiem_tra_ma_xac_thuc(),

    // Trang chủ
    '/' => (new HomeController())->danhsachSanPham(), // trường hợp đặc biệt
    'sanpham' => (new HomeController())->SanphamVoiDanhMuc(), // trường hợp đặc biệt
    'detail_san_pham' => (new HomeController())->detailsanpham(),
    'checkout' => (new HomeController())->checkout(),
    'cart' => (new HomeController())->cart(),
    'viewCategory' => (new HomeController())->viewCate(),

    // sản phẩm ưa thích
    'favourite' => (new HomeController())->favourite(),
    'insertfavourite' => (new HomeController())->addfavourite(),

    // Bình luận
    'them_binh_luan' => (new HomeController())->addBinhLuan(),

    // sản phẩm
    // 'aoThun' => (new HomeController())->listAoThun(),
    // 'aoSoMi' => (new HomeController())->listAoSoMi(),
    // 'quanJean' => (new HomeController())->listQuanJean(),
    // 'aoPolo' => (new HomeController())->listAoPolo(),
    // 'aoKhoac' => (new HomeController())->listAoKhoac(),
    'search' => (new HomeController())->searchSP(),

    // đơn hàng
    'donHang' => (new HomeController())->donhang(),
    'taiKhoan_donHang' => (new HomeController())->taiKhoan_donHang(),

    // contact
    'contact' => (new HomeController())->contact(),

    // giỏ hàng
    'addCart' => (new HomeController())->addCart(),
};