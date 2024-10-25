<?php

class HomeController
{
    public $modelSanPham;
    public $modelDanhMuc;
    public $modelUser;

    public function __construct()
    {
        $this->modelSanPham = new SanPham();
        $this->modelDanhMuc = new DanhMuc();
        $this->modelUser = new User();
    }
    function getCategories()
    {
        $categories = $this->modelDanhMuc->getAllCate();
        $listDanhmuc = [];

        foreach ($categories as $category) {
            if ($category['parent_id'] === NULL) {
                $listDanhmuc[$category['id']] = [
                    'name' => $category['ten_danh_muc'],
                    'sub_categories' => $this->modelDanhMuc->getSubCategories($category['id'])
                ];
            }
        }
        return $listDanhmuc;
    }

    public function danhsachSanPham()
    {
        $listDanhmuc = $this->getCategories();
        $topProduct = $this->modelSanPham->Top5Product();
        $listProducts = $this->modelSanPham->getallProduct();
        // var_dump($listProducts);die;
        require_once 'views/listProduct.php';
        // var_dump($acc);die;
    }

    public function viewCate()
    {
        $cate_id = $_GET['category_id'];
        $listDanhmuc = $this->getCategories();
        $categories = $this->modelDanhMuc->getAllDanhMucId($cate_id);
        //   var_dump($categories['ten_danh_muc']);die;
        $products = $this->modelSanPham->ProductWithCategory($cate_id);
        // var_dump($products);die;
        require_once 'views/listProductOfCate.php';

        // var_dump($cate_id);die;
    }


    public function ListSanPham()
    {
        $listDanhmuc = $this->getCategories();
        $listProducts = $this->modelSanPham->getListProduct();
        // var_dump($listProducts);die;
        require_once 'views/sanpham.php';
        // var_dump($acc);die;
    }

    public function SanphamVoiDanhMuc()
    {

        // Lấy danh sách tất cả các danh mục
        $categories = $this->modelDanhMuc->getAllDanhMuc();
        //   var_dump($categories);die;

        // Tạo một mảng để lưu danh sách sản phẩm theo từng danh mục
        $productsByCategory = [];

        foreach ($categories as $category) {
            // Lấy danh sách sản phẩm theo từng danh mục
            $products = $this->modelSanPham->ProductWithCategory($category['id']);
            //   var_dump($products);die;
            $productsByCategory[$category['ten_danh_muc']] = $products;
        }

        // Chuyển dữ liệu sang View
        require_once 'views/sanpham.php';
    }



    public function detailsanpham()
    {
        // ob_start();

        $id = $_GET['id_san_pham'];
        // var_dump($id);
        $listDanhmuc = $this->getCategories();
        $sanpham = $this->modelSanPham->getDetailSanPham($id);
        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        $listBinhLuan = $this->modelSanPham->getAllBinhLuan($id);
        // var_dump($listBinhLuan);die;
        // lấy ảnh cũ
        // var_dump($listAnhSanPham);
        // die;
        // var_dump($sanpham);
        if ($sanpham) {
            require_once './views/detailProduct.php';
        } else {
            header("location: " . BASE_URL . '?act=/');
            exit();
        }
    }

