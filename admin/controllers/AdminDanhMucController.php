<?php 
    class AdminDanhMucController{

        public $modelDanhMuc;
        public function __construct()
        {
            $this->modelDanhMuc = new AdminDanhMuc();
        }
        public function danhsachDanhMuc(){
            $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
            require_once './views/danhmuc/listDanhMuc.php';
        }

        public function addDanhMuc(){
            ob_start();
             // kiểm tra xem dữ liệu có phải đc summit lên không
             require_once './views/danhmuc/addDanhMuc.php';
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // lấy ra dwuc liệu
                $ten_danh_muc = $_POST["ten_danh_muc"];
                $mo_ta = $_POST["mo_ta"];
                //validate
                // tạo 1 mảng trống để chứa dữ liệu
                $errors = [];
                if (empty($ten_danh_muc)) {
                    $errors['ten_danh_muc'] = 'Tên danh mục không được để trống';
                }
                if (!empty($errors)) {
                    $_SESSION['errors'] = $errors;
                    header("Location: " . BASE_URL_ADMIN . '?act=them_Danh_muc');
                    exit();
                }
                 // nếu không có lỗi thì tiến hành thêm danh mục
                // if (empty($errors)) {
                     // nếu không có lỗi thì tiến hành thêm danh mục
                    $this->modelDanhMuc->insertDanhMuc($ten_danh_muc, $mo_ta);
                    header("location: " . BASE_URL_ADMIN . '?act=danhmuc');
                    exit();
            //     } else {
            //          // trả về form
            //         require_once './views/danhmuc/addDanhMuc.php';
            //     }
            // } else {
            //      // trả về form
                
            }
        }
        

        public function suaDanhMuc(){
            ob_start();
            // dlấy ra thông tin danh mục cần sửa
            $id = $_GET['id_danh_muc'];
            $danhmuc = $this->modelDanhMuc->getDetailDanhMuc($id);
            // var_dump($danhmuc);
            if($danhmuc){
                require_once './views/danhmuc/editDanhMuc.php';    
            }else{
                header("location: " . BASE_URL_ADMIN . '?act=danhmuc');
                exit();
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // lấy ra dwuc liệu
                $id = $_POST["id"];
                $ten_danh_muc = $_POST["ten_danh_muc"];
                $mo_ta = $_POST["mo_ta"];
                // var_dump($ten_danh_muc);
                // var_dump($mo_ta);
                //validate
                // tạo 1 mảng trống để chứa dữ liệu
                $errors = [];
                if (empty($ten_danh_muc)) {
                    $errors['ten_danh_muc'] = 'Tên danh mục ko dcd để trống';
                }
                // var_dump($errors);
                // nếu không có lỗi thì tiến hành sửa danh mục
                if (empty($errors)) {
                    // nếu không có lỗi thì tiến hành sửa danh mục
                    $this->modelDanhMuc->updateDanhMuc($id, $ten_danh_muc, $mo_ta);
                    header("location: " . BASE_URL_ADMIN . '?act=danhmuc');
                    exit();
                }else{
                    // trả về form
                    $danhmuc = ['id' => $id, 'ten_danh_muc' => $ten_danh_muc, 'mo_ta'=>$mo_ta];
                    require_once './views/danhmuc/editDanhMuc.php';
                }
            }
        }
        // public function post_edit_Danh_muc(){
        //     // dùng để sử lý thêm dữ liệu
        //     var_dump($_POST);
        //     // kiểm tra xem dữ liệu có phải đc summit lên không
            
        // }

        public function deleteDanhMuc(){
            ob_start();
            $id = $_GET['id_danh_muc'];
            $danhmuc = $this->modelDanhMuc->getDetailDanhMuc($id);

            if($danhmuc){
                $this->modelDanhMuc->xoaDanhMuc($id);
                header("location: " . BASE_URL_ADMIN . '?act=danhmuc');
                exit();
            }else{
               echo '<script> alert(không xóa đc danh mục sản phẩm) </script>';
               header("location: " . BASE_URL_ADMIN . '?act=danhmuc');
                exit();
            }
        }
    }
?>