<?php
    class AdmintaikhoanController
    {

        public $modelTaiKhoan;
        public $modelDonHang;
        public $modelSanPham;
        public function __construct()
        {
            $this->modelTaiKhoan = new AdminTaiKhoan();
            $this->modelDonHang = new AdminDonHang();
            $this->modelSanPham = new AdminSanPham();
        }
        public function taikhoankhachhang()
        {
            $listAccount = $this->modelTaiKhoan->getAllTaiKhoan(3);
            // var_dump($listAccount);
            // die;
            require_once './views/taikhoan/khachhang/taikhoankhachhang.php';
        }
        public function taikhoannhanvien()
        {
            $listAccountQuanTri = $this->modelTaiKhoan->getAllTaiKhoan(2);
            // var_dump($listAccountQuanTri);
            // die;
            require_once './views/taikhoan/quantri/taikhoanquantri.php';
        }
        public function addQuanTri(){
            ob_start();
             // kiểm tra xem dữ liệu có phải đc summit lên không
             require_once './views/taikhoan/quantri//addquantri.php';
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // lấy ra dwuc liệu
                $ho_ten = $_POST["ho_ten"];
                $email = $_POST["email"];
                $password = md5('123@123ab');
                // var_dump($password);die;
                //validate
                // tạo 1 mảng trống để chứa dữ liệu
                $errors = [];
                if (empty($ho_ten)) {
                    $errors['ho_ten'] = 'Tên  không được để trống';
                }
                if (empty($email)) {
                    $errors['email'] = 'Email không được để trống';
                }
                if (empty($password)) {
                    $errors['password'] = 'Mật khẩu không được để trống';
                }
                if (!empty($errors)) {
                    $_SESSION['errors'] = $errors;
                    header("Location: " . BASE_URL_ADMIN . '?act=them_quan_tri');
                    exit();
                }

                // Khai báo chức vụ
                $chuc_vu_id = 2;

                 // nếu không có lỗi thì tiến hành thêm danh mục
                // if (empty($errors)) {
                     // nếu không có lỗi thì tiến hành thêm danh mục
                    $this->modelTaiKhoan->insertQuanTri($ho_ten, $email, $password, $chuc_vu_id);
                    header("location: " . BASE_URL_ADMIN . '?act=taikhoannhanvien');
                    exit();
            //     } else {
            //          // trả về form
            //         require_once './views/danhmuc/addDanhMuc.php';
            //     }
            // } else {
            //      // trả về form
                
            }
        }

        
        public function detailkhachhang(){
            $id_khach_hang = $_GET['id_khach_hang'];
            $khachhang = $this->modelTaiKhoan->getDetailTaiKhoan($id_khach_hang);
            // var_dump($khachhang['anh_dai_dien']);die;
            // echo ("<img src='$khachhang[anh_dai_dien]' alt=''>");die;
            $listDonHang = $this->modelDonHang->getDonHangOfKhachHang($id_khach_hang);
            $listBinhLuan = $this->modelSanPham->getBinhLuanOfKhachHang($id_khach_hang);

            require_once './views/taikhoan/khachhang/detailkhachhang.php';
            
        }
        public function khoaAccount(){
            $id_tai_khoan = $_GET['id'];
            $tai_khoan = $this->modelTaiKhoan->AllTaiKhoan($id_tai_khoan);
            // var_dump($tai_khoan['chuc_vu_id']);die;
            if($tai_khoan){
                if($tai_khoan['chuc_vu_id'] == 2 ){
                    $this->modelTaiKhoan->khoaTaiKhoan($id_tai_khoan);
                    header("location: " . BASE_URL_ADMIN . '?act=taikhoannhanvien');
                    exit();
                }
                if($tai_khoan['chuc_vu_id'] == 3 ){
                    $this->modelTaiKhoan->khoaTaiKhoan($id_tai_khoan);
                    header("location: " . BASE_URL_ADMIN . '?act=taikhoankhachhang');
                    exit();
                }
            }else{
                echo 'lôic';
                header("location: " . BASE_URL_ADMIN . '?act=taikhoannhanvien');
                exit();
            }
        }

        public function moAccount(){
            $id_tai_khoan = $_GET['id'];
            $tai_khoan = $this->modelTaiKhoan->AllTaiKhoan($id_tai_khoan);
            // var_dump($tai_khoan['chuc_vu_id']);die;
            if($tai_khoan){
                if($tai_khoan['chuc_vu_id'] == 2 ){
                    $this->modelTaiKhoan->moTaiKhoan($id_tai_khoan);
                    header("location: " . BASE_URL_ADMIN . '?act=taikhoannhanvien');
                    exit();
                }
                if($tai_khoan['chuc_vu_id'] == 3 ){
                    $this->modelTaiKhoan->moTaiKhoan($id_tai_khoan);
                    header("location: " . BASE_URL_ADMIN . '?act=taikhoankhachhang');
                    exit();
                }
            }else{
                echo 'lôic';
                header("location: " . BASE_URL_ADMIN . '?act=taikhoannhanvien');
                exit();
            }
        }
    }
?>