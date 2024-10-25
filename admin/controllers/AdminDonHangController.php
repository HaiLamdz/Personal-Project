
<?php
// require_once '../models/AdminDonHang.php';  
class AdminDonHangController
{

    public $modelDonHang;
    public $modelSanPham;
    public function __construct()
    {
        $this->modelDonHang = new AdminDonHang();
        $this->modelSanPham = new AdminSanPham();
    }
    public function danhsachdonhang()
    {
        $listDonHang = $this->modelDonHang->getAllDonHang();
        // var_dump($listDonHang);die;
        $listSanPham = $this->modelSanPham->getAllSanPham();
        require_once './views/donhang/listdonhang.php';
    }
    public function detaildonhang()
    {
        $don_hang_id = $_GET['id_don_hang'];
        // var_dump($don_hang_id);die;
        // lấy thoogn tin đơn hàng ở bảng đơn hàng
        // var_dump($don_hang_id);die;
        $donhang = $this->modelDonHang->getDetailDonHang($don_hang_id);
        // var_dump($donhang);die;
        // if(!$donhang){
        //     echo 'Không';
        //     die;
        // }else{
        //     echo 'Có';
        //     die;
        // }
        // lấy danh sách sản phẩm đã đặt của đơn hàng ở bẳng chi_tiet_dan_hangs
        $sanphamDonhang = $this->modelDonHang->getListSPDonHang($don_hang_id);
        // var_dump($sanphamDonhang);die;
        $listTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang();
        // var_dump($listTrangThaiDonHang);die;
        require_once './views/donhang/detailDonHang.php';
    }
    public function suadonhang()
    {
        $don_hang_id = $_GET['id_don_hang'];
        // var_dump($don_hang_id);die;
        // lấy thoogn tin đơn hàng ở bảng đơn hàng
        // var_dump($don_hang_id);die;
        $donhang = $this->modelDonHang->getDetailDonHang($don_hang_id);
        // var_dump($donhang);die;
        // lấy danh sách sản phẩm đã đặt của đơn hàng ở bẳng chi_tiet_dan_hangs
        $sanphamDonhang = $this->modelDonHang->getListSPDonHang($don_hang_id);
        // var_dump($sanphamDonhang);die;
        $listTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // var_dump('abc');die;
            // Lấy dữ liệu từ POST
            // lấy dữ liệu cũ của sản phẩm
            $don_hang_id = $_GET['id_don_hang'] ?? '';
            $trang_thai_id = $_POST['trang_thai_id'] ?? '';
            // var_dump($don_hang_id);die;
            // Kiểm tra và lưu lỗi vào session
            // Nếu không có lỗi, tiến hành thêm sản phẩm vào CSDL
             if($this->modelDonHang->updateDonHang($don_hang_id,$trang_thai_id )){;
                // Chuyển hướng sau khi thêm sản phẩm thành công
                header("location: " . BASE_URL_ADMIN . '?act=donhang');
                exit();
            } else {
                // Nếu có lỗi, lưu lỗi vào session và chuyển hướng về form thêm sản phẩm
                
                header("location: " . BASE_URL_ADMIN . '?act=sua_don_hang&id_don_hang=' . $don_hang_id);
                exit();
            }
        }
        require_once './views/donhang/editdonhang.php';
    }
}