    public function handleRequest()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['action']) && $_POST['action'] === 'register') {
                $this->signUp();
            } elseif (isset($_POST['action']) && $_POST['action'] === 'verify') {
                $this->kiem_tra_ma_xac_thuc();
            }
        }
    }

    public function signUp()
    {
        // Kiểm tra xem trường email có được gửi không
        if (empty($_POST['email'])) {
            $_SESSION['errors']['email'] = "Vui lòng nhập email.";
            // Quay lại view đăng ký
            require './views/signup.php';
            return; // Dừng thực hiện hàm nếu không có email
        }

        $email = $_POST['email'];
        $verificationCode = $this->modelSanPham->dangKy($email);
        // var_dump($verificationCode);die;
        // Kiểm tra xem mã xác thực có thành công không
        if ($verificationCode) {
            $subject = 'Mat khau tai khoan cua ban la: 123456</br>Ma xac thuc dang ky tai khoan cua ban la: ';
            $content = $verificationCode;
            sendMail($email, $subject, $content);
            // Chuyển đến view xác thực
            require './views/xacthucdangky.php';
        } else {
            $_SESSION['errors']['email'] = "Email đã tồn tại.";
            require './views/signup.php';
        }
    }



    public function kiem_tra_ma_xac_thuc()
    {
        // Lấy mã xác thực từ form
        $code = isset($_POST['verification_code']) ? $_POST['verification_code'] : null;
        // var_dump($code);die;
        // Kiểm tra mã xác thực có khớp không
        if ($this->modelSanPham->check_ma_xac_thuc($code)) {
            header('location: ' . BASE_URL . '?act=login');
            exit();
            // Bạn có thể chuyển hướng hoặc cập nhật trạng thái tài khoản tại đây
        } else {
            echo "Mã xác thực không đúng!";
        }
    }



    public function login()
    {
        require_once './views/login.php';
        if (isset($_POST['login'])) {
            $user = $_POST['user'];
            $pass = $_POST['pass'];
            // var_dump($user);
            // die;
            $errors = [];
            if (empty($user && $pass)) {
                $errors['login'] = "Tài khoản hoặc mật khẩu không đúng";
            }
            // var_dump($acc['mat_khau']);die;
            if (empty($errors)) {
                $acc =  $this->modelSanPham->checkAcc($user, $pass);
                $validateAcc = false;
                foreach ($acc as $key => $row) {
                    if ($user == $row['email'] && $pass == $row['mat_khau']) {
                        $_SESSION['user'] = [
                            'id' => $row['id'],
                            'ho_ten' => $row['ho_ten'],
                            'email' => $row['email'],
                            'chuc_vu_id' => $row['chuc_vu_id'],
                            'trang_thai' => $row['trang_thai']
                            // Bạn có thể lưu thêm thông tin khác nếu cần
                        ];
                        // var_dump($_SESSION['user']['ho_ten']);die;
                        $validateAcc = true;
                        // var_dump($_SESSION);die;
                        if (isset($_SESSION['user']) && $_SESSION['user']['chuc_vu_id'] == 1) {
                            header("location: " . BASE_URL_ADMIN);
                            exit();
                        } else if (isset($_SESSION['user']) && $_SESSION['user']['chuc_vu_id'] == 2) {
                            if ($_SESSION['user']['trang_thai'] == 1) {
                                header("location: " . BASE_URL_ADMIN);
                                exit();
                            } else {
                                echo "<script> alert('Tài khoản đã bị khóa đăng nhập đến 21/12/2027') </script>";
                                exit();
                            }
                        } else if (isset($_SESSION['user']) && $_SESSION['user']['chuc_vu_id'] == 3) {
                            if ($_SESSION['user']['trang_thai'] == 1) {
                                header("location: " . BASE_URL);
                                exit();
                            } else {
                                echo "<script> alert('Tài khoản đã bị khóa đăng nhập đến 21/12/2027') </script>";
                                header("Location: " . BASE_URL);
                                exit();
                            }
                        } else {
                            header("location: " . BASE_URL);
                            exit();
                        }
                    }
                }
            } else {
                $_SESSION['errors'] = $errors;
                header("location: " . BASE_URL);
                exit();
            }
        }
    }

    public function myAccount()
    {
        $id = $_SESSION['user']['id'];
        $Account = $this->modelUser->getAllUser($id);
        require_once './views/profile/updateProfile.php';
    }

    public function info_Account()
    {
        $id = $_SESSION['user']['id'];
        $Account = $this->modelUser->getAllUser($id);
        // var_dump($Account['anh_dai_dien']);die;
        // echo ("<img src='$Account[anh_dai_dien]' alt=''>");die;
        $ngay_sinh = $Account['ngay_sinh'];
        // var_dump($ngay_sinh);die;
        // Tách ngày sinh thành các phần (ngày, tháng, năm)
        if ($ngay_sinh) {
            list($year, $month, $day) = explode('-', $ngay_sinh);
        } else {
            $year = $month = $day = null; // Nếu không có ngày sinh
        }
        require_once './views/profile/profile.php';
    }

    public function update_Account()
    {
        $user_id = $_SESSION['user']['id'];
        $Account = $this->modelUser->getAllUser($user_id);
        // var_dump($Account['anh_dai_dien']);die;
        $Old_file = $Account['anh_dai_dien'];
        // var_dump($Old_file);die;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lấy dữ liệu từ form
            // var_dump('abc');die;
            $ho_ten = isset($_POST['ho_ten']) && $_POST['ho_ten'] !== '' ? $_POST['ho_ten'] : $Account['ho_ten'];
            $so_dien_thoai = isset($_POST['so_dien_thoai']) && $_POST['so_dien_thoai'] !== '' ? $_POST['so_dien_thoai'] : $Account['so_dien_thoai'];
            if (isset($_POST['gender'])) {
                if ($_POST['gender'] === 'Nam') {
                    $gioi_tinh = 1; // Nam
                } else {
                    $gioi_tinh = 2; // Nữ
                }
            } else {
                $gioi_tinh = $Account['gioi_tinh']; // Giữ giá trị cũ nếu không có thay đổi
            }
            $day = isset($_POST['day']) ? $_POST['day'] : $Account['day'];
            $month = isset($_POST['month']) ? $_POST['month'] : $Account['month'];
            $year = isset($_POST['year']) ? $_POST['year'] : $Account['year'];
            $ngay_sinh = "$year-$month-$day";
            // var_dump($gioi_tinh);
            // die;
            if (empty($_FILES['anh_dai_dien']['name'])) {
                $file_thumb = $Old_file;
            } else {
                $anh_dai_dien = $_FILES['anh_dai_dien'];
                //lưu hình ảnh vào 
                $file_thumb = uploadFile($anh_dai_dien, './uploads/');
                // nếu có ảnh mới thì xóa ảnh cũ
                if (!empty($Old_file)) {
                    deleteFile($Old_file);
                }
            }

            // Cập nhật thông tin người dùng trong database
            $result = $this->modelUser->updateUser($user_id, $ho_ten, $gioi_tinh, $ngay_sinh, $so_dien_thoai, $file_thumb);

            if ($result) {
                // Thành công, chuyển hướng về trang profile
                header("Location: " . BASE_URL . '?act=info_Account');
                exit();
            } else {
                // Thất bại, thông báo lỗi
                echo "Cập nhật thông tin thất bại. Vui lòng thử lại.";
            }
        } else {
            echo "Phương thức không hợp lệ.";
        }

        require_once './views/profile/profile.php';
    }

    public function order_Account()
    {
        $listDanhmuc = $this->getCategories();
        $tai_khoan_id = $_SESSION['user']['id'];
        $Account = $this->modelUser->getAllUser($tai_khoan_id);
        // var_dump($_SESSION['user']['id']);die;
        // var_dump($don_hang_id);die;
        // lấy thoogn tin đơn hàng ở bảng đơn hàng
        // var_dump($don_hang_id);die;
        $donhang = $this->modelSanPham->donhang($tai_khoan_id);
        // var_dump($donhang);die;
        // if(!$donhang){
        //     echo 'Không';
        //     die;
        // }else{
        //     echo 'Có';
        //     die;
        // }
        // lấy danh sách sản phẩm đã đặt của đơn hàng ở bẳng chi_tiet_dan_hangs
        $sanphamDonhang = $this->modelSanPham->getListSPDonHang($tai_khoan_id);
        // var_dump($sanphamDonhang);die;
        $listTrangThaiDonHang = $this->modelSanPham->getAllTrangThaiDonHang();
        // var_dump($listTrangThaiDonHang);die;
        require_once './views/profile/order.php';
    }

    public function checkout()
    {
        ob_start();
        $listDanhmuc = $this->getCategories();
        $id = $_GET['id_san_pham'] ?? null;
        $so_luong = $_GET['so_luong'] ?? null;
        // var_dump($id);die;
        $listProduct = $this->modelSanPham->getDetailSanPham($id);
        // var_dump($listProduct);die;
        require_once 'views/checkout.php';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // lấy ra dwuc liệu
            $random_Number = rand(0001, 9999);
            $ma_don_hang = "HL-" . $random_Number;
            $tai_khoan_id = $_POST['tai_khoan_id'] ?? '';
            $ten_nguoi_nhan = $_POST["ten_nguoi_nhan"] ?? '';
            $email_nguoi_nhan = $_POST["email_nguoi_nhan"] ?? '';
            $sdt_nguoi_nhan = $_POST["sdt_nguoi_nhan"] ?? '';
            $tinh = $_POST["ten_tinh"] ?? '';
            $quan = $_POST["ten_quan"] ?? '';
            $phuong = $_POST["ten_phuong"] ?? '';
            $xa = $_POST["dia_chi_nguoi_nhan"] ?? '';
            $tong_tien = $_POST['tong_tien'];
            $dia_chi_nguoi_nhan = $xa . ', ' . $phuong . ', ' . $quan . ', ' . $tinh;
            $ghi_chu = $_POST["ghi_chu"] ?? '';
            $phuong_thuc_thanh_toan = $_POST["phuong_thuc_thanh_toan"] ?? '';
            $trang_thai = 1;
            // var_dump($trang_thai);die;
            // var_dump($_POST);die;
            // var_dump("abc");die;
            $san_pham_id = $_GET['id_san_pham'];
            $so_luong = $_POST['so_luong'];
            $don_gia = $_POST['don_gia'];
            // var_dump($so_luong);die;
            // tạo 1 mảng trống để chứa dữ liệu
            $errors = [];
            if (empty($ten_nguoi_nhan)) {
                $errors['ten_nguoi_nhan'] = 'Họ tên không được để trống';
            }
            if (empty($email_nguoi_nhan)) {
                $errors['email_nguoi_nhan'] = 'Email không được để trống';
            }
            if (empty($sdt_nguoi_nhan)) {
                $errors['sdt_nguoi_nhan'] = 'Số điện thoại không được để trống';
            }
            if (empty($tinh && $quan && $phuong)) {
                $errors['APIAddress'] = 'Vui lòng chọn tỉnh thành, quận huyện, phường xã';
            }
            if (empty($so_luong)) {
                $errors['so_luong'] = 'Số lượng không được để trống';
            }
            if (empty($phuong_thuc_thanh_toan)) {
                $errors['phuong_thuc_thanh_toan'] = 'Chọn phương thức thanh toán';
            }

            // $_SESSION['errors'] = $errors;
            // Nếu có lỗi, lưu thông báo lỗi vào session
            if (!empty($errors)) {
                $_SESSION['errors'] = $errors;
                header("Location: " . BASE_URL . '?act=checkout&id_san_pham=' . $id);
                exit();
            }
            if ($don_hang_id = $this->modelSanPham->buy_product($ma_don_hang, $tai_khoan_id, $ten_nguoi_nhan, $email_nguoi_nhan, $sdt_nguoi_nhan, $dia_chi_nguoi_nhan, $tong_tien, $ghi_chu, $phuong_thuc_thanh_toan, $trang_thai)) {
                $this->modelSanPham->addDetailDonHang($don_hang_id['id'], $san_pham_id, $don_gia, $so_luong, $tong_tien);
                header('location: ' . BASE_URL . '?act=donHang&id_don_hang=' . $don_hang_id['id']);
                exit();
            }

            // var_dump($don_hang_id['id']);die;


            // nếu không có lỗi thì tiến hành thêm sản phẩm
            // if (empty($errors)) {
            // nếu không có lỗi thì tiến hành thêm sản phẩm

        }
    }

    public function donhang()
    {
        $listDanhmuc = $this->getCategories();
        $don_hang_id = $_GET['id_don_hang'];
        // var_dump($don_hang_id);die;
        // lấy thoogn tin đơn hàng ở bảng đơn hàng
        // var_dump($don_hang_id);die;
        $donhang = $this->modelSanPham->getDetailDonHang($don_hang_id);
        // if(!$donhang){
        //     echo 'Không';
        //     die;
        // }else{
        //     echo 'Có';
        //     die;
        // }
        // lấy danh sách sản phẩm đã đặt của đơn hàng ở bẳng chi_tiet_dan_hangs
        $sanphamDonhang = $this->modelSanPham->getSPDonHang($don_hang_id);
        // var_dump($sanphamDonhang);die;
        $listTrangThaiDonHang = $this->modelSanPham->getAllTrangThaiDonHang();
        require_once 'views/donhang.php';
    }

    public function taiKhoan_donHang()
    {
        $listDanhmuc = $this->getCategories();
        $tai_khoan_id = $_SESSION['user']['id'];
        // var_dump($_SESSION['user']['id']);die;
        // var_dump($don_hang_id);die;
        // lấy thoogn tin đơn hàng ở bảng đơn hàng
        // var_dump($don_hang_id);die;
        $donhang = $this->modelSanPham->donhang($tai_khoan_id);
        // var_dump($donhang);die;
        // if(!$donhang){
        //     echo 'Không';
        //     die;
        // }else{
        //     echo 'Có';
        //     die;
        // }
        // lấy danh sách sản phẩm đã đặt của đơn hàng ở bẳng chi_tiet_dan_hangs
        $sanphamDonhang = $this->modelSanPham->getListSPDonHang($tai_khoan_id);
        // var_dump($sanphamDonhang);die;
        $listTrangThaiDonHang = $this->modelSanPham->getAllTrangThaiDonHang();
        // var_dump($listTrangThaiDonHang);die;
        require_once 'views/listdonhang.php';
    }




    function addBinhluan()
    {
        // var_dump('abc');die;
        // require_once 'views/detailProduct.php';

        if (isset($_POST['comment'])) {
            // var_dump("abc");;die;
            $san_pham_id = $_POST['san_pham_id'];
            $tai_khoan_id = $_POST['tai_khoan_id']; // Giả sử tai_khoan_id được lấy từ session sau khi đăng nhập
            $noi_dung = $_POST['mo_ta'];
            // var_dump($san_pham_id, $noi_dung, $tai_khoan_id);die;

            // Thêm bình luận
            if ($this->modelSanPham->insertBinhLuan($san_pham_id, $tai_khoan_id, $noi_dung)) {
                header('Location: ' . BASE_URL . '?act=detail_san_pham&id_san_pham=' . $san_pham_id);
                exit();
            } else {
                echo 'loi khong the them binh luan';
                header('Location: ' . BASE_URL . '?act=detail_san_pham&id_san_pham=' . $san_pham_id);
            }

            // Chuyển hướng lại trang sản phẩm



        }
    }
    public function searchSP()
    {
        if (isset($_POST['search'])) {
            //var_dump('1234');die;
            $keysearch = $_POST['keysearch'];
            // var_dump($keysearch);die;
            $products = $this->modelSanPham->getAllSearch($keysearch);
            // var_dump($products);die;
        }
        require_once 'views/search.php';
    }

    public function logout()
    {
        ob_start();
        deleteSession_user();
        require_once './views/listProduct.php';
    }


    public function contact()
    {
        $listDanhmuc = $this->getCategories();
        require_once './views/contact.php';
    }


    public function cart()
    {
        $listDanhmuc = $this->getCategories();
        $tai_khoan_id = $_SESSION['user']['id'];
        $listCart = $this->modelSanPham->getAllCart($tai_khoan_id);
        // var_dump($listCart);die; 
        require_once './views/cart.php';
    }

    public function addCart()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_SESSION['user'])) {
                // var_dump($_SESSION['user']);die;
                $email = $this->modelSanPham->getTaiKhoanFromEmail($_SESSION['user']['email']);

                // Lấy dữ liệu giỏ hàng của người dùng
                // var_dump($email['id']);die;
                $san_pham_id = $_GET['id_san_pham'];
                $so_luong = $_POST['so_luong'];
                $gioHang = $this->modelSanPham->getGioHangFromId($email['id']);
                // var_dump($gioHang['id']);die;
                if (!$gioHang) {
                    $gioHangId = $this->modelSanPham->insertCart($email['id']);
                    $gioHang = ['id' => $gioHangId];
                    var_dump('ko có giỏ hàng');
                    // var_dump($gioHang['id']);die;
                    $chiTietGioHang = $this->modelSanPham->getDetailGioHang($gioHang['id']);
                    // var_dump($chiTietGioHang);die;
                } else {
                    // var_dump($gioHang['id']);die;
                    var_dump(' có giỏ hàng');
                    $chiTietGioHang = $this->modelSanPham->getDetailGioHang($gioHang['id']);
                    // var_dump($chiTietGioHang);die;
                }
                // var_dump($san_pham_id);die;

                $checkSanPham = false;
                // var_dump($chiTietGioHang);die;
                foreach ($chiTietGioHang as $detail) {

                    if ($detail['san_pham_id'] == $san_pham_id) {
                        var_dump('trùng giỏ hàng');
                        // var_dump($detail['so_luong']);
                        $newSoLuong = $detail['so_luong'] + $so_luong;
                        // var_dump($newSoLuong);die;
                        $this->modelSanPham->updateSoLuong($gioHang['id'], $san_pham_id, $newSoLuong);
                        $checkSanPham = true;
                        break;
                    }
                }
                if (!$checkSanPham) {
                    var_dump('ko trùng giỏ hàng');
                    $this->modelSanPham->insertDetailCart($gioHang['id'], $san_pham_id, $so_luong);
                }
                // var_dump('Thêm giỏ hàng thành công');die;
                header("Location: " . BASE_URL . '?act=cart');
            } else {
                var_dump('Chưa đăng nhập');
                die;
            }
        }
    }

    public function favourite()
    {
        $tai_khoan_id = $_SESSION['user']['id'];
        $listDanhmuc = $this->getCategories();
        $listfavourite = $this->modelSanPham->getAllfavourite($tai_khoan_id);
        // var_dump($listfavourite);die;
        require_once 'views/listFavourite.php';
    }


    public function addfavourite()
    {
        if (isset($_SESSION['user'])) {
            // var_dump($_SESSION['user']);die;
            var_dump(123);
            $tai_khoan_id = $_SESSION['user']['id'];
            // var_dump($tai_khoan_id);die;
            $san_pham_id = $_GET['id_san_pham'];
            // var_dump($san_pham_id);die;
            $listfavourite = $this->modelSanPham->getAllfavourite($tai_khoan_id);
            $checkfavourite = false;
            // var_dump($listfavourite['san_pham_id']);die;
            foreach ($listfavourite as $productfavourite) {
                // var_dump($productfavourite['san_pham_id']);die;
                if ($productfavourite['san_pham_id'] == $san_pham_id) {
                    var_dump(123);
                    $checkfavourite = true;
                    break;
                }
            }

            if (!$checkfavourite) {
                // var_dump('ko trùng sp');
                $this->modelSanPham->insertfavourite($san_pham_id, $tai_khoan_id);
            }
            header("location: " . BASE_URL . '?act=favourite');
        } else {
            var_dump('Chưa đăng nhập');
            die;
        }
    }
    // public function addCart()
    // {
    //     if (isset($_POST['add'])) {
    //         // var_dump('oke');
    //         $tai_khoan_id = $_SESSION['user']['id'];
    //         // var_dump($tai_khoan_id);
    //         $san_pham_id = $_GET['id_san_pham'];
    //         // var_dump($san_pham_id);die;
    //         $so_luong = $_POST['so_luong'];
    //         // var_dump($so_luong);die;
    //         if (!isset($_SESSION['cart'])) {
    //             $_SESSION['cart'] = [];
    //         }

    //         $product_similar = false;
    //         foreach ($_SESSION['cart'] as $row) {
    //             if ($row['san_pham_id'] == $san_pham_id) {
    //                 // Sản phẩm đã có, cập nhật số lượng
    //             // var_dump('san pham: '. $row['san_pham_id']);
    //             // var_dump('san pham: '. $san_pham_id);

    //                 $row['so_luong'] += $so_luong;
    //                 // var_dump('so luong: ' .  $row['so_luong']);
    //                 $product_similar = true;
    //                 break;
    //             }
    //         }

    //         if (!$product_similar) {
    //             // Thêm vào session giỏ hàng
    //             $_SESSION['cart'][] = [
    //                 'san_pham_id' => $san_pham_id,
    //                 'so_luong' => $so_luong
    //             ];
    //         }

    //         // Lưu vào database
    //         if ($gio_hang_id = $this->modelSanPham->insertCart($tai_khoan_id)) {
    //             $this->modelSanPham->insertDetailCart($gio_hang_id['id'], $san_pham_id, $so_luong);
    //             header('location: ' . BASE_URL . '?act=cart&id_gio_hang=' . $gio_hang_id['id']);
    //             exit();
    //         }
    //         // var_dump($_SESSION['cart'][$san_pham_id]);die;

    //         // var_dump($_SESSION['cart']);die;
    //         header('location: ' . BASE_URL . '?act=cart&id_gio_hang=' . $gio_hang_id['id']);
    //         exit();
    //     }
    // }
}
